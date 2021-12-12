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
	$today=date('Y-m-d');
	if(isset($_POST['adda'])) {
		for($i=0,$n=1;$i<$_POST['num'];$i++,$n++) {	
			$user=substr($_POST['r'.$n],0,-1);
			$pre=(int)substr($_POST['r'.$n],-1);		
			$sql="insert into attendance (meetid,user,present) values ($_POST[meetid],'$user',$pre)";
			$ob->db_write($sql);
		}
		$sql="update meeting set attstatus=1 where meetid=$_POST[meetid]";
		$ob->db_write($sql);
		$sql="select * from variables";
		$res=$ob->db_write($sql);	
		$row=mysqli_fetch_assoc($res);
		$fine=$row['attfine'];
		$sql="select * from attendance,meeting where attendance.meetid=meeting.meetid and attendance.meetid=$_POST[meetid] and present=0";
		$res=$ob->db_write($sql);
		if(mysqli_num_rows($res)!=0) {
			while($row=mysqli_fetch_assoc($res)) {
				$cause="Absent in meeting on ".date_format(date_create($row['date']),'d-m-Y');
				$sql="insert into fine (user,date,cause,amount) values ('$row[user]','$today','$cause',$fine)";
				$ob->db_write($sql);
			}
		}
		echo "<script>Swal.fire({icon:'success',text:'Attendance added successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../meethistory.php');}
		});
		</script>";
	}
	if(isset($_POST['addt'])) {
		$sql="select * from variables";
		$res=$ob->db_write($sql);
		$row=mysqli_fetch_assoc($res);
		$thrift=$row['thrift'];
		for($i=0,$n=1;$i<$_POST['num'];$i++,$n++) {	
			$user=substr($_POST['r'.$n],0,-1);
			$stat=(int)substr($_POST['r'.$n],-1);
			if($stat==0) {		
				$sql="insert into thrift (meetid,user,mode,amount,date,tstatus) values ($_POST[meetid],'$user',0,$thrift,'$today',$stat)";
				$ob->db_write($sql);
			}
			else {
				$sql="insert into thrift (meetid,user,mode,amount,date,paydate,tstatus) values ($_POST[meetid],'$user',1,$thrift,'$today','$today',$stat)";
				$ob->db_write($sql);
			}
		}
		$sql="update meeting set thriftstatus=1 where meetid=$_POST[meetid]";
		$ob->db_write($sql);
		echo "<script>Swal.fire({icon:'success',text:'Thrift details added successfully',
		showClass: {popup: 'animated fadeInDown faster'
		},
		hideClass: {popup: 'animated zoomOut faster'
		},didClose:()=>{window.location.replace('../meethistory.php');}
		});
		</script>";
	}
	if(isset($_POST['addm'])) {
		$file_name=$_POST['meetid'];
		$target_dir = "../../minutes/";
		$target_file = $target_dir . basename($_FILES["minutes"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType=='pdf') {
			if (move_uploaded_file($_FILES["minutes"]["tmp_name"], $target_file)) {
				$old=basename( $_FILES["minutes"]["name"]);
				$new=$file_name.'.'.$imageFileType;
				rename("../../minutes/$old","../../minutes/$new");
				$sql="update meeting set minutes='$new' where meetid=$_POST[meetid]";
				$ob->db_write($sql);
				echo "<script>Swal.fire({icon:'success',text:'Minutes added successfully',
				showClass: {popup: 'animated fadeInDown faster'
				},
				hideClass: {popup: 'animated zoomOut faster'
				},didClose:()=>{window.location.replace('../meethistory.php');}
				});
				</script>";
			} 
		}
		else {
			echo "<script>Swal.fire({icon:'error',text:'Please upload a pdf file!',
			showClass: {popup: 'animated fadeInDown faster'
			},
			hideClass: {popup: 'animated zoomOut faster'
			},didClose:()=>{window.location.replace('../meethistory.php');}
			});
			</script>";
		}
	}
	?>
</body>
</html>