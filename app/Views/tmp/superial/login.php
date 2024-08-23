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
$judul = Setting::instance()->judul();

?>
<!DOCTYPE html>

<head>

    <link href="<?php echo $url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>css/scss/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $url; ?>lib/waves/waves.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="registrationWrapper clearfix">
        <div class="registrationContent">
            <div class="registrationHeader">
                <!-- <h1>FORM LOGIN</h1> -->
                <br>
                <p> <?php echo ucwords($judul); ?></p>
            </div>
            <!--registrationHeader-->
            <br>
            <form action='' method='POST'>
                <div class="row inputWrapper ">
                    <div class="col-md-12 ">
                        <div class="left-inner-addon ">
                            <i class="fa fa-user"></i>
                            <input class="form-control" name="username" type="text" placeholder="Username">
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <div class="col-md-12 ">
                        <div class="left-inner-addon ">
                            <i class="fa fa-key"></i>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                </div>
                <div class="registrationButtonPlaseholder">



                    <a href="../../" class="btn btn-info btn-df float-button-light">CANCEL</a>
                    <button type="submit" type='submit' name="login" class="btn btn-info btn-df float-button-light">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
        <!--registrationContent-->
    </div>


    <script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>lib/waves/waves.min.js"></script>
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>

</body>

</html>