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
    <div class="content-box-header" style="height: 39px">Edit<h3></h3>
    </div>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="content-box-content">
            <div id="postcustom">
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>
                    <tbody>
                        <?php

                        if (!isset($_GET['proses'])) {
                        ?>
                            <script>
                                alert("AKSES DITOLAK");
                                location.href = "index.php";
                            </script>
                        <?php
                            die();
                        }
                        ?>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Berita Acara Penderita Pulang <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?= $data['id_berita_acara_penderita_pulang'] ?>" name="id_berita_acara_penderita_pulang" placeholder="id_berita_acara_penderita_pulang" id="id_berita_acara_penderita_pulang" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Rekam Medis <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_rekam_medis" id="id_rekam_medis" required="required">
                                    <option value="<?= $data['id_rekam_medis'] ?>">
                                        - <?= $data['id_rekam_medis'] ?> (
                                        <?php
                                        $data_rekam_medis = \app\repo\admin\DataBeritaAcaraPengirimanPenderitaPulangrepo::get_data_rekam_medis($data['id_rekam_medis']);
                                        if ($data_rekam_medis) {
                                            echo $data_rekam_medis['id_pasien'];
                                        }
                                        ?>
                                        ) -
                                    </option>
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
                                <input class='' type="file" name="file" id="file" placeholder="File" value="<?= $data['file'] ?>">
                                <?= show_error_message($validation ? $validation->getError("file") : null); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' UPDATE'); ?>
                    </center>
                </div>
            </div>
        </div>
    </form>
    <?php
    $this->endsection();
    ?>