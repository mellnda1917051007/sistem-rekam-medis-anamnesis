<?php

use App\RCore\Setting_Petugas;
use App\RCore\Bridge_petugas;


$url = Setting_Petugas::instance()->get_lokasi_tmp();

function home()
{
    return base_url("petugas/home");
}

function logout()
{
    return base_url("petugas/logout");
}

function tabelnomin()
{
    return "hello";
}

$avatar = Setting_Petugas::instance()->get_avatar();
$siapa = Setting_Petugas::instance()->siapa;
$copyright = Setting_Petugas::instance()->copyright;
$judul = Setting_Petugas::instance()->judul();

?>
<!DOCTYPE html>

<head>
    <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>css/scss/style.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/expandingSearchBar/component.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/customScrollbar/jquery.mCustomScrollbar.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/hover/hover.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/waves/waves.css" rel="stylesheet">
    <link href="<?php echo $url; ?>lib/dataTable/css/jquery.dataTables.css" rel="stylesheet">
    <style>
        .headerLogo {
            font-size: 1em;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="la-ball-pulse la-2x">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <header>
        <div id="headerMain">
            <div id="header">
                <div class="nawbarMain  headerWrapper clearfix">
                    <div class="nawbarMainLeft ">
                        <div class="mainLogo">
                        </div>
                        <!--mainLogo-->
                        <div class="nawbarMainButtonWrapper">
                            <button id="menuIcon" class="hamburger">
                                <span></span>
                            </button>
                        </div>
                        <div class="headerLogo">
                            <a href="index.php"> <?php echo ucwords($judul); ?></a>
                        </div>
                        <!--headerLogo-->
                    </div>
                    <!--nawbarMainLeft-->
                    <div class="nawbarMainRight">
                        <ul class="nawbarMainMenu">

                            <li><a id="toggle-link2" class="latestActivityIcon  hvr-rectangle-out"><i class="fa fa-user"></i></a></li>
                        </ul>

                    </div>

                    <div class="latestActivity">
                        <div class="latestActivityHeader colorCyan clearfix">
                            <div class="antBoxHeaderText">
                                <span class="mainIcon"><i class="fa fa-user"></i></span><span class="mainContent"> Login <?php echo ucwords($siapa); ?></span>
                            </div>
                            <!--mantBoxHeaderTexText-->
                            <div class="antBoxHeaderIcon">
                                <a class="closelatestActivity pull-right" href="index.php"><i class="fa fa-times"></i></a>
                            </div>
                            <!--antBoxHeaderIcon-->
                        </div>
                        <!--latestActivityHeader-->

                        <!--latestActivityContent-->
                        <a href="logout" type="button" class="latestActivityButton btn btn-success btn-df float-button-light">LOGOUT</a>
                    </div>


                </div>
                <!--nawbarMain-->
            </div>
            <!--header-->
        </div>
        <!--headerMain -->
    </header>

    <div class="mainWrapper">
        <div id="sideBarWrapper">
            <div id="sideBarContent">
                <div id="bar" class="sideBar sideBarDark">
                    <!-- start sitebar-->
                    <div class="sideBarUser">
                        <div class="sideBarUserConteiner">
                            <div class="sideBarUserConteinerImg">
                                <img src="<?php echo $avatar; ?>" alt="UserInfo" class="userimg">
                            </div>
                            <!--sideBarUserConteinerImg-->
                            <div class="sideBarUserConteinerText">
                                <span class="userInfo"><a href="index.php">Management </a><br><i class="fa fa-map-marker"></i> <?php tabelnomin(); ?> </span>
                            </div>
                            <!--sideBarUserConteinerText-->
                        </div>
                        <!--sideBarUserConteiner-->
                    </div>
                    <div id="menuContent">
                        <div id="menuSize">
                            <aside class="sidebar">
                                <nav class="sidebar-nav">
                                    <ul class="metismenu" id="menu">
                                        <!-- MENU -->
                                        <?php
                                        $m = Setting_Petugas::instance()->file_menu_xml();
                                        foreach ($m as $i) {
                                            if ($i->t == 's') {
                                        ?>
                                                <!-- SINGLE -->
                                                <li class="treeview">
                                                    <a href="<?php echo Bridge_petugas::link($i->l); ?>">
                                                        <i class="<?php echo $i->i; ?>"></i>
                                                        <span><?php echo $i->n; ?></span>

                                                    </a>
                                                </li>
                                                <!-- /SINGLE -->
                                            <?php
                                            } else if ($i->t == 'm') {
                                                $idmenu = $i->id;
                                            ?>
                                                <!-- MULTI -->

                                                <li class="treeview">
                                                    <a href="#">
                                                        <i class="<?php echo $i->i; ?>"></i>
                                                        <span><?php echo $i->n; ?></span>
                                                        <span class="pull-right-container">
                                                            <i class="fa fa-angle-left pull-right"></i>
                                                        </span>
                                                    </a>
                                                    <ul class="treeview-menu">
                                                        <li>
                                                            <?php
                                                            $m1 = Setting_Petugas::instance()->file_menu_xml();
                                                            foreach ($m1

                                                                as $i1) {
                                                                if ($i1->s == "$idmenu" and $i1->t == "sm") {
                                                            ?>
                                                        <li>
                                                            <a class="item" onclick="window.location = '<?php echo Bridge_petugas::link($i1->l); ?>'">
                                                                <?php echo $i1->n; ?></a>
                                                        </li>
                                                <?php }
                                                            } ?>
                                                </li>
                                    </ul>
                                    </li>

                                    <!-- /MULTI -->
                            <?php }
                                        } ?>
                            <!-- /MENU -->

                            </ul>
                                </nav>
                            </aside>
                        </div>
                        <!--menuSize-->
                    </div>
                    <!--	menuContent-->


                    <div class="timeWrapper colorTheme">
                        <div class="menuTime2">
                            <span class="current-time2"></span>
                        </div>
                        <div class="menuTime">
                            <span class="current-time"></span>
                        </div>
                    </div>
                </div>
                <!--menuSize-->
            </div>
            <!--sideBar-->
        </div>
        <!--sideBarContent-->
    </div>
    <!--sideBarWrapper-->
    <div id="mainWrapper" class="mainConteiner column">
        <!--start nainconteiner-->
        <div class="mainConteinerConten">
            <div class="container-fluid footerfix">
                <div class="row firstRow">
                    <!--row firstRow-->
                    <div class="col-lg-9  col-md-8  col-sm-7">
                        <div class="firstRowHeader">
                            <h5><?php tabelnomin(); ?></h5>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="index.php"><?php echo ucwords($judul); ?></a></li>
                            <li><a>Menu</a></li>
                            <li><a><?php tabelnomin(); ?></a></li>

                        </ol>
                    </div>
                    <!--firstRowHeader-->
                    <div class="col-lg-3   col-md-4  col-sm-5">
                        <div class="miniDiagramsConteiner">

                        </div>
                        <!--miniDiagramsConteiner-->
                    </div>
                </div>
                <!--	MEIN CONTENT  -->
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="panel panel-default">
                            <div class="panel-heading clearfix">
                                <div class="panel-heading-title pull-left">
                                    <h6></h6>
                                </div>
                                <!--panel-heading-title-->
                                <div class="panel-heading-buttons pull-right">
                                    <div class="bs-example">
                                        <ul class="clearfix">
                                            <a href="<?php home(); ?>">
                                                <li class="btn btn-defult remove"><i class="fa fa-times"></i></li>
                                            </a>

                                        </ul>
                                    </div>
                                </div>
                                <!--panel-heading-buttons-->
                            </div>
                            <!--panel-->
                            <div class="panel-body">
                                <div class="dataTableWrapper">

                                    <?= $this->renderSection('halaman') ?>

                                </div>
                            </div>
                        </div>
                        <!--panel-body-->
                    </div>
                </div>
                <!--row-->


            </div>
        </div>
        <div class="fotterWrapper">
            <?php echo $copyright; ?>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.11.3.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/sparklineChart/sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/sparklineChart/sparklineant.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/expandingSearchBar/uisearch.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/expandingSearchBar/classie.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/slimscroll/jquery.slimscroll.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/customScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/metisMenu/metisMenu.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/momentjs/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/waves/waves.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/dataTable/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>js/dataTableFunctions.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>js/functions.js"></script>

    <?php SweetAlert::load(); ?>
    <?= $this->renderSection('script') ?>

</body>

</html>