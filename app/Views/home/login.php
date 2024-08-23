<?php
$this->extend('home/app.php');

$this->section("halaman");
?>
<section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Login</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about-part" class="pt-25">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <h4 class="font-weight-bold">

                </h4>
                <hr>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username" name="username">
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="row">
                        <div class="col-md-12 d-flex">
                            <button type="submit" class="btn btn-primary mt-3 mr-auto">Login Sekarang</button>
                            <p class="align-self-end">
                                Belum punya akun ?
                                <a href="<?= route_to('home.daftar') ?>" class=""> Daftar</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php

$this->endSection();
