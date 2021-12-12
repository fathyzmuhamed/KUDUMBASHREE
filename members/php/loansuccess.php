<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>	
	<script type="text/javascript" src="../../assets/js/jquery/jquery.min.js "></script>
	<script type="text/javascript" src="../../assets/js/bootstrap/js/bootstrap.min.js "></script>
	<script type="text/javascript" src="../../assets/js/sweetalert2@10.js"></script>
	<link rel="stylesheet" href="../../assets/css/animate.min.css">
</head>
<body>
	<?php
	session_start();
	require("../../db.class.php");
	$ob=new db_operations();
	$uname=$_SESSION['userid'];
	$today=date('Y-m-d');
	if(isset($_GET['lid'])&&isset($_GET['amt'])) {

		$sql="insert into loaninstallment (loanid,pamount,paiddate,mode) values ($_GET[lid],$_GET[amt],'$today',2)";
		$ob->db_write($sql);
		$sql="update loan set paidamount=paidamount+$_GET[amt] where loanid=$_GET[lid]";
		$ob->db_write($sql);
		$sql="select * from loan where loanid=$_GET[lid]";
		$res=$ob->db_write($sql);
		$row=mysqli_fetch_assoc($res);
		if(($row['totalamount']*1.06)==$row['paidamount']) {
			$sql="update loan set lstatus=2,closedate='$today' where loanid=$_GET[lid]";
			$ob->db_write($sql);
		}
		echo "<script>Swal.fire({icon:'success',text:'Payment Success',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../myloan.php');}
		});
		</script>";
	}
	?>
</body>
</html>