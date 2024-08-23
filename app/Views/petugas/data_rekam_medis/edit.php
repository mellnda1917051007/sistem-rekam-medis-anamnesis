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
                                <label>Id Rekam Medis <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?= $data['id_rekam_medis'] ?>" name="id_rekam_medis" placeholder="id_rekam_medis" id="id_rekam_medis" required="required">
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Id Petugas <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_pasien" id="id_pasien" required="required">
                                    <option value="<?= $data['id_pasien'] ?>">
                                        - <?= $data['id_pasien'] ?> (
                                        <?php
                                        $data_pasien = \app\repo\admin\DataRekamMedisrepo::get_data_pasien($data['id_pasien']);
                                        if ($data_pasien) {
                                            echo $data_pasien['id_petugas'];
                                        }
                                        ?>
                                        ) -
                                    </option>
                                    <?php
                                    combo_database2("data_pasien", "id_pasien", "id_petugas", null);
                                    ?>
                                </select>
                                <?= show_error_message($validation ? $validation->geterror("id_pasien") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Obat <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="obat" id="obat" placeholder="Obat" required="required"><?= $data['obat'] ?></textarea>
                                <?= show_error_message($validation ? $validation->getError("obat") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Nama Tenaga Medis <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="nama_tenaga_medis" id="nama_tenaga_medis" placeholder="Nama Tenaga Medis" required="required"><?= $data['nama_tenaga_medis'] ?></textarea>
                                <?= show_error_message($validation ? $validation->getError("nama_tenaga_medis") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label>Status <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class='' name="status" id="status" placeholder="Status" required="required"><?= $data['status'] ?></textarea>
                                <?= show_error_message($validation ? $validation->getError("status") : null); ?>
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