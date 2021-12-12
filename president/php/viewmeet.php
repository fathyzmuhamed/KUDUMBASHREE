<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
if (isset($_POST['meetid'])) {
	$sql="select * from attendance,meeting,reg where reg.username=attendance.user and attendance.meetid=meeting.meetid and attendance.meetid=$_POST[meetid] order by present desc";
	$res=$ob->db_write($sql);
	echo "<div class='row' style='margin: 10px;'>";
	while($row=mysqli_fetch_assoc($res)) {
		echo "<div class='col-md-6'>";
		echo "<h6>".$row['name']."</h6>";
		echo "</div>";
		echo "<div class='col-md-6'>";
		if ($row['present']==1) {
			echo "<i class='fa fa-check' style='color: green;'></i>";
		}
		else {
			echo "<i class='fa fa-close' style='color: red;'></i>";
		}
		echo "</div>";
	}	
	echo "</div>";
	exit();
}
if (isset($_POST['meetid2'])) {
	$sql="select * from thrift,meeting,reg where reg.username=thrift.user and thrift.meetid=meeting.meetid and thrift.meetid=$_POST[meetid2] order by tstatus desc";
	$res=$ob->db_write($sql);
	echo "<div class='row' style='margin: 10px;'>";
	while($row=mysqli_fetch_assoc($res)) {
		echo "<div class='col-md-6'>";
		echo "<h6>".$row['name']."</h6>";
		echo "</div>";
		echo "<div class='col-md-6'>";
		if ($row['tstatus']==1) {
			echo "<i class='fa fa-check' style='color: green;'></i>(Direct)";
		}
		else if ($row['tstatus']==2) {
			echo "<i class='fa fa-check' style='color: green;'></i>(Online)";
		}
		else {
			echo "<i class='fa fa-close' style='color: red;'></i>";
		}
		echo "</div>";
	}	
	echo "</div>";
	exit();
}
if (isset($_POST['meetid3'])) {
	$sql="select * from meeting where meetid=$_POST[meetid3]";
	$res=$ob->db_write($sql);
	$row=mysqli_fetch_assoc($res);	
	echo "<p>".$row['minutes']."</p>";
	exit();
}
?>