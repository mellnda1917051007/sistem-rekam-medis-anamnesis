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
                    <td class="clleft" width="25%">Id Pembayaran</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['id_pembayaran']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Id Rekam Medis</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft">
                        <?php echo $data['id_rekam_medis']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Nama Biaya</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['nama_biaya']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Harga</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['harga']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Total</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['total']; ?></td>
                </tr>
                <tr>
                    <td class="clleft" width="25%">Status</td>
                    <td class="clleft" width="2%">:</td>
                    <td class="clleft"><?php echo $data['status']; ?></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php
$this->endSection();
?>