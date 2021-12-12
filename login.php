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
    session_start();
    require("db.class.php");
    $ob=new db_operations();

    $email=$_POST['username'];
    $insert1= "select * from login where username='$email'";

    $resr=$ob->db_read($insert1);
    if(mysqli_num_rows($resr)==0) {
      echo "<script>Swal.fire({icon:'error',text:'User not found!',
        showClass: {popup: 'animated fadeInDown faster'
      },
      hideClass: {popup: 'animated zoomOut faster'
    },didClose:()=>{window.location.replace('index.php');}
  });
</script>";
}
else {
  $result=mysqli_fetch_array($resr);
  if($result['password']==$_POST['password']) {
    $_SESSION['userid']=$email;
    if($result['type']=='a') {
    ?>
    <script>
      window.location.replace('ads/index.php');
    </script>
    <?php
    }
    else if($result['type']=='p') {
    ?>
    <script>
      window.location.replace('president/index.php');
    </script>
    <?php
    }
    else if($result['type']=='s') {
    ?>
    <script>
      window.location.replace('secretary/index.php');
    </script>
    <?php
    }
    else if($result['type']=='m') {
      $insert1= "select * from reg where username='$email'";
      $resr=$ob->db_read($insert1);
      $result=mysqli_fetch_array($resr);
      if($result['status']==1) {
      ?>
      <script>
        window.location.replace('members/index.php');
      </script>
      <?php
      }
      else {
      ?>
      <script>
        window.location.replace('members/unverified.php');
      </script>
      <?php
      }
    }
  }
  else {
    echo "<script>Swal.fire({icon:'error',text:'Invalid User Credentials!',
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