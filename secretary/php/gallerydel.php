<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if(isset($_POST['del'])) {
	$sql="select * from gallery where gid=$_POST[id]";
	$res=$ob->db_write($sql);
	$row=mysqli_fetch_assoc($res);
	$path="../../gallery/".$row['pic'];
	unlink($path);
	$sql="delete from gallery where gid=$_POST[id]";
	$ob->db_write($sql);
	echo 1;
	exit();
}
?>