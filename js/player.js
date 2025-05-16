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

// PJAX 初始化逻辑
function initializePjax() {
    if (typeof Pjax === 'undefined') {
        console.error('[ERROR] Pjax 未定义，请确保已正确加载 PJAX 库');
        return;
    }

    console.info('[INFO] 正在初始化 PJAX...');
    // 使用原生 PJAX 库的初始化方式
    new Pjax({
        elements: "a:not([target='_blank']):not([no-pjax])",  // 避免外链和特殊链接
        selectors: ["title", "#content"]
    });
}

// 在 DOMContentLoaded 事件监听器外部定义完 initializePjax 后再调用它
document.addEventListener('DOMContentLoaded', function () {
    initializePjax();
});