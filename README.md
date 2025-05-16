# APlayer Jellyfin 音乐播放器 / APlayer Jellyfin Music Player

## 中文说明

**APlayer Jellyfin 音乐播放器** 是一款 WordPress 插件，通过 **APlayer + Jellyfin + localStorage** 实现吸底播放器功能。

### 功能特点
- 支持 Jellyfin 音乐库接入
- 吸底播放器设计，不影响页面浏览体验
- 支持 PJAX 页面加载，提升交互流畅性

### 安装步骤
1. 下载插件并上传到您的 WordPress 插件目录。
2. 在 WordPress 后台激活插件。
3. 进入 **设置 > APlayer Jellyfin** 配置 Jellyfin 服务器信息。
4. 保存设置后即可在前端页面看到播放器。

### 配置说明
- **Jellyfin Server URL**: 输入您的 Jellyfin 服务器地址（例如：http://localhost:8096）
- **User ID**: 您要在 Jellyfin 中播放音乐的用户 ID
- **API Key**: 您的 Jellyfin API 密钥
- **Device ID**: 设备 ID
- **Music Library ID**: 想要使用的音乐库 ID

### 注意事项
- 确保您的 Jellyfin 服务器正在运行，并且可以从 WordPress 服务器访问。
- 确保您在 Jellyfin 中已经设置了音乐库，并且所选用户有权限访问该库。

## English Description

**APlayer Jellyfin Music Player** is a WordPress plugin that implements a bottom-fixed music player using **APlayer + Jellyfin + localStorage**.

### Features
- Integration with Jellyfin music library
- Bottom-fixed player design for non-intrusive browsing experience
- Support for PJAX page loading to enhance interaction smoothness
- Bilingual interface (Chinese/English)

### Installation
1. Download the plugin and upload it to your WordPress plugins directory.
2. Activate the plugin from the WordPress admin panel.
3. Go to **Settings > APlayer Jellyfin** to configure your Jellyfin server information.
4. After saving the settings, you will see the player on the frontend pages.

### Configuration
- **Jellyfin Server URL**: Enter your Jellyfin server address (e.g., http://localhost:8096)
- **User ID**: The user ID for the user who will play music in Jellyfin
- **API Key**: Your Jellyfin API key
- **Device ID**: Device ID
- **Music Library ID**: The ID of the music library you want to use

### Notes
- Ensure your Jellyfin server is running and accessible from the WordPress server.
- Ensure you have set up a music library in Jellyfin and the selected user has access to it.