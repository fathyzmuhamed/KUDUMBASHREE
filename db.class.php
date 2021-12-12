<?php
$con=new mysqli("localhost:3306","root","","kudumbasree");
class db_operations {
	function db_write($query) {
		$result=mysqli_query($GLOBALS['con'],$query);
		return $result;
	}
	function db_read($query) {
		$res=mysqli_query($GLOBALS['con'],$query);
		if(!$res)
			echo "SELECTquery error";
		else {
			return $res;
		}
	}
}
?>
