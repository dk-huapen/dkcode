					<fieldset>
<?php
								$sql = "select * from tb_text where text_id=1";
								$result = mysqli_query($conn, $sql);
								$text_arr=mysqli_fetch_assoc($result);
?>
						<legend style="border:1px">最新通知</legend>
						<textarea id="news_id" rows="5" style="width:100%" name="news" ><?php echo $text_arr['text4'] ?></textarea>
						<span id=news_result_id><?php echo date('Y-m-d h:i:s A');?></span>
						<button style="width:100%" onclick="out_news('news_id','news_result_id')">发布</button>
					</fieldset>

