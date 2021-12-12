<?php 
session_start();
require("../db.class.php");
$ob=new db_operations();

$page="Profile";
$uname=$_SESSION['userid'];
$sel="select * from reg where username='$uname'";
$res=$ob->db_read($sel);
$data=mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kudumbashree - Member</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 10]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="../images/logo.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
    <style type="text/css">
        html {
            scroll-behavior: smooth;
        }
        #myBtn {
            display: none; /* Hidden by default */
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="unverified.php">
                            <img class="img-fluid" src="../assets/images/logo.png" alt="Theme-Logo" style="max-width: 80%;" />
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <!-- <li class="header-notification">
                            <a href="#!" class="waves-effect waves-light">
                            <i class="ti-bell"></i>
                            <span class="badge bg-c-red"></span>
                            </a>
                            <ul class="show-notification">
                            <li>
                            <h6>Notifications</h6>
                            <label class="label label-danger">New</label>
                            </li>
                            <li class="waves-effect waves-light">
                            <div class="media">
                            <img class="d-flex align-self-center img-radius" src="../assets/images/avatar-2.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                            <h5 class="notification-user">John Doe</h5>
                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                            <span class="notification-time">30 minutes ago</span>
                            </div>
                            </div>
                            </li>
                            <li class="waves-effect waves-light">
                            <div class="media">
                            <img class="d-flex align-self-center img-radius" src="../assets/images/avatar-4.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                            <h5 class="notification-user">Joseph William</h5>
                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                            <span class="notification-time">30 minutes ago</span>
                            </div>
                            </div>
                            </li>
                            <li class="waves-effect waves-light">
                            <div class="media">
                            <img class="d-flex align-self-center img-radius" src="../assets/images/avatar-3.jpg" alt="Generic placeholder image">
                            <div class="media-body">
                            <h5 class="notification-user">Sara Soudein</h5>
                            <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                            <span class="notification-time">30 minutes ago</span>
                            </div>
                            </div>
                            </li>
                            </ul>
                        </li> -->
                        <li class="user-profile header-notification">
                            <a href="#!" class="waves-effect waves-light">
                                <img src="../profilepics/<?php echo $data['pic']."?time=".date("H:i:s")?>" class="img-radius" style="height: 40px;" alt="User-Profile-Image">
                                <span><?php echo $data['name']?></span>
                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">
                                <li class="waves-effect waves-light">
                                    <a href="unverified.php">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                    <a href="unverified.php">
                                        <i class="ti-settings"></i> Change Password
                                    </a>
                                </li>
                                <li class="waves-effect waves-light">
                                    <a href="javascript:;" onclick="logout()">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">
                        <div class="">
                            <div class="main-menu-header">
                                <img class="img-80 img-radius" style="height: 60px;" src="../profilepics/<?php echo $data['pic']."?time=".date("H:i:s")?>" alt="User-Profile-Image">
                                <div class="user-details">
                                    <span id="more-details"><?php echo $data['name']?><i class="fa fa-caret-down"></i></span>
                                </div>
                            </div>
                            <div class="main-menu-content">
                                <ul>
                                    <li class="more-details">
                                        <a href="unverified.php"><i class="ti-user"></i>View Profile</a>
                                        <a href="unverified.php"><i class="ti-settings"></i>Change Password</a>
                                        <a href="javascript:;" onclick="logout()"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
<!-- <div class="p-15 p-b-0">
<form class="form-material">
<div class="form-group form-primary">
<input type="text" name="footer-email" class="form-control">
<span class="form-bar"></span>
<label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
</div>
</form>
</div> -->
<div class="pcoded-navigation-label"></div>
<ul class="pcoded-item pcoded-left-item">
    <li class="" id="pro">
        <a href="unverified.php" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
            <span class="pcoded-mtext">Profile</span>
            <span class="pcoded-mcaret"></span>
        </a>
    </li>
</ul>
</div>
</nav>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><?php echo $page;?></h5>
                        <p class="m-b-0">Welcome Back! Member</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="unverified.php"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $page;?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <script type="text/javascript">
        document.getElementById('pro').setAttribute('class','active');
    </script>
    <style type="text/css">
        .card .card-heading {
            padding: 0 20px;
            margin: 0;
        }

        .card .card-heading.simple {
            font-size: 20px;
            font-weight: 300;
            color: #777;
            border-bottom: 1px solid #e5e5e5;
        }

        .card .card-heading.image img {
            display: inline-block;
            width: 46px;
            height: 46px;
            margin-right: 15px;
            vertical-align: top;
            border: 0;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .card .card-heading.image .card-heading-header {
            display: inline-block;
            vertical-align: top;
        }

        .card .card-heading.image .card-heading-header h3 {
            margin: 0;
            font-size: 14px;
            line-height: 16px;
            color: #262626;
        }

        .card .card-heading.image .card-heading-header span {
            font-size: 12px;
            color: #999999;
        }

        .card .card-body {
            padding: 0 20px;
            margin-top: 20px;
        }

        .card .card-media {
            padding: 0 20px;
            margin: 0 -14px;
        }

        .card .card-media img {
            max-width: 100%;
            max-height: 100%;
        }

        .card .card-actions {
            min-height: 30px;
            padding: 0 20px 20px 20px;
            margin: 20px 0 0 0;
        }

        .card .card-comments {
            padding: 20px;
            margin: 0;
            background-color: #f8f8f8;
        }

        .card .card-comments .comments-collapse-toggle {
            padding: 0;
            margin: 0 20px 12px 20px;
        }

        .card .card-comments .comments-collapse-toggle a,
        .card .card-comments .comments-collapse-toggle span {
            padding-right: 5px;
            overflow: hidden;
            font-size: 12px;
            color: #999;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-comments .media-heading {
            font-size: 13px;
            font-weight: bold;
        }

        .card.people {
            position: relative;
            display: inline-block;
            width: 170px;
            height: 300px;
            padding-top: 0;
            margin-left: 20px;
            overflow: hidden;
            vertical-align: top;
        }

        .card.people:first-child {
            margin-left: 0;
        }

        .card.people .card-top {
            position: absolute;
            top: 0;
            left: 0;
            display: inline-block;
            width: 170px;
            height: 150px;
            background-color: #ffffff;
        }

        .card.people .card-top.green {
            background-color: #53a93f;
        }

        .card.people .card-top.blue {
            background-color: #427fed;
        }

        .card.people .card-info {
            position: absolute;
            top: 150px;
            display: inline-block;
            width: 100%;
            height: 101px;
            overflow: hidden;
            background: #ffffff;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.people .card-info .title {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            color: #404040;
        }

        .card.people .card-info .desc {
            display: block;
            margin: 8px 14px 0 14px;
            overflow: hidden;
            font-size: 12px;
            line-height: 16px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.people .card-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            line-height: 29px;
            text-align: center;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .card.hovercard {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            text-align: center;
            background-color: rgba(214, 224, 226, 0.2);
        }

        .card.hovercard .cardheader {
            background: url("http://lorempixel.com/850/280/nature/4/");
            background-size: cover;
            height: 100px;
        }

        .card.hovercard .avatar {
            position: relative;
            top: -50px;
            margin-bottom: -50px;
        }

        .card.hovercard .avatar img {
            width: 100px;
            height: 100px;
            max-width: 100px;
            max-height: 100px;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            border: 5px solid rgba(255,255,255,0.5);
        }

        .card.hovercard .info {
            padding: 4px 8px 10px;
        }

        .card.hovercard .info .title {
            margin-bottom: 4px;
            font-size: 24px;
            line-height: 1;
            color: #262626;
            vertical-align: middle;
        }

        .card.hovercard .info .desc {
            overflow: hidden;
            font-size: 12px;
            line-height: 20px;
            color: #737373;
            text-overflow: ellipsis;
        }

        .card.hovercard .bottom {
            padding: 0 20px;
            margin-bottom: 17px;
        }


    </style>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <h4 class="text-danger text-center">Profile under verification!</h4>
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Edit Profile</h5>
                                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                </div>
                                <div class="card-block">
                                    <form class="form-material" id="profrm">
                                        <div class="form-group form-default">
                                            <input type="text" class="form-control fill" value="<?php echo $data['username'] ?>" disabled>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Email</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" class="form-control fill" value="<?php echo $data['name'] ?>" disabled>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Name</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="ph" class="form-control fill" value="<?php echo $data['contact'] ?>" disabled="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Contact Number</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="date" class="form-control fill"  value="<?php echo $data['dob'] ?>" disabled>
                                            <span class="form-bar"></span>
                                            <label class="float-label">Date of Birth</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="house" class="form-control fill" value="<?php echo $data['house'] ?>" disabled="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">House Name</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="street" class="form-control fill" value="<?php echo $data['street'] ?>" disabled="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Street</label>
                                        </div>
                                        <div class="form-group form-default">
                                            <input type="text" name="city" class="form-control fill" value="<?php echo $data['city'] ?>" disabled="">
                                            <span class="form-bar"></span>
                                            <label class="float-label">City</label>
                                        </div>
                                        <div class="form-group form-default" style="text-align: center;">
                                            <button type="reset" class="btn btn-sm waves-effect waves-light btn-danger" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Reset</button>
                                            <button type="submit" disabled="" name="updatepro" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled" ></i>Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Profile Photo</h5>
                                </div>
                                <div class="container">

                                    <div class="card hovercard">
                                        <div class="cardheader">

                                        </div>

                                        <div class="avatar">
                                            <img alt="" src="../profilepics/<?php echo $data['pic']."?time=".date("H:i:s")?>">
                                        </div>
                                        <form  enctype="multipart/form-data">
                                            <div class="info">
                                                <div class="form-group form-default">
                                                    <input type="file" name="pro" class="form-control" disabled="">
                                                    <input type="hidden" name="pic" value="<?php echo $data['pic']?>" >
                                                </div>
                                            </div>
                                            <div class="bottom">
                                                <button type="submit" disabled="" name="updatepic" class="btn btn-sm waves-effect waves-light btn-success" style="margin: auto;"><i class="icofont icofont-check-circled"></i>Update</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
<h1>Warning!!</h1>
<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
<div class="iew-container">
<ul class="iew-download">
<li>
<a href="http://www.google.com/chrome/">
<img src="../assets/images/browser/chrome.png" alt="Chrome">
<div>Chrome</div>
</a>
</li>
<li>
<a href="https://www.mozilla.org/en-US/firefox/new/">
<img src="../assets/images/browser/firefox.png" alt="Firefox">
<div>Firefox</div>
</a>
</li>
<li>
<a href="http://www.opera.com">
<img src="../assets/images/browser/opera.png" alt="Opera">
<div>Opera</div>
</a>
</li>
<li>
<a href="https://www.apple.com/safari/">
<img src="../assets/images/browser/safari.png" alt="Safari">
<div>Safari</div>
</a>
</li>
<li>
<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
<img src="../assets/images/browser/ie.png" alt="">
<div>IE (9 & above)</div>
</a>
</li>
</ul>
</div>
<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Jquery -->
    <script type="text/javascript" src="../assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="../assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="../assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="../assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="../assets/js/script.js "></script>

    <script type="text/javascript" src="../js/jquery.dataTables.js "></script>
    <script type="text/javascript" src="../assets/js/sweetalert2@10.js"></script>
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <div class="fixed-button active" id="myBtn"><a href="javascript:;" onclick="topFunction()" class="btn btn-md btn-primary" ><i class="fa fa-arrow-up" aria-hidden="true"></i></a> </div>
    <script type="text/javascript">
        function logout() {
            Swal.fire({
                title: 'Logout',
                text: "Are you sure want to logout?",
                icon: 'question',
                showClass: {popup: 'animated fadeInDown faster'},
                hideClass: {popup: 'animated zoomOut faster'},
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({     
                        title:"Logging out...",
                        timer:2000,
                        timerProgressBar:true,
                        showConfirmButton:false,
                        allowOutsideClick:false,
                        allowEscapeKey:false,
                        didClose:()=>{window.location.replace('../logout.php');} 
                    });
                    Swal.showLoading();
                }

            });
        }
//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } 
    else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
document.body.scrollTop = 0; // For Safari
document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</body>

</html>
