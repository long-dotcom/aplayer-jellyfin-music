<?php

add_action('rest_api_init', function () {
    register_rest_route('aplayer-jellyfin/v1', '/tracks', [
        'methods'  => 'GET',
        'callback' => 'aplayer_jellyfin_fetch_tracks',
        'permission_callback' => '__return_true',
    ]);
});

/**
 * 获取音频轨道数据
 * @param WP_REST_Request $request 全局请求对象
 * @return array|WP_Error 返回音频轨道数组或错误对象
 */
function aplayer_jellyfin_fetch_tracks($request) {
    $options = get_option('aplayer_jellyfin_options');
    if (!$options || empty($options['base_url'])) {
        $error_msg = '[ERROR] Jellyfin 配置缺失: ';
        if (!$options) {
            $error_msg .= '所有配置均未设置';
        } else {
            $error_msg .= '缺少 base_url (当前配置: ' . print_r($options, true) . ')';
        }
        error_log($error_msg);
        return new WP_Error('config_missing', $error_msg, ['status' => 500]);
    }

    $url = trailingslashit($options['base_url']) . "Users/{$options['user_id']}/Items?ParentId={$options['music_library_id']}&IncludeItemTypes=Audio&Recursive=true&SortBy=Album,TrackNumber&Limit=20";

    $response = wp_remote_get($url, [
        'headers' => [
            'X-Emby-Token' => $options['api_key'],
            'Content-Type' => 'application/json',
        ]
    ]);

    if (is_wp_error($response)) {
        $error_msg = '[ERROR] WP Remote Get 错误: ' . $response->get_error_message();
        error_log($error_msg);
        error_log('[DEBUG] 错误代码详情: ' . print_r($response->get_error_data(), true));
        return $response;
    }

    $body = json_decode(wp_remote_retrieve_body($response));
    error_log('[DEBUG] 原始响应体: ' . print_r($body, true));
    if (!$body || empty($body->Items)) {
        error_log('[WARNING] 未找到音频项，完整响应: ' . print_r($response, true));
        return [];
    }

    // 处理敏感数据并构建返回值
    $tracks = array_map(function ($item) use ($options) {
        return [
            'name' => $item->Name,
            'artist' => $item->Artist ?? '',
            'url' => trailingslashit($options['base_url']) . "Audio/{$item->Id}/stream?static=true&UserId={$options['user_id']}&DeviceId={$options['device_id']}",
            'cover' => trailingslashit($options['base_url']) . "Items/{$item->Id}/Images/Primary"
        ];
    }, $body->Items);

    error_log('[INFO] 成功获取 tracks: ' . count($tracks));
    return $tracks;
}