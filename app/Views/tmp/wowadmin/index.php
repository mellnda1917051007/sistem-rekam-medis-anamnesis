<?php

use App\RCore\Setting;
use App\RCore\Bridge;

$url = Setting::instance()->get_lokasi_tmp();

function home()
{
    return base_url("admin/home");
}

function logout()
{
    return base_url("admin/logout");
}

function tabelnomin()
{
    return "hello";
}

$avatar = Setting::instance()->get_avatar();
$siapa = Setting::instance()->siapa;
$copyright = Setting::instance()->copyright;

?>

<html lang="en">
<!DOCTYPE html>

<head>

    <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
    <!--Jasmine Stylesheet [ REQUIRED ]-->
    <link href="<?php echo $url; ?>css/style.css" rel="stylesheet">
    <!--Font Awesome [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--Switchery [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/switchery/switchery.min.css" rel="stylesheet">
    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <!--ricksaw.js [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/jquery-ricksaw-chart/css/rickshaw.css" rel="stylesheet">
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo $url; ?>css/demo/jquery-steps.min.css" rel="stylesheet">
    <!--Summernote [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/summernote/summernote.min.css" rel="stylesheet">
    <!--Demo [ DEMONSTRATION ]-->
    <link href="<?php echo $url; ?>css/demo/jasmine.css" rel="stylesheet">

    <link href="<?php echo base_url(''); ?>/bower_components/sweetalert2/dist/sweetalert2.css" rel="stylesheet">

    <!--SCRIPT-->
    <!--=================================================-->
    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="<?php echo $url; ?>plugins/pace/pace.min.css" rel="stylesheet">
    <script src="<?php echo $url; ?>plugins/pace/pace.min.js"></script>
</head>
<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">
        <!--NAVBAR-->
        <!--===================================================-->
        <header id="navbar">
            <div id="navbar-container" class="boxed">
                <!--Navbar Dropdown-->
                <!--================================-->
                <div class="navbar-content clearfix">
                    <ul class="nav navbar-top-links pull-left">
                        <!--Navigation toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="tgl-menu-btn">
                            <a class="mainnav-toggle" href="<?php echo $url; ?>#"> <i class="fa fa-navicon fa-lg"></i> </a>
                        </li>

                        <li class="dropdown">
                            <a href="<?php home(); ?>" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-home fa-lg"></i> <span class="badge badge-header badge-danger"></span> </a>
                            <!--Notification dropdown menu-->
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End notifications dropdown-->
                    </ul>
                    <ul class="nav navbar-top-links pull-right">
                        <!--Profile toogle button-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li class="hidden-xs" id="toggleFullscreen">
                            <a class="fa fa-users" data-toggle="fullscreen" href="#" role="button">
                                <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <!--End Profile toogle button-->
                        <!--User dropdown-->
                        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                        <li id="dropdown-user" class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                <span class="pull-right"> <img class="img-circle img-user media-object" src="<?php echo $avatar; ?>" alt="Profile Picture"> </span>
                                <div class="username hidden-xs"><?php echo ucwords($siapa); ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right with-arrow">
                                <!-- User dropdown menu -->
                                <ul class="head-list">
                                    <li>
                                        <a href="<?php home(); ?>"> <i class="fa fa-user fa-fw"></i> Home </a>
                                    </li>

                                    <li>
                                        <a href="<?php logout(); ?>"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!--===================================================-->
        <!--END NAVBAR-->
        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div class="pageheader hidden-xs">
                    <h3><i class="fa fa-pencil"></i> <?php ucwords(tabelnomin()); ?> </h3>
                    <div class="breadcrumb-wrapper">
                        <span class="label">You are here:</span>
                        <ol class="breadcrumb">
                            <li> <a href="#"> PAGE </a> </li>
                            <li class="active"> <?php ucwords(tabelnomin()); ?> </li>
                        </ol>
                    </div>
                </div>
                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="row">
                        <div class="col-md-12 eq-box-md grid">

                            <div class="panel panel-">
                                <div class="panel-heading ui-sortable-handle">
                                    <div class="panel-control">

                                        <a class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></a>
                                    </div>
                                    <h3 class="panel-title">Managemen Page <?php ucwords(tabelnomin()); ?></h3>
                                </div>
                                <div class="panel-body">
                                    <?= $this->renderSection('halaman') ?>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <nav id="mainnav-container">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">
                        <i class="fa fa-forumbee brand-icon"></i>
                        <div class="brand-title">
                            <span class="brand-text"> <?php echo ucwords($siapa); ?></span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->
                <div id="mainnav">
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                <ul id="mainnav-menu" class="list-group">

                                    <!--Category name-->
                                    <li class="list-header">Management Menu</li>
                                    <!--Menu list item-->




                                    <!-- MENU -->
                                    <?php
                                    $m = Setting::instance()->file_menu_xml();
                                    foreach ($m as $i) {
                                        if ($i->t == 's') {
                                    ?>
                                            <!-- SINGLE -->


                                            <li> <a href="<?php echo Bridge::link($i->l); ?>"> <i class="<?php echo $i->i; ?>"></i> <span class="menu-title"> <?php echo $i->n; ?> </span> </a> </li>
                                            <!-- /SINGLE -->
                                        <?php
                                        } else if ($i->t == 'm') {
                                            $idmenu = $i->id;
                                        ?>
                                            <!-- MULTI -->

                                            <li>
                                                <a href="#">
                                                    <i class="<?php echo $i->i; ?>"></i>
                                                    <span class="menu-title">
                                                        <?php echo $i->n; ?>
                                                    </span>
                                                    <i class="arrow"></i>
                                                </a>
                                                <!--Submenu-->
                                                <ul class="collapse">
                                                    <?php
                                                    $m1 = Setting::instance()->file_menu_xml();
                                                    foreach ($m1 as $i1) {
                                                        if ($i1->s == "$idmenu" and $i1->t == "sm") {
                                                    ?>
                                                            <li>
                                                                <a class="item" onclick="window.location = '<?php echo Bridge::link($i1->l); ?>'">
                                                                    <?php echo $i1->n; ?></a>
                                                            </li>
                                                    <?php }
                                                    } ?>
                                                </ul>
                                            </li>





                                            <!-- /MULTI -->
                                    <?php }
                                    } ?>
                                    <!-- /MENU -->

                                </ul>

                            </div>
                        </div>
                    </div>
                    <!--================================-->
                    <!--End menu-->
                </div>
            </nav>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->
        </div>
        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">


            <p class="pad-lft"><?php echo $copyright; ?></p>
        </footer>

        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

    </div>

    <script src="<?php echo $url; ?>js/jquery-2.1.1.min.js"></script>
    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
    <!--Fast Click [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/fast-click/fastclick.min.js"></script>
    <!--Jquery Nano Scroller js [ REQUIRED ]-->
    <script src="<?php echo $url; ?>plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
    <!--Metismenu js [ REQUIRED ]-->
    <script src="<?php echo $url; ?>plugins/metismenu/metismenu.min.js"></script>
    <!--Jasmine Admin [ RECOMMENDED ]-->
    <script src="<?php echo $url; ?>js/scripts.js"></script>
    <!--Switchery [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/switchery/switchery.min.js"></script>
    <!--Jquery Steps [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/parsley/parsley.min.js"></script>
    <!--Jquery Steps [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/jquery-steps/jquery-steps.min.js"></script>
    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <!--Bootstrap Wizard [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <!--Masked Input [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/masked-input/bootstrap-inputmask.min.js"></script>
    <!--Bootstrap Validator [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
    <!--Flot Chart [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.min.js"></script>
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.resize.min.js"></script>
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.spline.js"></script>
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.pie.min.js"></script>
    <script src="<?php echo $url; ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo $url; ?>plugins/moment-range/moment-range.js"></script>
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
    <!--Flot Order Bars Chart [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/flot-charts/jquery.flot.categories.js"></script>
    <!--ricksaw.js [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
    <script src="<?php echo $url; ?>plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
    <script src="<?php echo $url; ?>plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
    <script src="<?php echo $url; ?>plugins/jquery-ricksaw-chart/ricksaw.js"></script>
    <!--Summernote [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/summernote/summernote.min.js"></script>
    <!--Fullscreen jQuery [ OPTIONAL ]-->
    <script src="<?php echo $url; ?>plugins/screenfull/screenfull.js"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="<?php echo $url; ?>js/demo/wizard.js"></script>
    <!--Form Wizard [ SAMPLE ]-->
    <script src="<?php echo $url; ?>js/demo/form-wizard.js"></script>
<!--
    <script src="<?php echo $url; ?>js/demo/dashboard-v2.js"></script>
-->
    <script src="<?php echo base_url(''); ?>/bower_components/sweetalert2/dist/sweetalert2.js"></script>

    <?php
    $this->renderSection("script");
    ?>

</body>

</html>
