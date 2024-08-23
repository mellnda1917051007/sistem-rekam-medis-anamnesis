<?php 
$url = "home/data/tmp/tmp 44/edubin/";
$komponen = "home/data/tmp/tmp 44/";
include 'home/include/all_include.php';
?>
<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Edubin - LMS Education HTML Template</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo $url; ?>images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="<?php echo $url; ?>css/responsive.css">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
       
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><span><img src="<?php echo $url; ?>images/all-icon/map.png" alt="icon"> </span> <span><?php echo $alamat;?> </span></li>
                                <li><img src="<?php echo $url; ?>images/all-icon/email.png" alt="icon"><span><?php echo $email;?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            <p>Selamat Datang Di Website Kami | Trimakasih Telah Berkunjung </p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="<?php echo $url; ?>index-2.html">
                                <!-- <img src="<?php echo $url; ?>images/logo.png" alt="Logo"> -->
                                <img width="80" src="admin/data/image/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="<?php echo $url; ?>images/all-icon/support.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <p>Contact Person</p>
                                    <span> <?php echo $telepon;?></span>
                                </div>
                            </div>
                            <div class="button float-left">
                               <!-- <a href= "#" class="main-btn">Booking Now</a> -->
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    
                                    <!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
        <?php $apa = $i->n;
        if ($apa=="Login")
        {
            if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
            {
                $kodene = decrypt($_COOKIE["kodene"]);
                $ip = $_SERVER['REMOTE_ADDR']; 
                $useragent = $_SERVER['HTTP_USER_AGENT'];
                $token = sha1($ip.$useragent.$key);
                $token = crypt($token, $key);
                if ($_COOKIE['token_user'] == $token)
                {
                    $token = "ada";
                }
                else
                {
                    $token = "";
                }
                $kode = cek_database("","","","select * from data_pelanggan where id_pelanggan='$kodene'");
            }
            else
            {
                $token = "";
                $kode ="";
            }
            if ($kode=="ada" && $token=="ada")
            {
            ?>
            <!--
            <li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=akun">Akun</a> </li>
            -->
            <li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout">Logout</a> </li>
            <?php    
            }
            else
            {
            ?>
            <li class="nav-item"> <a class="nav-link" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
            <?php
            }
        }
        else
        {
        ?>
         <li class="nav-item"> <a class="nav-link" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
        <?php } ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
<!-- MULTI -->
        <li  class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
        <ul class="dropdown-menu agile_short_dropdown">
        <?php
        $m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
        foreach($m1 as $i1) {
        if($i1->s=="$idmenu" and $i1->t=="sm" ){
        ?>
            <li><li>
            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
            <?php echo $i1->n;?></a>
            </li></li>
        <?php }} ?>
        </ul>
        </li>
<!-- /MULTI -->
        <?php }} ?>
<!-- /MENU -->

                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href= "#" id="search"><i class="fa fa-search"></i></a></li>
                               <!-- 
                               <li><a href= "#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                                -->
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <?php if (isset($_GET ['p']) && $_GET ['p'] == "home") { ?>

    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url(<?php echo $slide_a1; ?>)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Selamat Datang Di Website Kami</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Semoga pelayanan kami dapat membuat anda puas juga membuat hari pernikahan anda lebih indah dan mengesankan.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href= "index.php?p=produk">Paket Event</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href= "index.php?p=login&action=akun">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url(<?php echo $slide_a2; ?>)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Selamat Datang Di Website Kami</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Semoga pelayanan kami dapat membuat anda puas juga membuat hari pernikahan anda lebih indah dan mengesankan.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href= "#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href= "#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url(<?php echo $slide_a3; ?>)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Selamat Datang Di Website Kami</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Semoga pelayanan kami dapat membuat anda puas juga membuat hari pernikahan anda lebih indah dan mengesankan.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href= "#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href= "#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
    
    <section id="category-part">
        <div class="container">
            <div class="category pt-40 pb-80">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="category-text pt-40">
                            <h2>Aplikasi Wedding Organizer Assyfa Studio</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-8 offset-2">
                        <div class="row category-slied mt-40">
                            <div class="col-lg-4">
                                <a href= "index.php?p=galery">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Galery</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href= "index.php?p=keranjang">
                                    <span class="singel-category text-center color-2">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Pemesanan</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href= "index.php?p=transaksi">
                                    <span class="singel-category text-center color-3">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Transaksi</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href= "index.php?p=galery">
                                    <span class="singel-category text-center color-1">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-1.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Galery</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href= "index.php?p=keranjang">
                                    <span class="singel-category text-center color-2">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-2.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Pemesanan</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a href= "index.php?p=transaksi">
                                    <span class="singel-category text-center color-3">
                                        <span class="icon">
                                            <img src="<?php echo $url; ?>images/all-icon/ctg-3.png" alt="Icon">
                                        </span>
                                        <span class="cont">
                                            <span>Transaksi</span>
                                        </span>
                                    </span> <!-- singel category -->
                                </a>
                            </div>
                        </div> <!-- category slied -->
                    </div>
                </div> <!-- row -->
            </div> <!-- category -->
        </div> <!-- container -->
    </section>
    
    <?php } else { ?>

    <section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(<?php echo $slide_a3; ?>)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2><?php echo ucwords ($_GET ['p']); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><?php echo ucwords ($_GET ['p']); ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>  
                </div>
            </div> 
        </div> 
    </section>

    <?php } ?>

    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">
                
            <?php include 'halaman.php';?>
            <h2>&nbsp;</h2>

            </div> 
        </div>
        
    </section>
    
    
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <!-- <a href= "#"><img src="<?php echo $url; ?>images/logo-2.png" alt="Logo"></a> -->
                                <img width="80" src="admin/data/image/logo/logo.png" alt="">
                            </div>
                            <p>Semoga pelayanan kami dapat membuat anda puas juga membuat hari pernikahan anda lebih indah dan mengesankan.</p>
                            <ul class="mt-20">
                                <ul class="list-inline footer_social_icon">
                                <li><a href="<?php echo $facebook;?>"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="<?php echo $twitter;?>"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="<?php echo $instagram;?>"><span class="fa fa-instagram"></span></a></li>
                                <li><a href="<?php echo $google;?>"><span class="fa fa-google"></span></a></li>
                                <li><a href="<?php echo $google;?>"><span class="fa fa-youtube"></span></a></li>
                                </ul>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Sitemap</h6>
                            </div>
                            <ul>
                                <li><a href="index.php"><i class="fa fa-angle-right"></i>Home</a></li>
                                <li><a href="index.php?p=profil"><i class="fa fa-angle-right"></i>Profil</a></li>
                                <li><a href="index.php?p=galery"><i class="fa fa-angle-right"></i>Galery</a></li>
                            </ul>
                            <ul>
                                <li><a href= "index.php?p=produk"><i class="fa fa-angle-right"></i>Paket Event</a></li>
                                <li><a href="index.php?p=keranjang"><i class="fa fa-angle-right"></i>Pemesanan</a></li>
                                <li><a href="index.php?p=transaksi"><i class="fa fa-angle-right"></i>Transaksi</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Support</h6>
                            </div>
                            <ul>
                                <li><a href= "index.php?p=home"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href= "index.php?p=home"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href= "index.php?p=home"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href= "index.php?p=home"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href= "index.php?p=home"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contact Us</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php echo $alamat;?></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p> <?php echo $telepon;?>
</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p><?php echo $email;?></p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p><a target="_blank" href= "#"><?php echo $copyright;?></a> </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">
                           
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
   
    <a href= "#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    
    <!--====== jquery js ======-->
    <script src="<?php echo $url; ?>js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo $url; ?>js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="<?php echo $url; ?>js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="<?php echo $url; ?>js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Counter Up js ======-->
    <script src="<?php echo $url; ?>js/waypoints.min.js"></script>
    <script src="<?php echo $url; ?>js/jquery.counterup.min.js"></script>
    
    <!--====== Nice Select js ======-->
    <script src="<?php echo $url; ?>js/jquery.nice-select.min.js"></script>
    
    <!--====== Nice Number js ======-->
    <script src="<?php echo $url; ?>js/jquery.nice-number.min.js"></script>
    
    <!--====== Count Down js ======-->
    <script src="<?php echo $url; ?>js/jquery.countdown.min.js"></script>
    
    <!--====== Validator js ======-->
    <script src="<?php echo $url; ?>js/validator.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="<?php echo $url; ?>js/ajax-contact.js"></script>
    
    <!--====== Main js ======-->
    <script src="<?php echo $url; ?>js/main.js"></script>
    
    <!--====== Map js ======-->
    <script src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="<?php echo $url; ?>js/map-script.js"></script>

</body>
</html>
