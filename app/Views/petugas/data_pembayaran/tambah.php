<?php

$this->extend(\Config\Setting_Petugas::instance()->tmp_views());
include dirname(__FILE__) . '/index.php';

$this->section("halaman");

?>
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-header" style="height: 39px">Tambah<h3></h3>
    </div>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="content-box-content">
            <div id="postcustom">
                <table <?php tabel_in(100, '%', 0, 'center');  ?>>
                    <tbody>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Pembayaran <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_pembayaran", "id_pembayaran", "10"); ?>" name="id_pembayaran" placeholder="id_pembayaran" id="id_pembayaran" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Pasien <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_rekam_medis" id="id_rekam_medis" required="required">
                                    <?php
                                    combo_database2("data_rekam_medis", "id_rekam_medis", "id_pasien", null);
                                    ?>
                                </select>
                                <?= show_error_message($validation ? $validation->geterror("id_rekam_medis") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama Biaya <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="nama_biaya" id="nama_biaya" placeholder="Nama Biaya" required="required" value="<?= set_value('nama_biaya') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("nama_biaya") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Harga <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="harga" id="harga" placeholder="Harga" required="required" value="<?= set_value('harga') ?>">
                                <?= show_error_message($validation ? $validation->getError("harga") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Total <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="total" id="total" placeholder="Total" required="required" value="<?= set_value('total') ?>">
                                <?= show_error_message($validation ? $validation->getError("total") : null); ?>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_simpan(' SIMPAN'); ?>
                    </center>
                </div>
            </div>
        </div>
    </form>
    <?php
    $this->endsection();
    ?>