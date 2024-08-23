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
                    <td class="clleft" width="25%">Id Berita Acara</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_berita_acara']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">File</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['file']; ?></td>
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