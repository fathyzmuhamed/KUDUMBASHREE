<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if(isset($_POST['compid'])) {
	$sql="delete from complaints where compid=$_POST[compid]";
	$ob->db_write($sql);
	echo 1;
	exit();
}
?>