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
	if(isset($_GET['fineid'])) {
		$sql="update fine set mode=2,finestatus=1,cleardate='$today' where fineid=$_GET[fineid]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Payment Success',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../fine.php');}
		});
		</script>";
	}
	?>
</body>
</html>