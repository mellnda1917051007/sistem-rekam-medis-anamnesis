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
                                <label>Nama Pasien<span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_pasien" id="id_pasien" required="required">
                                    <option value="<?= $data['id_pasien'] ?>">
                                        - <?= $data['id_pasien'] ?> (
                                        <?php
                                        $data_pasien = \app\repo\admin\DataRekamMedisrepo::get_data_pasien($data['id_pasien']);
                                        if ($data_pasien) {
                                            echo $data_pasien['nama_lengkap'];
                                        }
                                        ?>
                                        ) -
                                    </option>
                                    <?php
                                    combo_database2("data_pasien", "id_pasien", "nama_lengkap", null);
                                    ?>
                                </select>
                                <?= show_error_message($validation ? $validation->geterror("id_pasien") : null); ?>
                            </td>
                        </tr>
                        <tr>
                            <td width="25%" class="leftrowcms">
                                <label for="id_anamnesis">Id Anamnesis <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_anamnesis" id="id_anamnesis" required="required">
                                    <option value="<?= $data['id_anamnesis'] ?>">
                                        <?= $data['id_anamnesis'] ?>
                                    </option>
                                    <?php
                                    combo_database2("data_anamnesis", "id_anamnesis", "keadaan_baik", null);
                                    ?>
                                </select>
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
                                <label>Nama Petugas<span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class='' name="id_petugas" id="id_petugas" required="required">
                                    <option value="<?= $data['id_petugas'] ?>">
                                        - <?= $data['id_petugas'] ?> (
                                        <?php
                                        $data_petugas = \app\repo\admin\DataRekamMedisrepo::get_data_petugas($data['id_petugas']);
                                        if ($data_petugas) {
                                            echo $data_petugas['nama'];
                                        }
                                        ?>
                                        ) -
                                    </option>
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