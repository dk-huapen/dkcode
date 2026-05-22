<html>
	<head>
		<?php include("header.php") ?>
	</head>
	<body >
		<div class="header">
			<h1>热控班组管理平台</h1>
		</div>
		<div class="topnav">
			<?php include("../../lib/topnav/topnav.php") ?>
		</div>
		<div class="row">
			<div class="leftcolumn">
				<div class="card">
<?php
	$first_day_of_month = date('Y-m-01');
	$first_day_of_month_week = date('W',strtotime($first_day_of_month));
	$current_week = date('W') - $first_day_of_month_week + 1;
	$m = date('M');
echo "<center><h2>热控专业技术监督</h2></center>";
?>
<table border = "1">
		<caption>热控模拟量控制系统统计报表</caption>
<tfoot>
<td colspan="6">填报人：填报日期：</td>
</tfoot>
	<tbody>
		<tr>
			<td>公司</td>
			<td colspan = "5">中节能</td>
		</tr>
		<tr>
			<td rowspan = "2">机组</td>
			<td colspan = "3">自动投入率</td>
			<td rowspan = "2">未投入原因</td>
			<td rowspan = "2">处理措施</td>
		</tr>
		<tr>
			<td>设计安装总数</td>
			<td>投入数</td>
			<td>投入率%</td>
		</tr>
		<tr>
<?php
		$conn = mysqli_connect('localhost','root','dk1314lich,forever!','db_rekong');
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 10";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 10";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
<?php
		echo '<tr>';
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号锅炉</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 12";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 12";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4号锅炉</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 14";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 14";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 15";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 15";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 16";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 16";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 17";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 17";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>5号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 18";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 18";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=2 AND equipment_area_id = 19";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=2 AND equipment_area_id = 19";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>公用部分</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>全厂合计</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
</tbody>
</table>
<table border = "1">
		<caption>热控保护系统统计报表</caption>
<tfoot>
<td colspan="6">填报人：填报日期：</td>
</tfoot>
	<tbody>
		<tr>
			<td>公司</td>
			<td colspan = "5">中节能</td>
		</tr>
		<tr>
			<td rowspan = "2">机组</td>
			<td colspan = "3">保护投入率</td>
			<td rowspan = "2">未投入原因</td>
			<td rowspan = "2">处理措施</td>
		</tr>
		<tr>
			<td>设计安装总数</td>
			<td>投入数</td>
			<td>投入率%</td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 10";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 10";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
<?php
		echo '<tr>';
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号锅炉</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 12";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 12";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4号锅炉</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 14";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 14";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 15";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 15";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 16";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 16";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 17";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 17";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>5号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 18";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 18";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account_group where equipment_group_type=3 AND equipment_area_id = 19";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account_group where equipment_group_status = 3 AND equipment_group_type=3 AND equipment_area_id = 19";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>公用部分</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>全厂合计</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
</tbody>
</table>
<table border = "1">
		<caption>热控检测参数统计报表</caption>
<tfoot>
<td colspan="6">填报人：填报日期：</td>
</tfoot>
	<tbody>
		<tr>
			<td>公司</td>
			<td colspan = "5">中节能</td>
		</tr>
		<tr>
			<td rowspan = "2">机组</td>
			<td colspan = "3">测点投入率</td>
			<td rowspan = "2">未投入原因</td>
			<td rowspan = "2">处理措施</td>
		</tr>
		<tr>
			<td>设计安装总数</td>
			<td>投入数</td>
			<td>投入率%</td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 1";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 1";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
<?php
		echo '<tr>';
		$count_sql = "select count(*) from tb_account where equipment_system_id = 2";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 2";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号锅炉</td>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 3";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>4号锅炉</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 5";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 5";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>1号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 6";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 6";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>2号汽轮机</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>3号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 7";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 7";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>4号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 8";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 8";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>5号汽轮机</td>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 9";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 9";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
<?php
		$count_sql = "select count(*) from tb_account where equipment_system_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum1 = $result[0];
		$count_sql = "select count(*) from tb_account where equipment_status=3 AND equipment_system_id = 11";
        	$re = mysqli_query($conn,$count_sql);
        	$result = mysqli_fetch_row($re);
        	$autonum2 = $result[0];
        	$auto = round($autonum2/$autonum1*100,2);
?>
			<td>公用部分</td>
			<td><?php echo $autonum1 ?></td>
			<td><?php echo $autonum2 ?></td>
			<td><?php echo $auto ?></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>全厂合计</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
</tbody>
</table>
<h3>一、设备概况</h3>
<h4>1、巡检中发现的问题</h4>
						<?php
						include_once("../../lib/class/Job.class.php");
						$job_obj = new Job;
						$job_obj->reportSelect(40,10);
						echo "<h4>2、设备目前存在的问题</h4>";
						$job_obj->reportSelect(20,21);
?>
</div>
				<div class="card">
<h3>二、本周计划工作完成情况（包含定期工作）</h3>
<?php
						echo "<h4>1、本周重点工作</h4>";
						$job_obj->reportSelect(40,0);
						echo "<h4>2、本周定期工作</h4>";
						$job_obj->reportSelect(40,2);
						echo "<h4>3、本周未完成工作</h4>";
						$job_obj->reportSelect(10,2);
						$job_obj->reportSelect(10,0);
?>
</div>
				<div class="card">
<h3>六、本周设备管理分析</h3>
<?php
						include_once("../../lib/class/Analysis.class.php");
						include_once("../../lib/class/Defect.class.php");
						echo "本周设备管理分析";
						echo "<h4>1、缺陷分析</h4>";
						$defect_obj = new Defect;
						$defect_obj->reportDefect(1);
						echo "<h4>2、重点缺陷分析</h4>";
						$ana_obj = new Analysis;
						$ana_obj->reportAnalysis(1);
?>
</div>
				<div class="card">
<h3>八、培训情况</h3>
<?php
						echo "<h4>1、本周培训</h4>";
						$job_obj->reportSelect(40,12);
						$job_obj->reportSelect(40,13);
						echo "<h4>2、下周培训</h4>";
						$job_obj->reportSelect(30,12);
						$job_obj->reportSelect(30,13);
?>
</div>
				<div class="card">
<h3>九、下周工作计划</h3>
<?php
						echo "<h4>1、下周重点工作</h4>";
						$job_obj->reportSelect(30,0);
						echo "<h4>2、下周定期工作</h4>";
						$job_obj->reportSelect(30,2);
						?>
				</div>
						<center><a href='../../lib/fpdf/preview_work.php' target="_blank">预览周报</a></center>
			</div>
			<div class="rightcolumn">
				<div class="card">
					<?php include("../../sidebar/ShowQRCode.php") ?>
				</div>
				<div class="card">
					<ul class="right">
						<li><a href="quick_select_job.php?id=10">当天工作</a></li>
						<li><a href="quick_select_job.php?id=20">昨天工作</a></li>
						<li><a href="quick_select_job.php?id=30">本周工作</a></li>
						<li><a href="quick_select_job.php?id=40">上周工作</a></li>
						<li><a href="quick_select_job.php?id=50">本月工作</a></li>
						<li><a href="quick_select_job.php?id=60">上月工作</a></li>
						<li><a href='add_job.php'>增加工作</a></li>
						<li><a href='add_standard_job.php'>增加标准工作</a></li>
					</ul>
				</div>
				<div class="card">
					<?php include("../../sidebar/quick_index.php") ?>
				</div>
				<div class="card">
				<!--最新通知-->
					<?php include("../../sidebar/notice.php")?>
				</div>
				<div class="card">
				<!--最新资讯-->
					<?php include("../../sidebar/news.php")?>
				</div>
			</div>
		</div>
		<div class="footer">
			<?php include("../../lib/footer/footer.php")?>
		</div>

</body>
</html>
