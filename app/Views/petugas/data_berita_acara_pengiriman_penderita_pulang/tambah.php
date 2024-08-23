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
                                <label>Id Berita Acara Penderita Pulang <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?php echo id_otomatis("data_berita_acara_pengiriman_penderita_pulang", "id_berita_acara_penderita_pulang", "10"); ?>" name="id_berita_acara_penderita_pulang" placeholder="id_berita_acara_penderita_pulang" id="id_berita_acara_penderita_pulang" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Rekam Medis <span class="highlight"></span></label>
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
                                <label>File <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input class='' type="file" name="file" id="file" placeholder="File" required="required" value="<?= set_value('file') ?>">
                                <?= show_error_message($validation ? $validation->getError("file") : null); ?>
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