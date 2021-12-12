<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
$today=date('Y-m-d');
if (isset($_POST['meetid'])) {
	$sql="select * from thrift,meeting,reg where reg.username=thrift.user and thrift.meetid=meeting.meetid and thrift.meetid=$_POST[meetid] order by tstatus desc";
	$res=$ob->db_write($sql);
	echo "<h6>Meeting Id : ".$_POST['meetid']."</h6>";
	echo "<div class='row' style='margin: 10px;'>";
	while($row=mysqli_fetch_assoc($res)) {
		echo "<div class='col-md-4'>";
		echo "<h6>".$row['name']."</h6>";
		echo "</div>";
		echo "<div class='col-md-5'>";
		if ($row['mode']==1) {
			echo "<i class='fa fa-check' style='color: green;'></i> (Direct) - ";
			echo date_format(date_create($row['date']),'d-m-Y');
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo $row['amount'];
			echo "</div>";
		}
		else if ($row['mode']==2) {
			echo "<i class='fa fa-check' style='color: green;'></i> (Online) - ";
			echo date_format(date_create($row['date']),'d-m-Y');
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo $row['amount'];
			echo "</div>";
		}
		else {
			echo "<i class='fa fa-close' style='color: red;'></i>";
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo '0.00';
			echo "</div>";
		}
	}		
	echo "</div>";
	exit();
}
if (isset($_POST['date'])) {
	$sql="select * from monthly,reg where reg.username=monthly.user and monthly.date='$_POST[date]' order by mstatus desc";
	$res=$ob->db_write($sql);
	echo "<h6>Month Year : ".date_format(date_create($_POST['date']),'My')."</h6>";
	echo "<div class='row' style='margin: 10px;'>";
	while($row=mysqli_fetch_assoc($res)) {
		echo "<div class='col-md-4'>";
		echo "<h6>".$row['name']."</h6>";
		echo "</div>";
		echo "<div class='col-md-5'>";
		if ($row['mode']==1) {
			echo "<i class='fa fa-check' style='color: green;'></i> (Direct) - ";
			echo date_format(date_create($row['date']),'d-m-Y');
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo $row['amount'];
			echo "</div>";
		}
		else if ($row['mode']==2) {
			echo "<i class='fa fa-check' style='color: green;'></i> (Online) - ";
			echo date_format(date_create($row['date']),'d-m-Y');
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo $row['amount'];
			echo "</div>";
		}
		else {
			echo "<i class='fa fa-close' style='color: red;'></i>";
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo "0.00";
			echo "</div>";
		}
	}		
	echo "</div>";
	exit();
}
?>