<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title> 
  <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
  <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
  <script type="text/javascript" src="assets/js/sweetalert2@10.js"></script>
  <link rel="stylesheet" href="assets/css/animate.min.css">
</head>
<body>
  <?php
  require("db.class.php");
  $ob=new db_operations();
  $select="select * from login where username='$_POST[email]'";
  $selr=$ob->db_read($select);
  if((mysqli_num_rows($selr))>0) { 
    echo "<script>Swal.fire({icon:'error',text:'User already exists!',
    showClass: {popup: 'animated fadeInDown faster'
    },
    hideClass: {popup: 'animated zoomOut faster'
    },didClose:()=>{window.location.replace('index.php');}
    });
    </script>";
  }
  if((mysqli_num_rows($selr))==0) {  

    $file_name=strstr($_POST['email'], '@', true);  
    $target_dir = "profilepics/";
    $target_file = $target_dir . basename($_FILES["pic"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $pic=$file_name.'.'.$imageFileType;
    $insertq="insert into reg(username,name,dob,contact,house,street,city,pic)values('$_POST[email]','$_POST[name]','$_POST[dob]','$_POST[ph]','$_POST[house]','$_POST[street]','$_POST[city]','$pic')";
    $insertlog="insert into login values('$_POST[email]','$_POST[password]','m')";
    $res=$ob->db_write($insertq);
    if($res) {
      $res2=$ob->db_write($insertlog);
    }
    if(($res)&&($res2)) {
      move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file);
      $old=basename( $_FILES["pic"]["name"]);
      $new=$file_name.'.'.$imageFileType;
      rename("profilepics/$old","profilepics/$new");
      echo "<script>Swal.fire({icon:'success',text:'Registered Successfully',
      showClass: {popup: 'animated fadeInDown faster'
      },
      hideClass: {popup: 'animated zoomOut faster'
      },didClose:()=>{window.location.replace('index.php');}
      });
      </script>";
    }
  }
  ?>
</body>
</html>