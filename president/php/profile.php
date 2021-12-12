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
	if(isset($_POST['updatepro'])) {
		$sql="update reg set contact='$_POST[ph]',house='$_POST[house]',street='$_POST[street]',city='$_POST[city]' where username='$uname'";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Details updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../profile.php');}
		});
		</script>";
	}
	if(isset($_POST['updatepic'])) {
		$path="../../profilepics/".$_POST['pic'];
		unlink($path);
		$file_name=strstr($uname, '@', true);
		$target_dir = "../../profilepics/";
		$target_file = $target_dir . basename($_FILES["pro"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if (move_uploaded_file($_FILES["pro"]["tmp_name"], $target_file)) {
			$old=basename( $_FILES["pro"]["name"]);
			$new=$file_name.'.'.$imageFileType;
			rename("../../profilepics/$old","../../profilepics/$new");
			$sql="update reg set pic='$new' where username='$uname'";
			$ob->db_write($sql);
		} 
		echo "<script>Swal.fire({icon:'success',text:'Profile photo updated successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../profile.php');}
		});
		</script>";
	}
	if(isset($_POST['updatepass'])) {
		$sql="select * from login where username='$uname' and  password='$_POST[pass]'";
		$res=$ob->db_read($sql);
		if(mysqli_num_rows($res)==0) {
			echo "<script>Swal.fire({icon:'error',text:'Incorrect Password!',
			showClass: {popup: 'animated fadeInDown faster'
			},
			hideClass: {popup: 'animated zoomOut faster'
			},didClose:()=>{window.location.replace('../profile.php');}
			});
			</script>";
		}
		else {
			$sql="update login set password='$_POST[npass]' where username='$uname'";
			$ob->db_write($sql);
			echo "<script>Swal.fire({icon:'success',text:'Password updated successfully',
			showClass: {popup: 'animated fadeInDown faster'
			},
			hideClass: {popup: 'animated zoomOut faster'
			},didClose:()=>{window.location.replace('../profile.php');}
			});
			</script>";
		}
	}
	?>
</body>
</html>