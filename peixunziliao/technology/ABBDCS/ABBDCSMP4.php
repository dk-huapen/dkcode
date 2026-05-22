<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABB DCS培训视频</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
            background-color: #1e1e2f;
            padding: 2rem 1.5rem;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            max-width: 1200px;
            width: 100%;
        }

        h1 {
            font-size: 2.2rem;
            font-weight: 500;
            color: #f0f0f0;
            text-align: center;
            margin-bottom: 2.5rem;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.5);
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 1.8rem;
        }

        /* 卡片改为 <a> 标签，保留原有样式，并重置链接默认样式 */
        .video-card {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            text-decoration: none;      /* 移除下划线 */
            color: inherit;             /* 继承颜色，防止蓝色文字 */
            cursor: pointer;            /* 手型指针 */
        }

        /* 半透明黑色遮罩层 */
        .video-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            transition: background-color 0.3s ease;
        }

        .video-card:hover::before {
            background-color: rgba(0, 0, 0, 0.3);
        }

        .video-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 35px -8px black;
        }

        .video-title {
            position: relative;
            z-index: 2;
            font-size: 1.6rem;
            font-weight: 700;
            color: white;
            text-align: center;
            line-height: 1.4;
            word-break: break-word;
            padding: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.7);
            max-width: 100%;
            pointer-events: none;       /* 确保点击仍由父级 <a> 捕获，不影响链接功能 */
        }

        @media (max-width: 480px) {
            .video-grid {
                gap: 1.2rem;
            }
            .video-card {
                min-height: 170px;
            }
            .video-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎬 ABB DCS系统讲解</h1>
        <div class="video-grid">
            <!-- 每个卡片都是一个链接，可设置不同 href 和 target -->
            <a href="shipin.php?id=481" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/1043/400/300')">
                <div class="video-title">Valve单操讲解</div>
            </a>
            <a href="shipin.php?id=482" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/1043/400/300')">
                <div class="video-title">Valve联锁讲解</div>
            </a>
            <a href="shipin.php?id=484" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/106/400/300')">
                <div class="video-title">调节门模块讲解</div>
            </a>
            <a href="https://www.example.com/movie/pianist" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/15/400/300')">
                <div class="video-title">海上钢琴师</div>
            </a>
            <a href="https://www.example.com/movie/pulpfiction" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/26/400/300')">
                <div class="video-title">低俗小说</div>
            </a>
            <a href="https://www.example.com/movie/chihiro" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/30/400/300')">
                <div class="video-title">千与千寻</div>
            </a>
            <a href="https://www.example.com/movie/walle" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/42/400/300')">
                <div class="video-title">机器人总动员</div>
            </a>
            <a href="https://www.example.com/movie/threebillboards" target="_blank" class="video-card" style="background-image: url('https://picsum.photos/id/55/400/300')">
                <div class="video-title">三块广告牌</div>
            </a>
        </div>
        <p style="text-align: center; color: #aaa; margin-top: 2.5rem; font-size: 0.9rem;">
            🌄 背景图片来自 <a href="https://picsum.photos" target="_blank" style="color: #9cf;">picsum</a>，每张图片均不同。点击卡片将在新标签页打开示例链接。
        </p>
    </div>
</body>
</html>
