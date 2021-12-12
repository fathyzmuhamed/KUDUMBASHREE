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
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item mr-lg-3 mt-lg-0 mt-3  active">
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
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
</nav>
<!-- //breadcrumbs -->
<!-- contact -->
<section class="contact-wthree align-w3" id="contact">
    <div class="container">
        <div class="wthree_pvt_title text-center">
            <h4 class="w3pvt-title">contact us
            </h4>
            <span class="sub-title"></span>
        </div>

        <div class="mx-auto text-center">
            <div class="row">
                <div class="col-lg-4 contact-w3">
                    <span class="fa fa-envelope-open mr-2 my-3"></span>
                    <div class="d-flex flex-column">
                        <a href="<?php echo $rows[0]['username']?>" class="d-block"><?php echo $rows[0]['username']?></a>

                        <a href="<?php echo $rows[1]['username']?>" class="mt-1"><?php echo $rows[1]['username']?></a>
                    </div>
                </div>
                <div class="col-lg-4 contact-w3 my-lg-0 my-4">
                    <span class="fa fa-phone mr-2 my-3"></span>
                    <div class="d-flex flex-column">
                        <p><?php echo '+91 '.$rows[0]['contact']?></p>
                        <p class="mt-1"><?php echo '+91 '.$rows[1]['contact']?></p>
                    </div>
                </div>
                <div class="col-lg-4 contact-w3">
                    <span class="fa fa-home mr-2 my-3"></span>
                    <address>Kothamangalam,Kothamangalam.</address>
                </div>
            </div>
            <!-- //footer right -->
        </div>

    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31427.678383407387!2d76.61502928892172!3d10.061359545617556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b07e61260618ea9%3A0xa32246df89d45c07!2sKothamangalam%2C%20Kerala!5e0!3m2!1sen!2sin!4v1638636261778!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>
<!-- //contact -->
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
    <p class="text-white">© 2021 Kudumbashree. All rights reserved | Design by
        <a href="#"> W3layouts.</a>
    </p>
</div>
<!-- //copyright -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script>
<!-- //js -->
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