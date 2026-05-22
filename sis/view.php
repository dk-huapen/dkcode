<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>台账预览</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(145deg, #0c0f1c 0%, #1e2335 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', 'Segoe UI', Roboto, sans-serif;
            padding: 2rem 1rem;
        }

        /* 网格容器：使用CSS Grid实现均匀分布 */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            width: 100%;
            place-items: center;           /* 水平垂直居中每个网格项 */
        }

        /* 每个卡片的透视容器 — 独立3D空间，宽高由grid控制，保持比例 */
        .card-container {
            width: 100%;
            max-width: 320px;               /* 限制最大宽度，避免过大 */
            aspect-ratio: 5 / 7;            /* 固定宽高比 300:420 ≈ 5:7 */
            perspective: 1500px;
        }

        /* 卡片主体 */
        .card {
            position: relative;
            width: 100%;
            height: 100%;
            border-radius: 28px;
            background: linear-gradient(135deg, #2a3f9e, #6d3fc7);
            box-shadow: 0 25px 40px -15px rgba(0, 0, 0, 0.5),
                        0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            transform-style: preserve-3d;
            transform: rotateX(0deg) rotateY(0deg);
            transition: box-shadow 0.2s ease;
            cursor: pointer;
            overflow: hidden;
            will-change: transform;
        }

        /* 卡片内容区域 (文字、图标) */
        .card-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1.8rem 1.2rem;
            color: white;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.4);
            z-index: 2;
            backface-visibility: hidden;
            pointer-events: none;           /* 事件穿透，但按钮覆盖 */
        }

        .card-icon {
            font-size: clamp(3rem, 10vw, 4rem);   /* 响应式图标大小 */
            line-height: 1;
            margin-bottom: 1rem;
            filter: drop-shadow(0 8px 6px rgba(0,0,0,0.3));
            transform: translateZ(12px);
        }

        .card-title {
            font-size: clamp(1.6rem, 5vw, 2rem);
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            text-align: center;
            transform: translateZ(18px);
        }
        .card-name {
            font-size: clamp(1.2rem, 3vw, 1.5rem);
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            text-align: center;
            transform: translateZ(18px);
        }

        .card-desc {
            font-size: clamp(0.85rem, 2.5vw, 0.95rem);
            line-height: 1.5;
            text-align: center;
            opacity: 0.9;
            max-width: 240px;
            margin-bottom: 1.5rem;
            transform: translateZ(8px);
        }

        /* 可点击链接按钮 */
        .card-btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 0.7rem 2rem;
            border-radius: 60px;
            font-weight: 600;
            font-size: 1rem;
            color: white;
            letter-spacing: 0.5px;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transform: translateZ(22px);
            transition: background 0.2s, border-color 0.2s;
            pointer-events: auto;            /* 允许点击 */
            white-space: nowrap;              /* 防止按钮文字换行 */
        }

        .card-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.6);
        }

        /* 光泽层：动态高光跟随鼠标 */
        .card-gloss {
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(
                circle at calc(var(--x, 0.5) * 100%) calc(var(--y, 0.5) * 100%), 
                rgba(255, 255, 255, 0.45) 0%, 
                rgba(255, 255, 255, 0) 70%
            );
            mix-blend-mode: overlay;
            pointer-events: none;
            z-index: 5;
            transition: none;
        }

        /* 环境光晕 (装饰) */
        .card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.12) 0%, transparent 60%);
            opacity: 0.6;
            pointer-events: none;
            z-index: 3;
        }

        /* 底部微光 (装饰) */
        .card-footer-glow {
            position: absolute;
            bottom: 8px;
            left: 15%;
            width: 70%;
            height: 6px;
            background: rgba(255,255,255,0.2);
            filter: blur(8px);
            border-radius: 50%;
            z-index: 1;
        }

        /* 为8个卡片设置不同的渐变色 (nth-child 覆盖1-8) */
        .card-container:nth-child(1) .card { background: linear-gradient(135deg, #2c3e8f, #5f3dc7); }
        .card-container:nth-child(2) .card { background: linear-gradient(135deg, #9b4d96, #4a6fa5); }
        .card-container:nth-child(3) .card { background: linear-gradient(135deg, #3e8f7a, #c75f3d); }
        .card-container:nth-child(4) .card { background: linear-gradient(135deg, #b13e6b, #e68a2e); }
        .card-container:nth-child(5) .card { background: linear-gradient(135deg, #4a6fa5, #9b4d96); }
        .card-container:nth-child(6) .card { background: linear-gradient(135deg, #c75f3d, #3e8f7a); }
        .card-container:nth-child(7) .card { background: linear-gradient(135deg, #e68a2e, #b13e6b); }
        .card-container:nth-child(8) .card { background: linear-gradient(135deg, #5f3dc7, #2c3e8f); }

        /* 响应式微调：在较小屏幕上减小gap和内边距 */
        @media (max-width: 600px) {
            .cards-grid {
                gap: 1.5rem;
            }
            .card-container {
                max-width: 280px;
            }
            .card-btn {
                padding: 0.6rem 1.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
<?php
	$account_id = $_GET['id'];
	$con = mysqli_connect("192.168.1.120","opcuasis","opcuasis","db_rekong");
	if(!$con){
		die("连接失败". mysqli_connect_error());
	}else
	{ 
		//echo"连接成功";
	}
	mysqli_query($con, "set names utf8");
	//设备信息
	$tb_account_sql = 'SELECT * FROM tb_account WHERE account_id='.$account_id;
	$tb_account_result = mysqli_query($con, $tb_account_sql);
	$tb_account_arr=mysqli_fetch_assoc($tb_account_result);

	
	$tb_area_sql = "SELECT * FROM `tb_area` WHERE area_id=".$tb_account_arr['equipment_area_id'];
	$tb_area_result = mysqli_query($con, $tb_area_sql);
	$tb_area_arr=mysqli_fetch_assoc($tb_area_result);

?>

<div class="cards-grid">
    <!-- 卡片 1：设备基本信息 -->
    <div class="card-container">
        <div class="card" data-card>
            <div class="card-content">
                <h2 class="card-title">设备信息</h2>
                <h2 class="card-name">---------------------</h2>
		<h2 class="card-name"><?php echo $tb_account_arr['equipment_kks']?></h2>
                <h2 class="card-name"><?php echo $tb_account_arr['equipment_name']?></h2>
                <h2 class="card-name">---------------------</h2>
                <p class="card-desc"><?php echo $tb_area_arr['area_content']?></p>
                <p class="card-desc"><?php echo $tb_account_arr['equipment_position']?></p>
                <p class="card-desc"><?php echo $tb_account_arr['equipment_remarks']?></p>
		<a class="card-btn" href="/dkcode/dkcode/taizhang/equipment_account/look_content.php?id=<?php echo $account_id ?>" target="_blank" rel="noopener">详细</a>
            </div>
            <div class="card-gloss"></div>
            <div class="card-footer-glow"></div>
        </div>
    </div>

<?php
	//产品信息
	//$tb_goods_sql = "SELECT * FROM `tb_goods` WHERE `goods_id`=".$tb_account_arr['equipment_goods_id']."or `goods_id`=".$tb_account_arr['equipment_goods_id'] ;
	$tb_goods_sql = "SELECT * FROM `tb_goods` WHERE `goods_id`in (".$tb_account_arr['equipment_goods_id'].",".$tb_account_arr['equipment_goods_id1'].")";
	$tb_goods_result = mysqli_query($con, $tb_goods_sql);
	while($tb_goods_arr=mysqli_fetch_assoc($tb_goods_result)){
		if($tb_goods_arr['goods_id'] != -1){
?>
    <!-- 卡片 2：备件信息 -->
    <div class="card-container">
        <div class="card" data-card>
            <div class="card-content">
                <h2 class="card-title">产品信息</h2>
                <h2 class="card-name">---------------------</h2>
                <h2 class="card-name"><?php echo $tb_goods_arr['goods_name']?></h2>
                <h2 class="card-name"><?php echo $tb_goods_arr['goods_modle']?></h2>
                <h2 class="card-name">---------------------</h2>
                <p class="card-desc"><?php echo $tb_goods_arr['goods_manufacturers']?></p>
                <p class="card-desc"><?php echo $tb_goods_arr['goods_main_parameters']?></p>
                <p class="card-desc"></p>
                <p class="card-desc"></p>
		<a class="card-btn" href="/dkcode/dkcode/beipingbeijian/goods/look_content.php?id=<?php echo $tb_goods_arr['goods_id'] ?>" target="_blank" rel="noopener">详细</a>
            </div>
            <div class="card-gloss"></div>
            <div class="card-footer-glow"></div>
        </div>
    </div>
<?php
	}
	}
?>

<?php
	//DCS点表信息
	$tb_point_table_sql = "SELECT * FROM tb_point_table WHERE point_kks like '%".$tb_account_arr['equipment_kks']."%'";
	$tb_point_table_result = mysqli_query($con, $tb_point_table_sql);
	//$tb_point_table_arr=mysqli_fetch_assoc($tb_point_table_result);
	while($tb_point_table_arr=mysqli_fetch_assoc($tb_point_table_result)){
?>
    <!-- 卡片 3：DCS点表信息 -->
    <div class="card-container">
        <div class="card" data-card>
            <div class="card-content">
                <h2 class="card-title">测点信息</h2>
                <h2 class="card-name">---------------------</h2>
		<h2 class="card-name"><?php echo $tb_point_table_arr['point_cabinet']?></h2>
		<h2 class="card-name"><?php echo $tb_point_table_arr['point_kks']?></h2>
                <h2 class="card-name">---------------------</h2>
                <p class="card-desc"><?php echo "卡件：".$tb_point_table_arr['point_slot']."->通道：".$tb_point_table_arr['point_channel']?></p>
                <p class="card-desc"><?php echo "端子：".$tb_point_table_arr['point_terminal']."★".$tb_point_table_arr['terminal_a']."-".$tb_point_table_arr['terminal_b']?></p>
		<p class="card-desc"><?php 
		if($tb_point_table_arr['point_rangelo'] === NULL){
		echo "电压：".$tb_point_table_arr['point_spec'];
		}else{
		echo "量程：".$tb_point_table_arr['point_rangelo']."-".$tb_point_table_arr['point_rangehi']." ".$tb_point_table_arr['point_unit'];
		}
?></p>
		<a class="card-btn" href="/dkcode/dkcode/taizhang/point_table/look_content.php?id=<?php echo $tb_point_table_arr['point_number'] ?>" target="_blank" rel="noopener">详细</a>
            </div>
            <div class="card-gloss"></div>
            <div class="card-footer-glow"></div>
        </div>
    </div>
<?php
	}
?>
<?php
	//工作
	$tb_jobs_sql = 'SELECT * FROM tb_jobs WHERE job_account_id = '.$account_id;
	$tb_jobs_result = mysqli_query($con, $tb_jobs_sql);
	while($tb_jobs_arr=mysqli_fetch_assoc($tb_jobs_result)){

		$tb_user_sql = "SELECT * FROM `tb_user` WHERE user_id =".$tb_jobs_arr['job_header'];
		$tb_user_result = mysqli_query($con, $tb_user_sql);
		$tb_user_arr=mysqli_fetch_assoc($tb_user_result);

		$tb_diary_sql = "SELECT * FROM `tb_diary` WHERE diary_id =".$tb_jobs_arr['diary_id'];
		$tb_diary_result = mysqli_query($con, $tb_diary_sql);
		$tb_diary_arr=mysqli_fetch_assoc($tb_diary_result);
?>
    <!-- 卡片 3：相关工作 -->
    <div class="card-container">
        <div class="card" data-card>
            <div class="card-content">
                <h2 class="card-title">工作信息</h2>
                <h2 class="card-name">---------------------</h2>
		<h2 class="card-name"><?php echo $tb_user_arr['user_name']?></h2>
		<h2 class="card-name"><?php echo $tb_diary_arr['createtime']?></h2>
                <h2 class="card-name">---------------------</h2>
                <p class="card-desc"><?php echo "卡件：".$tb_point_table_arr['point_slot']."->通道：".$tb_point_table_arr['point_channel']?></p>
                <p class="card-desc"><?php echo "端子：".$tb_point_table_arr['point_terminal']."★".$tb_point_table_arr['terminal_a']."-".$tb_point_table_arr['terminal_b']?></p>
		<p class="card-desc"><?php 
		if($tb_point_table_arr['point_rangelo'] === NULL){
		echo "电压：".$tb_point_table_arr['point_spec'];
		}else{
		echo "量程：".$tb_point_table_arr['point_rangelo']."-".$tb_point_table_arr['point_rangehi']." ".$tb_point_table_arr['point_unit'];
		}
?></p>
		<a class="card-btn" href="/dkcode/dkcode/taizhang/point_table/look_content.php?id=<?php echo $tb_point_table_arr['point_number'] ?>" target="_blank" rel="noopener">详细</a>
            </div>
            <div class="card-gloss"></div>
            <div class="card-footer-glow"></div>
        </div>
    </div>
<?php
	}
?>

<?php
	mysqli_close($con);
?>

<script>
    (function() {
        const MAX_ANGLE = 14;                // 最大旋转角度
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            const gloss = card.querySelector('.card-gloss');
            if (!gloss) return;

            function handleMouseMove(e) {
                const rect = card.getBoundingClientRect();
                let x = (e.clientX - rect.left) / rect.width;
                let y = (e.clientY - rect.top) / rect.height;
                x = Math.min(1, Math.max(0, x));
                y = Math.min(1, Math.max(0, y));

                const rotateY = (x - 0.5) * 2 * MAX_ANGLE;
                const rotateX = (0.5 - y) * 2 * MAX_ANGLE;

                card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
                gloss.style.setProperty('--x', x);
                gloss.style.setProperty('--y', y);
                card.style.boxShadow = '0 35px 55px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(255, 255, 255, 0.2) inset';
            }

            function handleMouseLeave() {
                card.style.transform = 'rotateX(0deg) rotateY(0deg)';
                gloss.style.setProperty('--x', '0.5');
                gloss.style.setProperty('--y', '0.5');
                card.style.boxShadow = '0 25px 40px -15px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1) inset';
            }

            card.addEventListener('mousemove', handleMouseMove);
            card.addEventListener('mouseleave', handleMouseLeave);

            // 触摸事件
            card.addEventListener('touchmove', function(e) {
                e.preventDefault();
                const touch = e.touches[0];
                if (touch) {
                    handleMouseMove({
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                }
            }, { passive: false });

            card.addEventListener('touchend', handleMouseLeave);
            card.addEventListener('touchcancel', handleMouseLeave);
        });
    })();
</script>

<!-- 说明：采用CSS Grid自动填充均匀分布8张卡片，每张卡片宽高比5:7，支持响应式。按钮为真实链接，点击在新标签页打开示例页面。3D旋转与高光独立作用于每个卡片。 -->
</body>
</html>
