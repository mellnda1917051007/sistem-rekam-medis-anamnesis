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
                                <label>Id Anamnesis <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_anamnesis", "id_anamnesis", "10"); ?>" name="id_anamnesis" placeholder="id_anamnesis" id="id_anamnesis" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Keadaan <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="keadaan_baik" id="keadaan_baik" placeholder="Keadaan Baik" required="required" value="<?= set_value('keadaan_baik') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("keadaan_baik") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Kesadaran <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="kesadaran" id="kesadaran" placeholder="Kesadaran" required="required" value="<?= set_value('kesadaran') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("kesadaran") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Refleksi Pupil Kanan <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="refleksi_pupil_kanan" id="refleksi_pupil_kanan" placeholder="Refleksi Pupil Kanan" required="required" value="<?= set_value('refleksi_pupil_kanan') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("refleksi_pupil_kanan") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Refleksi Pupil Kiri <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="refleksi_pupil_kiri" id="refleksi_pupil_kiri" placeholder="Refleksi Pupil Kiri" required="required" value="<?= set_value('refleksi_pupil_kiri') ?>"></textarea>
                                <?= show_error_message($validation ? $validation->getError("refleksi_pupil_kiri") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Tekanan Darah <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="tekanan_darah" id="tekanan_darah" placeholder="Tekanan Darah" required="required" value="<?= set_value('tekanan_darah') ?>">
                                <?= show_error_message($validation ? $validation->getError("tekanan_darah") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nadi <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="nadi" id="nadi" placeholder="Nadi" required="required" value="<?= set_value('nadi') ?>">
                                <?= show_error_message($validation ? $validation->getError("nadi") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Pernapasan <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="pernapasan" id="pernapasan" placeholder="Pernapasan" required="required" value="<?= set_value('pernapasan') ?>">
                                <?= show_error_message($validation ? $validation->getError("pernapasan") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Suhu <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="text" name="suhu" id="suhu" placeholder="Suhu" required="required" value="<?= set_value('suhu') ?>">
                                <?= show_error_message($validation ? $validation->getError("suhu") : null); ?>
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