<?php
session_start();
require("../../db.class.php");
$ob=new db_operations();
$uname=$_SESSION['userid'];
$today=date('Y-m-d');
if (isset($_POST['add'])) {
	$sql="select * from loan where user='$uname' and (lstatus=0 or lstatus=1)";
	$res=$ob->db_write($sql);
	if(mysqli_num_rows($res)==0) {
		$sql="insert into loan(user,totalamount,date) values('$uname',$_POST[amt],'$today')";
		$ob->db_write($sql);
		echo 1;
		exit();
	}
	else {
		echo 0;
		exit();
	}
}
if(isset($_POST['lid'])) {
	$sql="select * from loaninstallment where loanid=$_POST[lid]";
	$res=$ob->db_write($sql);
	if(mysqli_num_rows($res)==0) {
		echo "<h6>No installments made</h6>";
		exit();
	}
	else {
		$n=1;
		echo "<div class='row' style='margin: 10px;text-align: right;'>";
		echo "<div class='col-md-1' style='font-weight: bolder;'>#</div>";
		echo "<div class='col-md-4' style='font-weight: bolder;'>Amount</div>";
		echo "<div class='col-md-4' style='font-weight: bolder;'>Paid Date</div>";
		echo "<div class='col-md-3' style='font-weight: bolder;'>Mode</div><div class='col-md-12'>&nbsp;</div>";
		while($row=mysqli_fetch_assoc($res)) {
			echo "<div class='col-md-1'>".$n++."</div>";
			echo "<div class='col-md-4'>".$row['pamount']."</div>";
			echo "<div class='col-md-4'>".date_format(date_create($row['paiddate']),'d-m-Y')."</div>";
			if($row['mode']==1)
				echo "<div class='col-md-3'>Direct</div>";
			else
				echo "<div class='col-md-3'>Online</div>";
		}	
		echo "</div>";
		exit();
	}
}
if(isset($_POST['update'])) {
	$sql="insert into loaninstallment (loanid,pamount,paiddate,mode) values ($_POST[loid],$_POST[amt],'$today',1)";
	$ob->db_write($sql);
	$sql="update loan set paidamount=paidamount+$_POST[amt] where loanid=$_POST[loid]";
	$ob->db_write($sql);
	$sql="select * from loan where loanid=$_POST[loid]";
	$res=$ob->db_write($sql);
	$row=mysqli_fetch_assoc($res);
	if(($row['totalamount']*1.06)==$row['paidamount']) {
		$sql="update loan set lstatus=2,closedate='$today' where loanid=$_POST[loid]";
		$ob->db_write($sql);
	}
	echo 1;
	exit();
}
?>