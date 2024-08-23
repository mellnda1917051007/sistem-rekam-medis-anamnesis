<?php
$this->extend('home/app.php');

$this->section("halaman");
?>
    <section id="page-banner" class="single-slider bg_cover pt-150"
             style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Galery</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Galery</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">


                <div id="fh5co-gallery">
                    <center>
                        <h2>Wedding Gallery</h2>
                        <?php
                        $profil = \App\Repo\pelanggan\DataProfilRepo::first();
                        if ($profil) {
                            echo $profil['nama'];
                        }
                        ?>
                    </center>
                    <div class="row">
                        <div class="">

                            <br> <br>
                        </div>
                    </div>
                    <div class="row">


                        <?php
                        $no = ($pager->getCurrentPage() - 1) * $pager->getPerPage();

                        foreach ($datas as $data) { ?>
                            <div class="col-md-4 p-1">
                                <div class="card border-0">
                                    <a target="_blank" class="gallery-img image-popup"
                                       href="<?= base_url('uploads/' . $data['foto']) ?>">
                                        <img src="<?= base_url('uploads/' . $data['foto']) ?>"
                                             onerror="this.src='<?= base_url('home/data/image/error/error.png') ?>'"
                                             style="height:300px" class="img-fluid" alt="">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?= $data['judul'] ?>
                                        </h5>
                                        <p class="card-text">
                                            <?= $data['keterangan'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <center>
                            Jumlah <?= $pager->getTotal() ?> data, Halaman <?= $pager->getCurrentPage() ?>
                            Dari <?= $pager->getLastPage() ?> Halaman
                            <?php
                            echo $pager->links();
                            ?>
                        </center>
                        <br>
                        <br>
                    </div>
                </div>
            </div>

            <h2>&nbsp;</h2>

        </div>


    </section>
<?php

$this->endSection();