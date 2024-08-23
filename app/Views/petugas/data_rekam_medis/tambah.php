<?php

$this->extend(\Config\Setting_Petugas::instance()->tmp_views());
include dirname(__FILE__) . '/index.php';

$this->section("halaman");

?>
<a href="javascript:history.back()">
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
                                <label>Id Rekam Medis <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_rekam_medis", "id_rekam_medis", "10"); ?>" name="id_rekam_medis" placeholder="id_rekam_medis" id="id_rekam_medis" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama Pasien <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_pasien" id="id_pasien" required="required">
                                    <?php
                                    combo_database2("data_pasien", "id_pasien", "nama_lengkap", null);
                                    ?>
                                </select>
                                <?= show_error_message($validation ? $validation->geterror("id_pasien") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label for="id_rekam_medis">Id Anamnesis <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="text" name="id_anamnesis" id="id_anamnesis" list="datalist_id_anamnesis" required="required">
                                <datalist id="datalist_id_anamnesis">
                                    <?php
                                    combo_database2("data_anamnesis", "id_anamnesis", "keadaan_baik", null);
                                    ?>
                                </datalist>
                                <?= show_error_message($validation ? $validation->getError("id_anamnesis") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Obat <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="obat" id="obat" placeholder="Obat" required="required" value="<?= set_value('obat') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("obat") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama Petugas <span class="highlight"></span></label>
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