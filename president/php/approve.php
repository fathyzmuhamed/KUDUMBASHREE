<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
$email=$_POST['uname'];
$sql="update reg set status=1 where username='$email'";
$ob->db_write($sql);
echo 1;
exit();
?>