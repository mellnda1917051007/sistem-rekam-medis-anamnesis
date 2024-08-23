<?php
$this->extend('/home/app.php');

include dirname(__FILE__) . "/../../../app/RCore/BridgeView.php";

$this->section("halaman");
?>

<section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(/home/data/image/background/slide_a.png)" data-overlay="4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Paket Event</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Paket Event</li>
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
                        <div class="col-md-3">

                            <div class="pricing-box-alt">
                                <div class="pricing-terms">
                                    <a href="<?= route_to('home.produk.detail', $data['id_paket']) ?>">
                                        <img width="350" height="200" onerror="<?= 'this.src=\'' . base_url('/home/data/image/error/error.png') . '\'' ?>" src="<?= base_url('uploads/' . $data['foto']) ?>">
                                    </a>
                                </div>
                                <div class="pricing-content">
                                    <center>

                                        <h4 class="m-3">
                                            <?= $data['nama_paket'] ?>
                                        </h4>
                                        <span class="badge-danger p-1 rounded font-weight-light">
                                            Kategori :
                                            <?php
                                            echo $data['kategori'];
                                            ?> </span>

                                        <br>
                                        <h3 class="m-2">
                                            Rp. <?= format_rupiah($data['harga']) ?>
                                        </h3>
                                        <a href="<?= route_to('home.produk.detail', $data['id_paket']) ?>" class="btn btn-info">
                                            Detail
                                        </a>

                                        <br>
                                        <br>
                                    </center>
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

