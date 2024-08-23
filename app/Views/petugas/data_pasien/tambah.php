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
                                <label>Id Pasien <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_pasien", "id_pasien", "10"); ?>" name="id_pasien" placeholder="id_pasien" id="id_pasien" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_petugas" id="id_petugas" required="required">
                                    <?php
                                    combo_database2("data_petugas", "id_petugas", "nama", null);
                                    ?>
                                </select>
                                <?= show_error_message($validation ? $validation->geterror("id_petugas") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama Lengkap <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required="required" value="<?= set_value('nama_lengkap') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("nama_lengkap") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Jenis Kelamin <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" required="required" value="<?= set_value('jenis_kelamin') ?>">
                                <?= show_error_message($validation ? $validation->getError("jenis_kelamin") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Tanggal Masuk <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="date" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" required="required" value="<?= set_value('tanggal_masuk') ?>">
                                <?= show_error_message($validation ? $validation->getError("tanggal_masuk") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Diagnosa Kejiwaan <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="diagnosa_kejiwaan" id="diagnosa_kejiwaan" placeholder="Diagnosa Kejiwaan" required="required" value="<?= set_value('diagnosa_kejiwaan') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("diagnosa_kejiwaan") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Status <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="status" id="status" placeholder="Status" required="required" value="<?= set_value('status') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("status") : null); ?>
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