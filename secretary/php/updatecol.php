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
	if(isset($_POST['addt'])) {
		$sql="update variables set thrift=$_POST[thrift]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Thrift updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../updatecol.php');}
		});
		</script>";
	}
	if(isset($_POST['addm'])) {
		$sql="update variables set monthly=$_POST[monthly]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Monthly Collection updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../updatecol.php');}
		});
		</script>";
	}
	if(isset($_POST['addaf'])) {
		$sql="update variables set attfine=$_POST[afine]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Attendance fine updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../updatecol.php');}
		});
		</script>";
	}
	if(isset($_POST['addb'])) {
		$sql="update variables set bankbal=$_POST[bankbal]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Bank Balance updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../updatecol.php');}
		});
		</script>";
	}
	?>
</body>
</html>