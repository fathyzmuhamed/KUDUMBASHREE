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
	if(isset($_POST['updatepre'])) {
		$sql="update login set type='m' where type='p'";
		$ob->db_write($sql);
		$sql="update login set type='p' where username='$_POST[pre]'";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'President changed successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../memberdetails.php');}
		});
		</script>";
	}
	if(isset($_POST['updatesec'])) {
		$sql="update login set type='m' where type='s'";
		$ob->db_write($sql);
		$sql="update login set type='s' where username='$_POST[sec]'";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Secretary changed successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../memberdetails.php');}
		});
		</script>";
	}
	?>
</body>
</html>