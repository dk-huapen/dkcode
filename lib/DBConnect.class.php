<?php
class DBConnect {
	private static $db = null;
	private $conn;
	private $result;
	private $array;
	private $num;
	private function __construct(){
		$this->conn = mysqli_connect('localhost','root','dk1314lich,forever!','db_rekong');
		if(!$this->conn){
			die("连接失败". mysqli_connect_error());
		}else { 
			//echo"连接成功";
		}
		mysqli_query('set names utf8');
	}
	public static function getDB(){
		if(self::$db == null){
			self::$db = new DBConnect();
		}
		return self::$db;
	}
	public function select($sql){
		$this->result = mysqli_query($this->conn,$sql);
		$this->array = mysqli_fetch_assoc($this->result);
		$this->num = mysqli_num_rows($this->result);
	}
	public function get_Result(){
		return $this->result;
	}
	public function get_Array(){
		return $this->array;
	}
	public function get_Num(){
		return $this->num;
	}
}
?>
