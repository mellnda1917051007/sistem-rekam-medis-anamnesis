<?php

use App\Repo\pelanggan\DataTransaksiRepo;

$this->extend('home/app.php');

$this->section("halaman");
?>
<section id="page-banner" class="single-slider bg_cover pt-150" style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>Transaksi</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
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

            <div class="col-md-12" style="background:white">
                <h2>
                    <b>DAFTAR TRANSAKSI</b>
                </h2>
                <hr>
            </div>

            <?php
            foreach ($datas as $data) {
                $data_pemesanan = DataTransaksiRepo::pemesanan($data['kode_transaksi']);
            ?>
                <div class="col-md-12 mb-3">
                    <h4>
                        KODE TRANSAKSI :
                        <font color="red">
                            <?= $data['kode_transaksi'] ?>
                        </font>
                    </h4>
                    <h4 class="mb-2 d-flex">
                        <a style="text-align:left"> Tanggal Transaksi :
                            <font color="blue">
                                <?= tanggal_indo($data['tanggal_transaksi']) ?>
                            </font>
                        </a>

                        <a style="text-align:right" class="ml-auto">
                            Tanggal Event: <font color="blue">
                                <?php
                                if ($data_pemesanan) {
                                    echo tanggal_indo($data_pemesanan['tanggal_pemesanan']);
                                }
                                ?>
                                <br>
                            </font>
                        </a>
                        <br>
                    </h4>

                    <div style="overflow-x:auto;">
                        <table width="100%" border="1" align="left" class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th align="center" class="th_border cell">Nama Paket, Catatan</th>
                                    <th align="center" class="th_border cell">Harga</th>
                                    <th align="center" class="th_border cell">Jumlah</th>
                                    <th align="center" class="th_border cell">Total</th>
                                    <th align="center" class="th_border cell">
                                        <center>Status</center>
                                    </th>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php
                                $total_transaksi = 0;
                                foreach (DataTransaksiRepo::get_by_kode_transaksi($data['kode_transaksi']) as $key => $data_transaksi) {
                                ?>
                                    <tr class="event2">
                                        <td align="left" width="50">
                                            <?php
                                            echo $key + 1;
                                            ?>
                                        </td>
                                        <td align="left">
                                            <?php
                                            $data_paket = DataTransaksiRepo::get_data_paket($data_transaksi['id_paket']);
                                            ?>
                                            <img width="70" height="50" onerror="this.src='home/data/image/error/error.png'" src="<?= base_url('uploads/' . ($data_paket ? $data_paket['foto'] : '')) ?>">
                                            &nbsp;
                                            &nbsp;
                                            <b>
                                                <?php
                                                if ($data_paket) {
                                                    echo $data_paket['nama_paket'];
                                                }
                                                ?>
                                            </b>
                                            <p>
                                                <?php
                                                if ($data_paket) {
                                                    echo $data_transaksi['catatan'];
                                                }
                                                ?>
                                            </p>
                                        </td>
                                        <td align="left">
                                            <font color="green"><b>
                                                    <?php
                                                    echo format_rupiah($data_transaksi['harga']);
                                                    ?>
                                                </b></font>
                                        </td>
                                        <td align="left">
                                            <?= $data_transaksi['jumlah'] ?><br>
                                        </td>
                                        <td align="left">
                                            <font color="green"><b>
                                                    Rp. <?=
                                                        format_rupiah($jumlah_transaksi = $data_transaksi['harga'] * $data_transaksi['jumlah']);
                                                        $total_transaksi += $jumlah_transaksi;
                                                        ?>
                                                </b></font>
                                        </td>

                                        <td class="th_border cell" align="left" width="200">
                                            <center>
                                                <b>
                                                    <?= $data_transaksi['status'] ?><br>
                                                </b>
                                            </center>
                                            <br>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                            <tbody>
                                <tr>
                                    <th align="center" colspan="3" class="th_border cell"></th>
                                    <th align="center" class="th_border cell">Total Pembayaran : </th>
                                    <th align="center" class="th_border cell">
                                        Rp. <?=
                                            format_rupiah($total_transaksi);
                                            ?>
                                    </th>
                                    <td class="th_border cell" align="left" width="200">
                                        <table border="0">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        if ($data['status'] == 'menunggu_konfirmasi') {
                                                        ?>
                                                            <img src="<?= base_url('uploads/' . $data_pemesanan['foto_bukti_pembayaran']) ?>">
                                                        <?php
                                                        }
                                                        if ($data['status'] != 'batal' || $data['status'] != 'selesai') {
                                                        ?>
                                                            <a href="<?= route_to('home.upload_bukti', $data['kode_transaksi']) ?>">
                                                                <button class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>
                                                                    Upload Bukti Pembayaran
                                                                </button>
                                                            </a>

                                                            <form action="" method="POST">
                                                                <a href="">
                                                                    <input type="hidden" name="kode_transaksi" value="<?= $data['kode_transaksi'] ?>">
                                                                    <button class="btn btn-danger btn-xs" type="submit" value="batal" name="action"><i class="fa fa-remove"></i>
                                                                        Batal Pemesanan
                                                                    </button>
                                                                </a>
                                                            </form>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
            }

            ?>

            <div class="col-md-12">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>







            <h2>&nbsp;</h2>

        </div>
    </div>

</section>
<?php

$this->endSection();
