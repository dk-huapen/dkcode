<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siemens PLC视频</title>
    <style>
        /* 全局重置与变量 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Roboto, system-ui, sans-serif;
            background-color: #0f0f11;
            color: #e5e5e5;
            line-height: 1.5;
        }

        /* 容器 */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
        }

        /* 头部导航 (简洁) */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #2a2a2a;
        }
        .logo a {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f0f0f0;
            text-decoration: none;
            letter-spacing: -0.5px;
            background: linear-gradient(135deg, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .back-link a {
            color: #aaa;
            text-decoration: none;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.2s;
        }
        .back-link a:hover {
            color: #fff;
        }

        /* 两列布局 */
        .video-page {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 2rem;
        }

        /* 主播放区 */
        .video-player-section {
            background-color: #1a1a1e;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 35px -10px rgba(0,0,0,0.8);
        }

        .video-player {
            width: 100%;
            aspect-ratio: 16 / 9;
            background-color: #000;
        }
        .video-player video {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }

        .video-info {
            padding: 1.8rem 2rem;
        }

        .video-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #fff;
            line-height: 1.3;
        }

        .video-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.5rem;
            color: #b0b0b0;
            font-size: 0.95rem;
            border-bottom: 1px solid #2a2a2a;
            padding-bottom: 1.2rem;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        .meta-item i { font-style: normal; font-weight: 500; color: #d0d0d0; }

        .channel-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .channel-detail {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .channel-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(145deg, #3b3b4d, #252530);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #c0c0c0;
            border: 2px solid #4a4a5a;
        }
        .channel-name h4 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.2rem;
        }
        .channel-name p {
            font-size: 0.85rem;
            color: #aaa;
        }
        .subscribe-btn {
            background-color: #ef4444;
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 40px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
        }
        .subscribe-btn:hover {
            background-color: #dc2626;
            transform: scale(1.02);
        }

        .video-description {
            background-color: #25252b;
            border-radius: 16px;
            padding: 1.2rem 1.5rem;
            font-size: 0.95rem;
            color: #ccc;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .video-description p {
            margin-bottom: 0.5rem;
        }

        /* 评论区简表 */
        .comments-section h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: #fff;
        }
        .comment-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .comment-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #333342;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ccc;
            font-weight: 500;
        }
        .comment-content {
            flex: 1;
        }
        .comment-author {
            display: flex;
            align-items: baseline;
            gap: 0.8rem;
            margin-bottom: 0.3rem;
        }
        .comment-author strong {
            color: #fff;
            font-weight: 600;
        }
        .comment-date {
            font-size: 0.8rem;
            color: #888;
        }
        .comment-text {
            color: #ccc;
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
        }
        .comment-actions {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: #aaa;
        }
        .comment-actions span {
            cursor: default;
        }

        /* 右侧推荐列表 */
        .recommendations {
            background-color: #1a1a1e;
            border-radius: 24px;
            padding: 1.5rem 1.2rem;
            box-shadow: 0 15px 25px -8px rgba(0,0,0,0.6);
            height: fit-content;
        }
        .recommendations h3 {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #fff;
            padding-left: 0.5rem;
        }
        .rec-list {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .rec-item {
            display: flex;
            gap: 0.8rem;
            text-decoration: none;
            color: inherit;
            transition: background 0.2s;
            padding: 0.5rem;
            border-radius: 16px;
        }
        .rec-item:hover {
            background-color: #2a2a30;
        }
        .rec-thumb {
            width: 120px;
            height: 68px;
            background-color: #2c2c34;
            border-radius: 12px;
            flex-shrink: 0;
            background-size: cover;
            background-position: center;
        }
        .rec-info {
            flex: 1;
        }
        .rec-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.3rem;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .rec-channel {
            font-size: 0.8rem;
            color: #aaa;
            margin-bottom: 0.2rem;
        }
        .rec-meta {
            font-size: 0.75rem;
            color: #888;
        }

        /* 底部 */
        .footer {
            margin-top: 3rem;
            text-align: center;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #2a2a2a;
            padding-top: 1.5rem;
        }

        /* 响应式 */
        @media (max-width: 900px) {
            .video-page {
                grid-template-columns: 1fr;
            }
            .container {
                padding: 1rem;
            }
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.8rem;
            }
            .video-title {
                font-size: 1.5rem;
            }
            .video-info {
                padding: 1.2rem;
            }
            .channel-info {
                flex-wrap: wrap;
                gap: 1rem;
            }
        }
        @media (max-width: 480px) {
            .rec-item {
                flex-direction: column;
            }
            .rec-thumb {
                width: 100%;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- 简单导航 -->
        <div class="navbar">
            <div class="logo"><a href="#">🎥 ABB DCS系列视频</a></div>
            <div class="back-link"><a href="#">← 返回视频列表</a></div>
        </div>

        <!-- 视频页主体（两列） -->
        <div class="video-page">
            <!-- 左侧：播放器 + 信息 + 评论 -->
            <div class="video-player-section">
                <!-- 视频播放器（示例视频源：MDN 示例花朵视频） -->
						<?php
						include_once("../../../lib/class/Document.class.php");
						$document_obj = new Document;
						$id = $_GET['id'];
						list($name,$dir,$title,$promo) = $document_obj->lookDir($id);//
						$dir = "../../../".$dir;
						?>
                <div class="video-player">
                    <video controls poster="https://picsum.photos/id/1015/800/450">
                        <source src="<?php echo $dir?>" type="video/mp4">
                        您的浏览器不支持 HTML5 视频播放。
                    </video>
                </div>

                <!-- 视频信息区 -->
                <div class="video-info">
		<h1 class="video-title"><?php echo $name ?></h1>
                    
                    <div class="video-meta">
                        <span class="meta-item">👁️ 125万次观看</span>
                        <span class="meta-item">📅 2天前</span>
                        <span class="meta-item">⭐ 9.8万点赞</span>
                    </div>

                    <div class="channel-info">
                        <div class="channel-detail">
                            <div class="channel-avatar">🎬</div>
                            <div class="channel-name">
                                <h4>ABB DCS系列</h4>
                                <p>89.2万订阅</p>
                            </div>
                        </div>
                        <button class="subscribe-btn">订阅</button>
                    </div>

                    <div class="video-description">
                        <p>🎞️<?php echo $title ?></p>
                        <p>🔔 更多精彩请关注频道，每日更新经典电影解析。</p>
                    </div>

                    <!-- 评论区示例 -->
                    <div class="comments-section">
                        <h3>💬 主要内容</h3>
                        <div class="comment-item">
                            <div class="comment-avatar">C</div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    <strong>宇宙漫游者</strong>
                                    <span class="comment-date">3小时前</span>
                                </div>
                                <div class="comment-text"><?php echo $promo ?></div>
                                <div class="comment-actions">
                                    <span>👍 34</span>
                                    <span>👎 2</span>
                                    <span>回复</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 右侧：推荐视频列表 -->
            <div class="recommendations">
                <h3>📺 相关推荐</h3>
                <div class="rec-list">
                    <a href="shipin.php?id=486" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/1043/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">盗梦空间 · 梦境分层解析</div>
                            <div class="rec-channel">诺兰宇宙</div>
                            <div class="rec-meta">89万次观看 · 5天前</div>
                        </div>
                    </a>
                    <a href="shipin.php?id=487" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/106/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">楚门的世界 · 打破第四面墙</div>
                            <div class="rec-channel">派拉蒙经典</div>
                            <div class="rec-meta">34万次观看 · 1周前</div>
                        </div>
                    </a>
                    <a href="shipin.php?id=488" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/15/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">海上钢琴师 1900 传奇</div>
                            <div class="rec-channel">电影时光</div>
                            <div class="rec-meta">210万次观看 · 3天前</div>
                        </div>
                    </a>
                    <a href="#" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/26/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">低俗小说 · 环形叙事结构</div>
                            <div class="rec-channel">昆汀粉丝团</div>
                            <div class="rec-meta">45万次观看 · 2周前</div>
                        </div>
                    </a>
                    <a href="#" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/30/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">千与千寻 隐喻深度解析</div>
                            <div class="rec-channel">吉卜力研究所</div>
                            <div class="rec-meta">150万次观看 · 4天前</div>
                        </div>
                    </a>
                    <a href="#" class="rec-item">
                        <div class="rec-thumb" style="background-image: url('https://picsum.photos/id/42/200/120');"></div>
                        <div class="rec-info">
                            <div class="rec-title">机器人总动员 · 孤独与爱</div>
                            <div class="rec-channel">皮克斯档案馆</div>
                            <div class="rec-meta">67万次观看 · 6天前</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- 底部 -->
        <div class="footer">
            © 2025 StreamVibe · 视频播放页模板 | 所有内容均为示例
        </div>
    </div>
</body>
</html>
