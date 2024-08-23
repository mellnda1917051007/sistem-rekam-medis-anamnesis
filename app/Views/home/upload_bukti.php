<?php
$this->extend('home/app.php');

$this->section("halaman");
?>
<section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Pembayaran</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= route_to('home.transaksi') ?>">Transaksi</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload bukti pembayaran</li>
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
            <?php
            foreach ($data_banks as $key => $bank) {
            ?>
                <div class="col-md-2" style="background:white;">
                    <div class="card p-3">
                        <img src="<?= base_url('uploads/' . $bank['foto_logo_bank']) ?>" class="card-img-top">
                        <h5 class="card-title mt-3">
                            <?= $bank['nama_bank'] ?>
                        </h5>
                        <?= $bank['nama_pemilik'] ?>
                        <?= $bank['rekening'] ?>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-md-4">
                <hr>
                <h5>
                    Total Transaksi
                </h5>
                <h4 class="p-3 text-danger">
                    Rp. <?= format_rupiah($data_pemesanan['total_bayar']); ?>
                </h4>
                <hr>
                <h4 class="pb-2">
                    Konfirmasi Upload Bukti
                </h4>
                <form action="" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <select id="id_bank" class="form-control" name="id_bank" placeholder="Nama Bank">
                            <?php
                            combo_database2("data_bank", "id_bank", "nama_bank", "");
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto_bukti_pembayaran" class="mt-3">Foto Bukti Pembayaran</label>
                        <input type="file" id="foto_bukti_pembayaran" class="form-control" name="foto_bukti_pembayaran" placeholder="Foto Bukti Pembayaran">
                    </div>
                    <div class="form-group">
                        <button type="submit" id="nama_bank" class="btn btn-success mt-3" name="nama_bank">
                            <i class="fa fa-upload"></i>
                            Upload sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$this->endSection();
