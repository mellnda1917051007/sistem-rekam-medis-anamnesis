<?php
$this->extend('/home/app.php');

include dirname(__FILE__) . "/../../../app/RCore/BridgeView.php";

$this->section("halaman");
?>
<section id="about-part" class="pt-25">
    <div class="container">
        <div class="row">
            <div class="col-md-12 pb-2">

                <div class="pd-wrap">
                    <div class="container">
                        <div class="heading-section">
                            <h2 class="mb-5 mt-5">Event Details</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="item">
                                    <a class="gallery-img image-popup image-popup" href="<?= base_url('uploads/' . $data['foto']) ?>">
                                        <img src="<?= base_url('uploads/' . $data['foto']) ?>" width="100%" onerror="this.src='<?= base_url('') ?>/home/data/image/error/error.png'">
                                    </a>
                                    <div id="fh5co-gallery">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="gallery animate-box fadeInUp animated">

                                                        <a class="gallery-img image-popup image-popup" href="<?= base_url('uploads/' . $data['foto2']) ?>"><img src="<?= base_url('uploads/' . $data['foto2']) ?>" class="img-responsive"></a>
                                                    </div>

                                                </div>
                                                <div class="col-md-4">
                                                    <div class="gallery animate-box fadeInUp animated">
                                                        <a class="gallery-img image-popup image-popup" href="<?= base_url('uploads/' . $data['foto3']) ?>"><img src="<?= base_url('uploads/' . $data['foto3']) ?>" class="img-responsive"></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="product-dtl">
                                    <div class="product-info">
                                        <div class="product-name">Paket Silver</div>
                                        <div class="reviews-counter">

                                            <span>0x Dipesan</span>
                                        </div>
                                        <div class="product-price-discount">
                                            <span>Rp. <?= format_rupiah($data['harga']) ?></span>
                                        </div>
                                        <font color="green">Total Paket : <?= $data['jumlah'] ?></font>
                                    </div>
                                    <br>
                                    <p>
                                        <?= nl2br($data['keterangan']) ?>
                                    </p>

                                    <div class="product-count">
                                        <form action="" method="post">
                                            <input type="hidden" name="harga" value="<?= $data['harga'] ?>">
                                            <br>
                                            <br>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="size">Jumlah</label><br>
                                                </div>
                                                <div class="col-md-1"><b>:</b>
                                                </div>
                                                <div class="col-md-6">
                                                    <input style="width:300px" name="jumlah" type="number" min="1" value="1" max="<?= $data['jumlah'] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="size">Jumlah hari </label><br>
                                                </div>
                                                <div class="col-md-1"><b>:</b>
                                                </div>
                                                <div class="col-md-6">
                                                    <input style="width:300px" name="jumlah_hari" type="number" min="1" value="1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="size">Catatan </label><br>
                                                </div>
                                                <div class="col-md-1"><b>:</b>
                                                </div>
                                                <div class="col-md-6">
                                                    <textarea style="width:300px" name="catatan" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="size_2-right">
                                                <button href="index" class="btn btn-primary rounded">Add to Cart
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php

$this->endSection();

