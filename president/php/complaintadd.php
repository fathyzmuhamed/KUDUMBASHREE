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
	$date=date('Y-m-d');
	$uname=$_SESSION['userid'];
	if(isset($_POST['add'])) {
		$sql="insert into complaints (username,subject,description,date,status) values ('$uname','$_POST[sub]','$_POST[desc]','$date',1)";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Complaint added successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../complaintviewmy.php');}
		});
		</script>";
	}
	?>
</body>
</html>