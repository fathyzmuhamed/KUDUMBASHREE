<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
$email=$_POST['uname'];
$sql="delete from reg where username='$email'";
$ob->db_write($sql);
$sql="delete from login where username='$email'";
$ob->db_write($sql);
echo 1;
exit();
?>