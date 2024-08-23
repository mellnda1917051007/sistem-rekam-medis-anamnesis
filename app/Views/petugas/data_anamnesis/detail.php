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
    <div class="content-box-header" style="height: 39px">Detail
        <h3 style="cursor: s-resize;"></h3>
    </div>
    <div class="content-box-content">
        <table <?php tabel_in(100, '%', 0, 'center');  ?>>
            <tbody>
                <tr class="event3">
                    <td class="clleft" colspan="3">
                        Detail data&nbsp;admin
                    </td>
                </tr>
                <?php

                if (!isset($_GET['proses'])) { ?>
                    <script>
                        alert("AKSES DITOLAK");
                        location.href = "index.php";
                    </script>
                <?php
                    die();
                }
                ?>
                <tr>
                    <td class="clleft" width="25%">Id Anamnesis</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_anamnesis']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Keadaan Baik</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['keadaan_baik']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Kesadaran</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['kesadaran']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Refleksi Pupil Kanan</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['refleksi_pupil_kanan']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Refleksi Pupil Kiri</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['refleksi_pupil_kiri']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Tekanan Darah</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['tekanan_darah']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Nadi</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['nadi']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Pernapasan</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['pernapasan']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Suhu</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['suhu']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Id Rekam Medis</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft">
                        <?php echo $data['id_rekam_medis']; ?>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php
$this->endSection();
?>