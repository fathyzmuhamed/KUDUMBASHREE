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
		$sql="insert into gallery(title) values ('$_POST[title]')";
		$ob->db_write($sql);
		$sql="select max(gid) as g from gallery";
		$res=$ob->db_write($sql);
		$row=mysqli_fetch_assoc($res);
		$g=$row['g'];
		$file_name='g'.$g;
		$target_dir = "../../gallery/";
		$target_file = $target_dir . basename($_FILES["pic"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
			$old=basename( $_FILES["pic"]["name"]);
			$new=$file_name.'.'.$imageFileType;
			rename("../../gallery/$old","../../gallery/$new");
			$sql="update gallery set pic='$new' where gid=$g";
			$ob->db_write($sql);
		} 
		echo "<script>Swal.fire({icon:'success',text:'Photo added successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../gallery.php');}
		});
		</script>";
	}
	?>
</body>
</html>