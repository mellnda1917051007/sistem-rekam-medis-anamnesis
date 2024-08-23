<?php
$this->extend('home/app.php');

$this->section("halaman");
?>
    <section id="page-banner" class="single-slider bg_cover pt-150"
             style="background-image: url(home/data/image/background/slide_a.png)" data-overlay="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Daftar</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Daftar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-part" class="pt-25">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <h4 class="font-weight-bold">
                        Form Pendaftaran
                    </h4>
                    <hr>
                    <style>
                        td {
                            padding: 5px;
                        }
                    </style>
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="content-box-content">
                            <div id="postcustom">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Id Pelanggan <span class="highlight">*</span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class="form-control" type="readonly" readonly
                                                   value="<?php echo id_otomatis("data_pelanggan", "id_pelanggan", "10"); ?>"
                                                   name="id_pelanggan" placeholder="id_pelanggan" id="id_pelanggan"
                                                   required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Nama Pelanggan <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class='form-control' type="text" name="nama_pelanggan"
                                                   id="nama_pelanggan"
                                                   placeholder="Nama Pelanggan" required="required"
                                                   value="<?= set_value('nama_pelanggan') ?>">
                                            <?= show_error_message($validation ? $validation->getError("nama_pelanggan") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Alamat <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <textarea class='form-control' name="alamat" id="alamat"
                                                      placeholder="Alamat"
                                                      required="required" value="<?= set_value('alamat') ?>"></textarea>
                                            <?= show_error_message($validation ? $validation->getError("alamat") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Jenis Kelamin <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <select class='form-control' name="jenis_kelamin" id="jenis_kelamin">
                                                <?= combo_enum('data_pelanggan', 'jenis_kelamin', '') ?>
                                            </select>
                                            <?= show_error_message($validation ? $validation->getError("jenis_kelamin") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>No Telepon <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class='form-control' type="text" name="no_telepon" id="no_telepon"
                                                   placeholder="No Telepon" required="required"
                                                   value="<?= set_value('no_telepon') ?>">
                                            <?= show_error_message($validation ? $validation->getError("no_telepon") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Email <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class='form-control' type="text" name="email" id="email"
                                                   placeholder="Email"
                                                   required="required" value="<?= set_value('email') ?>">
                                            <?= show_error_message($validation ? $validation->getError("email") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Username <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class='form-control' type="text" name="username" id="username"
                                                   placeholder="Username" required="required"
                                                   value="<?= set_value('username') ?>">
                                            <?= show_error_message($validation ? $validation->getError("username") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%" class="leftrowcms">
                                            <label>Password <span class="highlight"></span></label>
                                        </td>
                                        <td width="2%">:</td>
                                        <td>
                                            <input class='form-control' type="text" name="password" id="password"
                                                   placeholder="Password" required="required"
                                                   value="<?= set_value('password') ?>">
                                            <?= show_error_message($validation ? $validation->getError("password") : null); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <?php btn_simpan(' SIMPAN'); ?>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php

$this->endSection();