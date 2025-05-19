<?php
/**
 * Plugin Name: APlayer Jellyfin 音乐播放器
 * Description: 使用 APlayer + Jellyfin + localStorage 实现吸底播放器。
 * Version: 1.0
 * Author: Blue Bird
 */

if (!defined('ABSPATH')) exit;

// 插件路径常量
define('APLAYER_JELLYFIN_URL', plugin_dir_url(__FILE__));
define('APLAYER_JELLYFIN_PATH', plugin_dir_path(__FILE__));

require_once APLAYER_JELLYFIN_PATH . 'api/api.php';

/**
 * 注册 CSS 和 JS 文件
 */
function aplayer_jellyfin_enqueue_scripts() {
    // APlayer 样式与脚本
    wp_enqueue_style('aplayer-style', 'https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.css', [], '1.10.1');
    wp_enqueue_script('aplayer-script', 'https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.10.1/APlayer.min.js', [], '1.10.1', true);

    // 自定义播放器逻辑
    wp_enqueue_script('aplayer-player-js', APLAYER_JELLYFIN_URL . 'js/player.js', ['aplayer-script'], null, true);
    wp_enqueue_style('aplayer-custom-style', APLAYER_JELLYFIN_URL . 'css/style.css');

}
add_action('wp_enqueue_scripts', 'aplayer_jellyfin_enqueue_scripts');

/**
 * 传递 Jellyfin 配置参数给 JS
 */
function aplayer_jellyfin_pass_config_to_js() {
    $options = get_option('aplayer_jellyfin_options');
    if (!$options) return;

    wp_localize_script('aplayer-player-js', 'jmp_ajax', [
        'base_url' => trailingslashit($options['base_url']),
        'user_id' => $options['user_id'],
        'api_key' => $options['api_key'],
        'device_id' => $options['device_id'],
        'music_library_id' => $options['music_library_id'],
    ]);
}
add_action('wp_print_scripts', 'aplayer_jellyfin_pass_config_to_js');

/**
 * 在页面 footer 加入播放器容器
 */
function aplayer_jellyfin_footer() {
    include APLAYER_JELLYFIN_PATH . 'templates/player-container.php';
}
add_action('wp_footer', 'aplayer_jellyfin_footer');

/**
 * 添加后台设置菜单
 */
add_action('admin_menu', function () {
    add_options_page(
        'APlayer Jellyfin 设置',
        'APlayer Jellyfin',
        'manage_options',
        'aplayer-jellyfin',
        'aplayer_jellyfin_settings_page'
    );
});

/**
 * 注册设置项
 */
add_action('admin_init', function () {
    register_setting('aplayer_jellyfin_settings', 'aplayer_jellyfin_options');
});

/**
 * 设置页模板
 */
function aplayer_jellyfin_settings_page() {
    include APLAYER_JELLYFIN_PATH . 'admin/settings-page.php';
}
