<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siemens PLC培训视频</title>
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
    <div class="container">
        <h1>🎬 Siemens PLC系统理论讲解</h1>
        <div class="video-grid">
            <!-- 每个卡片都是一个链接，可设置不同 href 和 target -->
            <a href="shipin.php?id=505" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCjieshao.png')">
                <div class="video-title">2026年PLC线下培训介绍</div>
            </a>
            <a href="shipin.php?id=498" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第一课：基础知识讲解</div>
            </a>
            <a href="shipin.php?id=499" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第二课：基础知识讲解</div>
            </a>
            <a href="shipin.php?id=500" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第三课：编程基础知识讲解</div>
            </a>
            <a href="shipin.php?id=501" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第四课：编程基础知识讲解</div>
            </a>
            <a href="shipin.php?id=502" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第五课：编程技巧讲解</div>
            </a>
            <a href="shipin.php?id=503" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第六课：模拟量讲解</div>
            </a>
            <a href="shipin.php?id=504" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCLilun.jpg')">
                <div class="video-title">第七课：模拟量处理编程讲解</div>
            </a>
        </div>
        <p style="text-align: center; color: #aaa; margin-top: 2.5rem; font-size: 0.9rem;">
            🌄 以上理论培训视频由PLC线下培训组录制。<br>西门子官方参考手册：<a href="../../../../my_data/自动控制系统/设备说明书/PLC/西门子S7-200 SMART系统手册说明书.pdf" target="_blank" style="color:red;">S7-200 Smart PLC</a>和<a href="../../../../my_data/自动控制系统/设备说明书/PLC/WinCC_Working_with_WinCC_zh-CHS_zh-CHS.pdf" target="_blank" style="color:red;">WinCC V7.5 SP2</a>
        </p>
    </div>
<body>
    <div class="container">
        <h1>🎬 Siemens PLC系统实操讲解</h1>
        <div class="video-grid">
            <!-- 每个卡片都是一个链接，可设置不同 href 和 target -->
            <a href="shipin.php?id=486" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao486.png')">
                <div class="video-title">SmartPLC逻辑组态软件讲解</div>
            </a>
            <a href="shipin.php?id=487" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao487.png')">
                <div class="video-title">WinCC与PLC通讯讲解</div>
            </a>
            <a href="shipin.php?id=488" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao488.png')">
                <div class="video-title">WinCC软件组态-按钮讲解</div>
            </a>
            <a href="shipin.php?id=489" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao489.png')">
                <div class="video-title">就地起保停逻辑实现</div>
            </a>
            <a href="shipin.php?id=491" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao491.png')">
                <div class="video-title">远方起保停逻辑实现</div>
            </a>
            <a href="shipin.php?id=490" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao490.png')">
                <div class="video-title">保护联锁启停逻辑实现</div>
            </a>
            <a href="shipin.php?id=492" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao492.png')">
                <div class="video-title">WinCC起保停画面组态</div>
            </a>
            <a href="shipin.php?id=493" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao493.png')">
                <div class="video-title">WinCC按钮实现二次确认</div>
            </a>
            <a href="shipin.php?id=494" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao494.png')">
                <div class="video-title">模拟量硬件组态</div>
            </a>
            <a href="shipin.php?id=495" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao495.png')">
                <div class="video-title">模拟量输入转换逻辑</div>
            </a>
            <a href="shipin.php?id=496" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao496.png')">
                <div class="video-title">模拟量输出转换逻辑</div>
            </a>
            <a href="shipin.php?id=497" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao497.png')">
                <div class="video-title">WinCC模拟量输入输出组态</div>
            </a>
            <a href="shipin.php?id=506" target="_blank" class="video-card" style="background-image: url('../../../../my_data/培训资料/视频/SmartPLC/image/SmartPLCShicao506.png')">
                <div class="video-title">SmartPLC PID讲解</div>
            </a>
        </div>
        <p style="text-align: center; color: #aaa; margin-top: 2.5rem; font-size: 0.9rem;">
            🌄 以上实操培训视频由PLC线下培训组录制，视频中内容是基于SIMATIC S7-200 Smart CPU ST30+SIMATIC S7-200 Smart AM03硬件基础上使用STEP7-Micro/WIN SMART V02.08+S7-200 PC Access SMART V2.3+WinCC V7.5 SP1软件进行实操。
        </p>
    </div>
</body>
</html>
