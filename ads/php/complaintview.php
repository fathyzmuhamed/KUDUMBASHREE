<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if(isset($_POST['addr'])) {
	$compid=$_POST['compid'];
	$reply=$_POST['reply'];
	$sql="update complaints set status=3,reply='$reply' where compid=$compid";
	$ob->db_write($sql);
	echo 1;
	exit();
}
?>