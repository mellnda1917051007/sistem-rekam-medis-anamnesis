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
                                <label>Id Petugas <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input type="readonly" readonly value="<?= $data ['id_petugas'] ?>" name="id_petugas" placeholder="id_petugas" id="id_petugas" required="required">
                            </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>Nama <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <textarea class='' name="nama" id="nama" placeholder="Nama" required="required" ><?= $data ['nama'] ?></textarea>
                            <?= show_error_message($validation ? $validation->getError("nama") : null); ?>
                        </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>Jenis Kelamin <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <input class='' type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" required="required" value="<?= $data ['jenis_kelamin'] ?>">
                            <?= show_error_message($validation ? $validation->getError("jenis_kelamin") : null); ?>
                        </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>Alamat <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <textarea class='' name="alamat" id="alamat" placeholder="Alamat" required="required" ><?= $data ['alamat'] ?></textarea>
                            <?= show_error_message($validation ? $validation->getError("alamat") : null); ?>
                        </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>No Telepon <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <input class='' type="text" name="no_telepon" id="no_telepon" placeholder="No Telepon" required="required" value="<?= $data ['no_telepon'] ?>">
                            <?= show_error_message($validation ? $validation->getError("no_telepon") : null); ?>
                        </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>Username <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <input class='' type="text" name="username" id="username" placeholder="Username" required="required" value="<?= $data ['username'] ?>">
                            <?= show_error_message($validation ? $validation->getError("username") : null); ?>
                        </td>
                    </tr>                    <tr>
                        <td width="25%" class="leftrowcms">
                            <label>Password <span class="highlight"></span></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                            <input class='' type="text" name="password" id="password" placeholder="Password" required="required" value="<?= $data ['password'] ?>">
                            <?= show_error_message($validation ? $validation->getError("password") : null); ?>
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
