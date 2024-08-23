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
                        <h2>Profil</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">


                <br>
                <br>
                <center>
                    <h2>
                        PROFIL
                    </h2>
                </center>
                <br>
                <br>
                <?php
                if ($data) {
                    ?>
                    <div class="main-textgrids">
                        <div class="container">
                            <div class="col-md-5 ab-pic">
                                <img src="<?= base_url('uploads/' . $data['gambar']) ?>" width="100%" alt=" ">
                            </div>
                            <div class="col-md-7 ab-text">
                                <h4><?= $data['nama'] ?></h4>
                                <p></p>
                                <p>WA : <?= $data['no_telepon'] ?></p>
                                <p></p>

                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>
                    <?php
                } else {
                    echo "data profil belum dinpukan.";
                }
                ?>

                <br>
                <br>

                <!--
           <div class="container">
               <div class="col-md-12">
               <center>
                   <img onerror="this.src='home/data/image/error/error.png'" src="admin/upload/1639453587-33656-FB_IMG_1635824200819.jpg" width="500">

                       <h2>BERINAZA PELAMINAN            </h2>
                   </center>
                   <table width='100%' border='0' align='center' class='table'>
                       <tbody>

                           <tr>
                               <td class="clleft" width="25%">no&nbsp;telepon</td>
                               <td class="clleft" width="2%">:</td>
                               <td class="clleft">2147483647</td>
                           </tr>
                           <tr>
                               <td class="clleft" width="25%">email</td>
                               <td class="clleft" width="2%">:</td>
                               <td class="clleft">berinaza.pelaminan@g</td>
                           </tr>
                           <tr>
                               <td class="clleft" width="25%">alamat</td>
                               <td class="clleft" width="2%">:</td>
                               <td class="clleft">Jambi</td>
                           </tr>
                           <tr>
                               <td class="clleft" width="25%">deskripsi</td>
                               <td class="clleft" width="2%">:</td>
                               <td class="clleft"><p>FB : berinaza pelaminan</p>
           </td>
                           </tr>
                       </tbody>
                   </table>
               </div>

               <div class="col-md-4"></div>
           </div>
           --> <h2>&nbsp;</h2>

            </div>
        </div>

    </section>

<?php

$this->endSection();