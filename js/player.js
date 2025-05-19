// 初始化播放器
console.info('[INFO] 正在初始化播放器...');
document.addEventListener('DOMContentLoaded', function () {
    initializePlayer();
});

// 播放器初始化逻辑
function initializePlayer() {
    const audioData = JSON.parse(localStorage.getItem('aplayer_tracks') || '[]');
    const ap = new APlayer({
        container: document.getElementById('aplayer'),
        fixed: true,
        audio: audioData
    });

    // 如果没有音频数据，从服务器获取最新的音频数据
    if (!audioData.length) {
        console.debug('[DEBUG] 未找到本地音频数据，正在从服务器获取...');
        fetch('/wp-json/aplayer-jellyfin/v1/tracks')
            .then(res => res.json())
            .then(tracks => {
                localStorage.setItem('aplayer_tracks', JSON.stringify(tracks));
                console.info('[INFO] 音频数据已更新，页面即将重新加载');
                location.reload(); // 获取数据后重新加载页面
            })
            .catch(error => {
                console.error('[ERROR] 获取tracks失败:', error);
                console.debug('[DEBUG] 错误详情:', { error });
            });
    }
}