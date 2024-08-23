<?php

use App\RCore\Setting_Keluarga;
use App\RCore\Bridge_keluarga;

$url = Setting_Keluarga::instance()->get_lokasi_lg();

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

$avatar = Setting_Keluarga::instance()->get_avatar();
$siapa = Setting_Keluarga::instance()->siapa;
$copyright = Setting_Keluarga::instance()->copyright;
$judul = Setting_Keluarga::instance()->judul();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="<?php echo $url; ?>/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo $url; ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo $url; ?>/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url; ?>/css/icon-font.min.css" type='text/css' />
    <script src="<?php echo $url; ?>/js/Chart.js"></script>
    <link href="<?php echo $url; ?>/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="<?php echo $url; ?>/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <script src="<?php echo $url; ?>/js/jquery-1.10.2.min.js"></script>

</head>

<body class="sign-in-up">
    <section>
        <div id="page-wrapper" style="
    background: #009FFF;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #ec2F4B, #009FFF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #a84f7f, #009FFF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
" class="sign-in-wrapper">
            <div class="graphs">
                <div class="sign-in-form">
                    <div class="sign-in-form-top" style="
    background: url(https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.shutterstock.com%2Fid%2Fsearch%2Fmental-health&psig=AOvVaw3X4sDqqSARGAji6r2ueoX8&ust=1713680977594000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCKDB86GV0IUDFQAAAAAdAAAAABAE);
">
                        <p><span>Form</span> <a href="#">Login</a></p>
                    </div>
                    <div class="signin">
                        <div class="signin-rit">
                            <?php if (session()->getFlashdata('msg')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                            <?php endif; ?>
                        </div>
                        <form action="" method="post">
                            <div class="log-input">
                                <div class="log-input-left">
                                    <input type="text" name="username" class="user" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}" />
                                </div>

                                <div class="clearfix"> </div>
                            </div>
                            <div class="log-input">
                                <div class="log-input-left">
                                    <input name="password" type="password" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}" />
                                </div>

                                <div class="clearfix"> </div>
                            </div>
                            <input name="login" type="submit" value="Login" style="
    background: #009FFF;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #ec2F4B, #009FFF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #ec2F4B, #009FFF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
                            <a href="daftar">Daftar Disini</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <footer>
            <p><?php echo $copyright; ?></p>
        </footer>
    </section>

    <script src="<?php echo $url; ?>/js/jquery.nicescroll.js"></script>
    <script src="<?php echo $url; ?>/js/scripts.js"></script>
    <script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>
</body>

</html>