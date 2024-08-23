<?php
$this->extend('home/app.php');

$this->section("halaman");
?>
<section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Keranjang</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('produk') ?>">Produk</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
            <div class="col-md-12">
                <center>
                    <h2> DAFTAR PAKET TERPILIH </h2>
                </center>
            </div>
            <div class="col-md-12">
                <center>
                    <form action="" method="get">
                        <input type="hidden" name="action" value="cek">
                        <h4 class="m-3"> TANGGAL PEMESANAN / SEWA :</h4>
                        <input type="date" min="<?= date('Y-m-d') ?>" name="rencana" id="rencana" class="form-control m-3" style="width: 200px" value="<?= $rencana == null ? '' : $rencana; ?>">
                        <input type="submit" class="btn btn-primary btn-lg" value="CEK KETERSEDIAAN PAKET">
                        <?php
                        if ($hasil_cek) {
                        ?>
                            <h4 class="mt-2 mb-2 bg-success p-3 rounded text-white">
                                Tanggal tersedia, segera selesai kan transaksi kamu!
                            </h4>
                        <?php
                        }
                        ?>
                    </form>
                </center>
            </div>
            <style>
                .th {
                    background: #f34d35;
                }

                .tf {
                    background: #f34d35;

                }
            </style>
            <br>
            <br>
            <div class="col-md-12" style="background:white">
                <br>
                <hr>
                <h4>
                    <b>DAFTAR PAKET TERPILIH</b>
                    <br>
                    <br>
                </h4>
                <div class="table">
                    <table width="100%" border="1" align="left" class="table table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th align="center" class="th_border cell">Nama Paket, Catatan</th>
                                <th align="center" class="th_border cell">harga</th>
                                <th align="center" class="th_border cell"> Keterangan</th>

                                <th align="center" class="th_border cell">Total</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $total_pembayaran = 0;
                            foreach ($datas as $key => $data) {
                                $paket = App\Repo\admin\DataTransaksiRepo::get_data_paket($data['id_paket']);
                            ?>
                                <tr>
                                    <td>
                                        <?= $key + 1 ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url('uploads/' . $paket['foto']) ?>" alt="" width="100">
                                    </td>
                                    <td>
                                        <b>
                                            <?= $paket['nama_paket'] ?>
                                        </b>
                                        <p>
                                            <?= $data['catatan'] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <?= format_rupiah($data['harga']); ?>
                                    </td>
                                    <td>
                                        <?= $data['jumlah_hari'] ?> hari
                                    </td>
                                    <td>
                                        <?php
                                        $jumlah = $data['harga'] * $data['jumlah'];
                                        echo format_rupiah($jumlah);
                                        ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="">Batal</a>
                                    </td>
                                </tr>
                            <?php
                                $total_pembayaran += $jumlah;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <form method="get" style="background:white">
                <input name="action" value="selesai" type="hidden">
                <input name="tanggal_pemesanan" value="<?= $rencana ?>" type="hidden">

                <div class="col-md-4" style="background:white;  height:300px">

                    <h4>
                        <b>PEMBAYARAN</b>
                        <br>
                        <br>
                    </h4>
                    <div class="col-md-4" style="background:white; height:100px">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Jumlah Paket </td>
                                    <td>:</td>
                                    <td>
                                        <font color="red"><b><?= count($datas) ?> Paket</b></font>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Total Pembayaran </td>
                                    <td>:</td>
                                    <td>
                                        <font color="red"><b id="total_pembayaran_tampil">Rp. <?= format_rupiah($total_pembayaran) ?></b></font>
                                        <input name="total_pembayaran" value="<?= $total_pembayaran ?>" id="total_pembayaran" type="hidden">
                                    </td>
                                </tr>


                                <tr>
                                    <td>
                                        <?php
                                        if ($hasil_cek) {
                                        ?>
                                            <button class="btn btn-primary" style="width: 200px;">Selesai</button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td></td>
                                    <td>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12">
                <br><br><br><br><br><br><br><br>
            </div>

            <h2>&nbsp;</h2>

        </div>
    </div>

</section>
<?php

$this->endSection();

