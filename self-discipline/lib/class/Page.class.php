<?php
class Page {
	private $count;//总条数
	private $pagesize;//每页显示条数
	private $page;//当前页码
	private $pageend;//总页数
	private $sqlId;//SQL语句
	private $pageId;//SQL语句
	private $tbodyId;//更新表格空间
	private $pageFunction;//更新表格空间
	private $tbJson;
		
	public function __construct($count,$pagesize,$sqlId,$tbodyId,$pageFunction,$tbJson){
	//public function __construct($count,$pagesize,$sqlId,$tbodyId){
		$this->count = $count;
		$this->pagesize = $pagesize;
		$this->sqlId = $sqlId;
		$this->page = 1;
		$this->pageend = ceil($count/$pagesize);
		$this->tbodyId = $tbodyId;
		$this->pageId = "pageId".$tbodyId;
		$this->pageFunction = $pageFunction;
		$this->tbJson = $tbJson;
	}
	public function showPage(){
		echo "<center>";
		//echo "page";
		echo "当前页<span id='".$this->pageId."'>".$this->page."</span>/".$this->pageend;
		//echo $this->sqlId;
		//echo "page";
		echo "总共".$this->count."条";
		echo "<a href='javascript:void(0)' onclick = Page('head','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,$this->pageFunction,$this->tbJson)>首页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('front','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,$this->pageFunction,$this->tbJson)>上一页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('next','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,$this->pageFunction,$this->tbJson)>下一页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('end','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,$this->pageFunction,$this->tbJson)>尾页</a>";
		/*
		echo "<a href='javascript:void(0)' onclick = Page('head','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,defectPage)>首页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('front','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,defectPage)>上一页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('next','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,'defectPage')>下一页</a>";
		echo "<a href='javascript:void(0)' onclick = Page('end','{$this->tbodyId}','{$this->sqlId}','{$this->pageId}',$this->pageend,$this->pagesize,defectPage)>尾页</a>";
		 */
		echo "</center>";

	}
	function __destruct(){
	//	print "销毁";
	}
}
?>
