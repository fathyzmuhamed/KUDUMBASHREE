<?php
require('db.class.php');
$ob=new db_operations();
$sel="select * from reg,login where reg.username=login.username and (type='p' or type='s')";
$res=$ob->db_read($sel);
$rows = array();
while($row = $res->fetch_assoc()) {
    $rows[] = $row;
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Kudumbashree</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Teens Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- gallery-->
    <link href="css/gallery.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <!-- inner banner -->
    <section class="inner-banner-w3ls d-flex flex-column justify-content-center align-items-center">
        <!-- header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient-secondary">
                <h1>
                    <a class="navbar-brand" href="index.php"  style="-webkit-text-fill-color: #fcff3b;background: none;">
                        Kudumbashree
                    </a>
                </h1>
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-lg-auto text-center">
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3 active">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- //header -->
</section>
<!-- //inner banner -->
<!-- breadcrumbs -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb d-flex justify-content-center bg-theme">
        <li class="breadcrumb-item">
            <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
    </ol>
</nav>
<!-- //breadcrumbs -->
<!-- portfolio -->
<section class="portfolio-wthree align-w3" id="portfolio">
    <div class="container">
        <div class="wthree_pvt_title text-center">
            <h4 class="w3pvt-title">our gallery
            </h4>
            <span class="sub-title"></span>
        </div>
        <div class="pb-lg-5 pb-sm-4">
            <ul class="demo row">
                <?php
                $sel="select * from gallery";
                $res=$ob->db_read($sel);        
                $n=1;            
                while($data=mysqli_fetch_array($res)){
                    ?>
                    <li class="col-lg-4  col-md-6">
                        <div class="img-grid">
                            <?php
                            if($n%2!=0) {
                                ?>
                                <div class="port-desc text-center">
                                    <span class="line-wthree"></span>
                                    <h6 class="main-title-w3pvt text-center"><?php echo $data['title'];?></h6>
                                    <p>&nbsp;</p>
                                </div>
                                <div class="gallery-grid1">
                                    <img src="<?php echo 'gallery/'.$data['pic'] ;?>" alt=" " class="img-fluid" />
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="gallery-grid1">
                                    <img src="<?php echo 'gallery/'.$data['pic'] ;?>" alt=" " class="img-fluid" />
                                </div>
                                <div class="port-desc text-center">
                                    <span class="line-wthree"></span>
                                    <h6 class="main-title-w3pvt text-center"><?php echo $data['title'];?></h6>
                                    <p>&nbsp;</p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </li>
                    <?php
                    $n++;
                }
                ?>

              <!--   <li class="col-lg-4  col-md-6">
                    <div class="img-grid">
                        <div class="gallery-grid1">
                            <img src="images/g2.jpg" alt=" " class="img-fluid" />
                        </div>
                        <div class="port-desc text-center">
                            <span class="line-wthree"></span>
                            <h6 class="main-title-w3pvt text-center">Brief-Description</h6>
                            <p> Lorem ipsum dolor sit amet,Stet clita kasd gubergren, sed diam voluptua. sed diam
                                nonumy eirmod tempor invidunt ut.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4  col-md-6 my-lg-0 my-md-4 mx-auto">
                    <div class="img-grid">
                        <div class="port-desc text-center">
                            <span class="line-wthree"></span>
                            <h6 class="main-title-w3pvt text-center">Brief-Description</h6>
                            <p> Lorem ipsum dolor sit amet,Stet clita kasd gubergren, sed diam voluptua. sed diam
                                nonumy eirmod tempor invidunt ut.
                            </p>
                        </div>
                        <div class="gallery-grid1">
                            <img src="images/g3.jpg" alt=" " class="img-fluid" />
                        </div>
                    </div>
                </li>
                <li class="col-lg-4  col-md-6 my-lg-0 my-md-4">
                    <div class="img-grid">
                        <div class="gallery-grid1">
                            <img src="images/g2.jpg" alt=" " class="img-fluid" />
                        </div>
                        <div class="port-desc text-center">
                            <span class="line-wthree"></span>
                            <h6 class="main-title-w3pvt text-center">Brief-Description</h6>
                            <p> Lorem ipsum dolor sit amet,Stet clita kasd gubergren, sed diam voluptua. sed diam
                                nonumy eirmod tempor invidunt ut.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="col-lg-4  col-md-6">
                    <div class="img-grid">
                        <div class="port-desc text-center">
                            <span class="line-wthree"></span>
                            <h6 class="main-title-w3pvt text-center">Brief-Description</h6>
                            <p> Lorem ipsum dolor sit amet,Stet clita kasd gubergren, sed diam voluptua. sed diam
                                nonumy eirmod tempor invidunt ut.
                            </p>
                        </div>
                        <div class="gallery-grid1">
                            <img src="images/g1.jpg" alt=" " class="img-fluid" />
                        </div>

                    </div>
                </li>
                <li class="col-lg-4  col-md-6 mt-md-0 mx-auto">
                    <div class="img-grid">
                        <div class="gallery-grid1">
                            <img src="images/g4.jpg" alt=" " class="img-fluid" />
                        </div>
                        <div class="port-desc text-center">
                            <span class="line-wthree"></span>
                            <h6 class="main-title-w3pvt text-center">Brief-Description</h6>
                            <p> Lorem ipsum dolor sit amet,Stet clita kasd gubergren, sed diam voluptua. sed diam
                                nonumy eirmod tempor invidunt ut.
                            </p>
                        </div>
                    </div>
                </li> -->

            </ul>
        </div>
    </div>
</section>
<!-- //portfolio -->
<!-- footer -->
<footer class="footer py-md-5 pt-md-3 pb-sm-5">
    <div class="container-fluid">
        <div class="row p-sm-4 px-3 py-5">
            <div class="col-lg-7 col-md-6 footer-top mt-md-0 mt-sm-5">
                <h2>
                    <a class="navbar-brand" href="index.php" style="-webkit-text-fill-color: #fcff3b;background: none;">
                        Kudumbashree
                    </a>
                </h2>
                <p class="my-3 text-white" style="max-width: none;">Kudumbashree Mission refers to the State Poverty Eradication Mission (SPEM) of the Government of Kerala. </p>
                <p class="text-white" style="max-width: none;">
                    It is a registered society under the Travancore Cochin Literary, Scientific and Charitable Societies Act 1955.
                </p>
            </div>
            <div class="col-lg-2  col-md-6 mt-md-0 mt-5">
                <div class="footerv2-w3ls">
                    <h3 class="mb-3 w3f_title">Navigation</h3>
                    <hr>
                    <ul class="list-w3pvtits">
                        <li>
                            <a href="index.php">
                                Home
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="about.php">
                                About Us
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="gallery.php">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="contact.php">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mt-lg-0 mt-5">
                <div class="footerv2-w3ls">
                    <h3 class="mb-3 w3f_title">Contact Us</h3>
                    <hr>
                    <div class="fv3-contact">
                        <p>
                            <a href="mailto:kudumbashree2k21@email.com">kudumbashree2k21.com</a>
                        </p>
                    </div>
                    <div class="fv3-contact my-2">
                        <p><?php echo '+91 '.$rows[0]['contact']?></p>
                    </div>
                    <div class="fv3-contact">
                        <p>Kothamangalam,<br>Kothamangalam.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- //footer bottom -->
</footer>
<!-- //footer -->
<!-- copyright -->
<div class="cpy-right text-center bg-theme">
    <p class="text-white">© 2018 Teens Hub. All rights reserved | Design by
        <a href="http://w3layouts.com"> W3layouts.</a>
    </p>
</div>
<!-- //copyright --> 
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<script src="js/jquery.picEyes.js"></script>
<script>
    $(function () {
            //picturesEyes($('.demo li'));
            $('.demo li').picEyes();
        });
    </script>
    <!-- //gallery -->
    <!-- start-smooth-scrolling -->
    <script src="js/move-top.js"></script>
    <script src="js/easing.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function () {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */
            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap.js"></script>
    </body>

    </html>