<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if(isset($_POST['addr'])) {
	$reqid=$_POST['reqid'];
	$reply=$_POST['reply'];
	$sql="update jagratha set status=2,reply='$reply' where requestid=$reqid";
	$ob->db_write($sql);
	echo 1;
	exit();
}
?>