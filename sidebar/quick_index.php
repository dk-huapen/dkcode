<!--功能：该文件用于快速查询指定ID的台帐。用法：使用include包含进入文件。注意：action的路径使用的是/var/www/html/作为/目录。-->
<fieldset>
	<legend style="border:1px"><h4>快速检索</h4></legend>
<fieldset>
		<form action="<?= base_url('/dkcode/diary/job/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">工作编号</legend>
		<input type="text"style="width:100%" name="id" size="6" placeholder="设备ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
<fieldset>
		<form action="<?= base_url('/dkcode/taizhang/equipment_account/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">设备编号</legend>
		<input type="text"style="width:100%" name="id" size="6" placeholder="设备ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
		
<fieldset>
		<form action="<?= base_url('/dkcode/taizhang/point_table/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">测点编号</legend>
		<input type="text"style="width:100%" name="id" size="6" placeholder="测点ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
<fieldset>
		<form action="<?= base_url('/dkcode/beipingbeijian/goods/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">备件编号</legend>
		<input type="text" style="width:100%"name="id" size="6" placeholder="备件ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
		
<fieldset>
		<form action="<?= base_url('/dkcode/quexian/defect/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">缺陷编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="缺陷ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
		
<fieldset>
		<form action="<?= base_url('/dkcode/taizhang/group_account/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">分组编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="设备组ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
<fieldset>
		<form action="<?= base_url('/dkcode/data/instruction/look_content.php')?>" method="get" target="_blank">
		<legend style="border:1px">文档编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="文档ID"/>
		<input type="submit"style="width:100%" value="查询"/>
		</form>
</fieldset>
</fieldset>
