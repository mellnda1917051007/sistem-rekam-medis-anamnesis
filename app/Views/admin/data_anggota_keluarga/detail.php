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
    <td class="clleft" width="25%">Id Anggota Keluarga</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['id_anggota_keluarga']; ?></td>
</tr>
<tr>
    <td class="clleft" width="25%">Id Pasien</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft">
    <?php
    $data_pasien = \App\Repo\admin\DataAnggotaKeluargaRepo::get_data_pasien($data['id_pasien']);
    if ($data_pasien) {
        echo $data_pasien['nama_lengkap'];
    }
    ?>
    </td>
</tr>
<tr>
    <td class="clleft" width="25%">Nama</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['nama']; ?></td>
</tr>
<tr>
    <td class="clleft" width="25%">Alamat</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['alamat']; ?></td>
</tr>
<tr>
    <td class="clleft" width="25%">No Telepon</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['no_telepon']; ?></td>
</tr>
<tr>
    <td class="clleft" width="25%">Username</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['username']; ?></td>
</tr>
<tr>
    <td class="clleft" width="25%">Password</td>
    <td class="clleft" width="2%">:</td>
    <td class="clleft"><?php echo $data['password']; ?></td>
</tr>

            </tbody>
        </table>
    </div>
</div>
<?php 
$this->endSection();
?>
