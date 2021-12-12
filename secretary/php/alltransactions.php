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
			echo date_format(date_create($row['paydate']),'d-m-Y');
			echo "</div>";	
			echo "<div class='col-md-2' style='text-align: right;'>";
			echo $row['amount'];
			echo "</div>";
		}
		else if ($row['mode']==2) {
			echo "<i class='fa fa-check' style='color: green;'></i> (Online) -";
			echo date_format(date_create($row['paydate']),'d-m-Y');
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
if (isset($_POST['add'])) {
	$date=$_POST['date'];
	$sql="select max(date) as d from monthly where month(date)=month('$date')";
	$res=$ob->db_write($sql);
	$row=mysqli_fetch_assoc($res);	
	if($row['d']!='') {
		echo 0;
	}
	else {
		$sql="select * from variables";
		$res=$ob->db_write($sql);	
		$row=mysqli_fetch_assoc($res);
		$amt=$row['monthly'];
		$sql="select * from reg,login where login.username=reg.username and type!='a' and status=1";
		$res=$ob->db_write($sql);	
		while($row=mysqli_fetch_assoc($res)) {
			$sql="insert into monthly (date,user,amount,mstatus,mode) values ('$date','$row[username]','$amt',0,0)";
			$ob->db_write($sql);
		}
		echo 1;
	}
	exit();
}
if (isset($_POST['updatem'])) {
	$sql="update monthly set mstatus=1,mode=1,paiddate='$today' where mcid='$_POST[mcid]'";
	$res=$ob->db_write($sql);
	echo 1;
	exit();
}
if (isset($_POST['updatet'])) {
	$sql="update thrift set tstatus=1,mode=1,paydate='$today' where thriftid='$_POST[tid]'";
	$res=$ob->db_write($sql);
	echo 1;
	exit();
}
if (isset($_POST['updatef'])) {
	$sql="update fine set finestatus=1,mode=1,cleardate='$today' where fineid='$_POST[fid]'";
	$res=$ob->db_write($sql);
	echo 1;
	exit();
}
// select * from reg,login where reg.username not in (select user from monthly) and status=1 and login.username=reg.username and type!='a'
?>