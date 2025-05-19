# APlayer Jellyfin 音乐播放器 / APlayer Jellyfin Music Player

## 中文说明

**APlayer Jellyfin 音乐播放器** 是一款 WordPress 插件，通过 **APlayer + Jellyfin + localStorage** 实现吸底播放器功能。

### 功能特点
- 支持 Jellyfin 音乐库接入
- 吸底播放器设计，不影响页面浏览体验
- 当前版本暂不支持播放器的不间断播放功能。如需实现该效果，请配合使用 `OOW PJAX` 插件。

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
