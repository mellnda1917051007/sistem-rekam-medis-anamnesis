<?php

$this->extend(\Config\Setting::instance()->tmp_views());
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
                                <label for="id_rekam_medis">Id Rekam Medis <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="text" name="id_rekam_medis" id="id_rekam_medis" list="datalist_id_rekam_medis" required="required">
                                <datalist id="datalist_id_rekam_medis">
                                    <?php
                                    combo_database2("data_rekam_medis", "id_rekam_medis", "id_pasien", null);
                                    ?>
                                </datalist>
                                <?= show_error_message($validation ? $validation->getError("id_rekam_medis") : null); ?>
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
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Status <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="status" id="status">
                                    <?= combo_enum('data_pembayaran', 'status', '') ?>
                                </select>
                                <?= show_error_message($validation ? $validation->getError("status") : null); ?>

                                <?= show_error_message($validation ? $validation->geterror("status") : null); ?>
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