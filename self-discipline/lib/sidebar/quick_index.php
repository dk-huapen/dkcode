<!--功能：该文件用于快速查询指定ID的台帐。用法：使用include包含进入文件。注意：action的路径使用的是/var/www/html/作为/目录。-->
<h3>快速检索</h3>
		<!--通过将设备台帐设备ID直接发送至查看台帐脚本实现快速查询指定设备台帐-->
		<form action="/taizhang/equipment_account/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">设备编号</legend>
		<input type="text"style="width:100%" name="id" size="6" placeholder="设备ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
		
		<form action="/taizhang/point_table/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">测点编号</legend>
		<input type="text"style="width:100%" name="id" size="6" placeholder="测点ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
		<!--通过将备件清单备件ID直接发送至查看备件脚本实现快速查询指定备件信息-->
		<form action="/beipingbeijian/goods/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">备件编号</legend>
		<input type="text" style="width:100%"name="id" size="6" placeholder="备件ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
		
		<!--通过将缺陷清单缺陷ID直接发送至查看缺陷脚本实现快速查询指定缺陷信息-->
		<form action="/quexian/defect/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">缺陷编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="缺陷ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
		
		<!--通过将缺陷清单缺陷ID直接发送至查看缺陷脚本实现快速查询指定缺陷信息-->
		<form action="/taizhang/group_account/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">分组编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="设备组ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
		<form action="/data/instruction/look_content.php" method="get" target="_blank">
<fieldset>
		<legend style="border:1px">文档编号</legend>
		<input type="text"style="width:100%"name="id" size="6"placeholder="文档ID"/>
		<input type="submit"style="width:100%" value="查询"/>
</fieldset>
		</form>
