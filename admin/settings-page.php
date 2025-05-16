
<div class="wrap">
    <h1>APlayer Jellyfin 设置</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('aplayer_jellyfin_settings');
        $options = get_option('aplayer_jellyfin_options');
        ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="base_url">Jellyfin 服务器地址</label></th>
                <td><input type="text" name="aplayer_jellyfin_options[base_url]" id="base_url" value="<?php echo esc_attr($options['base_url'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="user_id">用户 ID</label></th>
                <td><input type="text" name="aplayer_jellyfin_options[user_id]" id="user_id" value="<?php echo esc_attr($options['user_id'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="api_key">API Token</label></th>
                <td><input type="text" name="aplayer_jellyfin_options[api_key]" id="api_key" value="<?php echo esc_attr($options['api_key'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="device_id">设备 ID</label></th>
                <td><input type="text" name="aplayer_jellyfin_options[device_id]" id="device_id" value="<?php echo esc_attr($options['device_id'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row"><label for="music_library_id">音乐库ID</label></th>
                <td><input type="text" name="aplayer_jellyfin_options[music_library_id]。" id="music_library_id" value="<?php echo esc_attr($options['music_library_id'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>

         <h2>使用说明</h2>
            <p>要使用Jellyfin Music Player插件，请按照以下步骤操作：</p>
            <ol>
                <li>在"Jellyfin Server URL"字段中输入您的Jellyfin服务器地址（例如：http://localhost:8096）</li>
                <li>在"API Key"字段中输入您的Jellyfin API密钥（可在Jellyfin设置 -> 高级 -> API中找到）</li>
                <li>在"User ID"字段中输入您要在Jellyfin中播放音乐的用户ID（可在Jellyfin用户设置中找到）</li>
                <li>在"Music Library ID"字段中输入您想用作音乐源的库ID（可在Jellyfin 专辑url路径下找到）</li>
                <li>点击"保存更改"按钮保存设置</li>
            </ol>

            <h3>注意</h3>
            <ul>
                <li>确保您的Jellyfin服务器正在运行，并且可以从WordPress服务器访问</li>
                <li>确保您在Jellyfin中已经设置了音乐库，并且所选用户有权限访问该库</li>
                <li>如果遇到问题，请检查浏览器控制台和服务器错误日志以获取更多信息</li>
            </ul>

            <h3>获取API Key和User ID的帮助</h3>
            <p><strong>获取API Key:</strong></p>
            <ol>
                <li>登录到Jellyfin Web界面</li>
                <li>点击右上角的用户菜单并选择"设置"</li>
                <li>导航到"高级"选项卡</li>
                <li>在"API"部分下，您将看到您的API密钥</li>
            </ol>
            <p><strong>获取User ID:</strong></p>
            <ol>
                <li>登录到Jellyfin Web界面</li>
                <li>点击右上角的用户菜单并选择"设置"</li>
                <li>导航到"我的账户"页面</li>
                <li>在URL中，您会看到类似这样的内容：<code>/web/index.html#!/user.html?id=YOUR_USER_ID_HERE</code></li>
                <li>提取URL中的<code>id</code>参数值作为您的User ID</li>
            </ol>
    </form>
</div>
