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
                    <li class="nav-item  active mr-lg-3 mt-lg-0 mt-3">
                        <a class="nav-link" href="about.php">about</a>
                    </li>
                    <li class="nav-item  mr-lg-3 mt-lg-0 mt-3">
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
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
    </ol>
</nav>
<!-- //breadcrumbs -->
<!-- about-->
<section class="single_grid_w3_main align-w3" id="about">
    <div class="container">
        <div class="wthree_pvt_title text-center">
            <h4 class="w3pvt-title">kudumbashree's mission statement
            </h4>
            <span class="sub-title">‘To eradicate absolute poverty in ten years through concerted community action under the leadership of local governments, by facilitating organisation of poor for combining self-help with demand-led convergence of available services and resources to tackle the multiple dimensions and manifestations of poverty holistically’</span>
        </div>
        <div class="row pt-md-4">
            <div class="col-lg-6">
                <div class="single_grid_w3 single_grid_w3">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="single_grid_text">
                    <h5>Kudumbashree Mission
                        <span class="wthree-line"></span>
                    </h5>
                    <p>Kudumbashree Mission refers to the State Poverty Eradication Mission (SPEM) of the Government of Kerala. It is a registered society under the Travancore Cochin Literary, Scientific and Charitable Societies Act 1955.</p>
                    <a class="btn bg-theme mt-4 wthree-link-bnr" href="#">view more
                    </a>
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse sec-space">
            <div class="col-lg-6">
                <div class="single_grid_w3 single_grid_w31">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="single_grid_text">
                    <h5>Roles and Functions of the Mission
                        <span class="wthree-line"></span>
                    </h5>
                    <p>The Mission looks after the overall implementation of the poverty eradication and women empowerment programme across the State. It provides guidance and direction to the programmes as per the government policy. The Mission takes the lead in ensuring convergence of the community network with local self-government institutions. It also works as the platform for partnerships with government departments at the district and State levels. </p>
                    <a class="btn bg-theme mt-4 wthree-link-bnr" href="#">view more
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="single_grid_w3 single_grid_w32">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="single_grid_text">
                    <h5>The Mission – Governance and Administration
                        <span class="wthree-line"></span>
                    </h5>
                    <p>Governance of the Mission is with the Governing Body chaired by the Minister for Local Self-Government, Government of Kerala. Principal Secretary, Department of Local Self-Government is the vice chairperson and the Executive Director of Kudumbashree Mission is its convenor. The Governing Body has representatives of the three layers of PRIs, different government departments, the State Planning Board, State Women’s Commission, and NABARD as members.</p>
                    <a class="btn bg-theme mt-4 wthree-link-bnr" href="#">view more
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //about -->
<!-- explore-->
<div class="banner-section" id="explore">
    <div class="container-fluid">
        <div class="row">
            <div class="slider-container col-lg-12 mx-auto">
                <div class="w3ls-about-banner">
                    <div class="callbacks_container">
                        <ul class="rslides callbacks callbacks1 slider3">
                            <li>
                                <div class="slide-img slide-img1">
                                    <div class="banner-info">
                                        <h3>Kudumbashree</h3>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="slide-img slide-img2">
                                    <div class="banner-info">
                                        <h3>Kudumbashree</h3>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="slide-img slide-img3">
                                    <div class="banner-info">
                                        <h3>Kudumbashree</h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="slider-right">
                        <h3 class="title">STATE POVERTY ERADICATION MISSION</h3>
                        <p>‘To eradicate absolute poverty in ten years through concerted community action under the leadership of local governments, by facilitating organisation of poor for combining self-help with demand-led convergence of available services and resources to tackle the multiple dimensions and manifestations of poverty holistically’</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//explore-->
<!-- team -->
<section class="w3layouts_hubits-services align-w3" id="team">
    <div class="container">
        <div class="wthree_pvt_title text-center">
            <h4 class="w3pvt-title">our team
            </h4>
            <span class="sub-title"></span>
        </div>
        <div class="row">
            <?php
            $sql="select * from reg,login where reg.username=login.username and type!='m'";
            $res2=$ob->db_read($sql);
            while($data=mysqli_fetch_assoc($res2)) {
                ?>
                <div class="col-lg-4 col-sm-6 team-grids">
                    <div class="team-effect">
                        <img src="<?php echo 'profilepics/'.$data['pic']."?time=".date("H:i:s")?>" alt="img" class="img-fluid" style="height: 350px;width: 100%;">
                    </div>
                    <!-- team text -->
                    <div class="team_wthree mt-3">
                        <h4><?php echo $data['name']?></h4>
                        <p>
                            <?php
                            if($data['type']=='a')
                                echo "ADS";
                            if($data['type']=='p')
                                echo "President";
                            if($data['type']=='s')
                                echo "Secretary";
                            ?>
                        </p>
                    </div>
                    <!-- //team text -->
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
<!-- //team -->
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
<!-- explore responsive slider -->
<script src="js/responsiveslides.min.js"></script>
<script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $(".slider3").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
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