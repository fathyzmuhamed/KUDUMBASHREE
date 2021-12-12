<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if(isset($_POST['frwd'])) {
	$sql="update jagratha set status=1 where requestid=$_POST[reqid]";
	$ob->db_write($sql);
	echo 1;
	exit();
}
?>