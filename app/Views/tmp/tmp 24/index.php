<?php 
$default_url = '../../../data/tmp/tmp 24';
$tema = '24-easy_admin_panel';
$url = $default_url.'/'.$tema;
include '../../../include/all_include.php';
include '../../../include/function/session.php'; 
?>

<script type="application/x-javascript">
    addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar() {
        window.scrollTo(0, 1);
    }
</script>
<link
    href="<?php echo $url;?>/css/bootstrap.min.css"
    rel='stylesheet'
    type='text/css'/>
<link href="<?php echo $url;?>/css/style.css" rel='stylesheet' type='text/css'/>
<link href="<?php echo $url;?>/css/font-awesome.css" rel="stylesheet">
<link
    rel="stylesheet"
    href="<?php echo $url;?>/css/icon-font.min.css"
    type='text/css'/>
<script src="<?php echo $url;?>/js/Chart.js"></script>
<link
    href="<?php echo $url;?>/css/animate.css"
    rel="stylesheet"
    type="text/css"
    media="all">
<script src="<?php echo $url;?>/js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<link
    href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic'
    rel='stylesheet'
    type='text/css'>
<script src="<?php echo $url;?>/js/jquery-1.10.2.min.js"></script>

</head>

<body class="sticky-header left-side-collapsed" onload="initMap()">
<section>
    <div class="left-side sticky-left-side" style="background-color: #f06f15;">
        <div class="logo">

            <h5>
                <a href="<?php home();?>"><?php echo $judul; ?>
                    <span></span></a>
            </h5>
            <img
                src="<?php echo $avatar; ?>"
                width="50"
                class="img-circle"
                alt="User Image">

        </div>
        <div class="logo-icon text-center">
            <a href="<?php home();?>">
                <i class="lnr lnr-user"></i>
            </a>
        </div>
        <br>

        <div class="left-side-inner">

            <ul class="nav nav-pills nav-stacked custom-nav" style="
    background-color: #dd6512;
">
                <br>

                <!-- MENU -->
                <?php
$m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
                <!-- SINGLE -->
                <li style="
    background-color: #dd6512;
">
                    <a href="<?php echo $i->l;?>">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span></a>
                </li>
                <!-- /SINGLE -->
            <?php
}else if($i->t == 'm' ){ $idmenu = $i->id;
?>
                <!-- MULTI -->
                <li class="menu-list" style="
    background-color: #dd6512;
">
                    <a href="#">
                        <i class="<?php echo $i->i;?>"></i>
                        <span><?php echo $i->n;?></span></a>
                    <ul class="sub-menu-list">
                        <?php
		$m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
		foreach($m1 as $i1) {
		if($i1->s=="$idmenu" and $i1->t=="sm" ){
		?>
                        <li>
                            <a class="item" href="<?php echo $i1->l;?>">
                                <i class="<?php echo $i1->i;?>"></i>
                                <?php echo $i1->n;?></a>
                        </li>
                        <?php }} ?>
                    </ul>
                </li>

                <!-- /MULTI -->
                <?php }} ?>
                <!-- /MENU -->
            </ul>

        </div>
    </div>

    <div class="main-content main-content4">
        <div class="header-section" style="
    background: #f12711;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #f5af19, #f12711);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #f5af19, #f12711); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
            <a class="toggle-btn  menu-collapsed">
                <i class="fa fa-bars"></i>
            </a>
            <div class="menu-right">
                <div class="user-panel-top">
                    <div class="profile_details_left">
                        <ul class="nofitications-dropdown">
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="profile_details">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a
                                    href="#"
                                    class="dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="profile_img">
                                        <span style="background:url(images/1.jpg) no-repeat center"></span>
                                        <div class="user-name">
                                            <p><?php echo $siapa;?>
                                                <span>Admin</span></p>
                                        </div>
                                        <i class="lnr lnr-chevron-down"></i>
                                        <i class="lnr lnr-chevron-up"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li>
                                        <a href="<?php home();?>">
                                            <i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="<?php logout();?>">
                                            <i class="fa fa-sign-out"></i>
                                            Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <div class="clearfix"></div>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
        <div id="page-wrapper">
            <div class="graphs">
                <h3 class="blank1"><?php tabelnomin(); ?>
                </h3>
                <div class="xs tabls">
                    <div class="bs-example4" data-example-id="contextual-table" style="
    background-color: beige;
">

                        <?php include 'halaman.php'; ?>

                        <br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <p><?php echo $copyright; ?></p>
</footer>
</section>

<script src="<?php echo $url;?>/js/jquery.nicescroll.js"></script>
<script src="<?php echo $url;?>/js/scripts.js"></script>
<script src="<?php echo $url;?>/js/bootstrap.min.js"></script>
</body>
</html>