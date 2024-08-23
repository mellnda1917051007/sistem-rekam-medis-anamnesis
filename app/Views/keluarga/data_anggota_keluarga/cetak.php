<?php

include dirname(__FILE__) . "/../../../RCore/BridgeAll.php";
include dirname(__FILE__) . "/../../../RCore/BridgeView.php";

if (isset($_GET['input'])) {

    $this->extend(\Config\Setting_Keluarga::instance()->tmp_views());

    $this->section("halaman");

    echo "<h3> Cetak Laporan ";
    $nama_halaman;
    echo "</h3>";
?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
<?php
    action_cetak("data_anggota_keluarga");
    $this->endSection();
} else {

    function location()
    {
        return "cetak";
    }

    proses_action_cetak("data_anggota_keluarga");
?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">


    <!-- HEADER -->
    <table border="0" style="width: 100%">
        <?php
        if (isset($_GET['export'])) {
        } else {
        ?>
            <tr>
                <td class="auto-style1" rowspan="3" width="101">
                    <img alt="" height="100" src="<?php echo \App\RCore\Setting_Keluarga::instance()->logo_laporan1; ?>" width="100">
                </td>

                <td class="auto-style1">
                    <center>
                        <h2 class="auto-style1"><?php echo \App\RCore\Setting_Keluarga::instance()->judul; ?></h2>
                    </center>
                </td>

                <td class="auto-style1" rowspan="3" width="101">
                    <img alt="" height="100" src="<?php echo \App\RCore\Setting_Keluarga::instance()->logo_laporan2; ?>" width="100">
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td class="auto-style2">
                <center>
                    <strong>LAPORAN

                        <?php
                        $tabelnya = "data_anggota_keluarga";
                        $tabelnya = str_replace("_", " ", $tabelnya);
                        $tabelnya = str_replace("data", "", $tabelnya);
                        $tabelnya = strtoupper($tabelnya);
                        echo $tabelnya;
                        ?>

                    </strong>
                </center>
            </td>
        </tr>

        <tr>
            <td class="auto-style2"><?php echo \App\RCore\Setting_Keluarga::instance()->alamat; ?></td>
        </tr>
    </table>
    <!-- HEADER -->

    <!-- BODY -->
    <table width="100%" class="tblcms2">
        <tr>
            <th class="th_border cell">No</th>
            <!-- <th align="center" class="th_border cell">Id Anggota Keluarga</th> -->
            <th align="center" class="th_border cell">Id Petugas</th>
            <th align="center" class="th_border cell">Nama</th>
            <th align="center" class="th_border cell">Alamat</th>
            <th align="center" class="th_border cell">No Telepon</th>
            <th align="center" class="th_border cell">Username</th>
            <th align="center" class="th_border cell">Password</th>

        </tr>

        <tbody>
            <?php
            $no = 0;
            foreach ($datas as $data) {
            ?>
                <tr class="event2">
                    <td align="center" width="50"><?php $no = $no + 1;
                                                    echo $no; ?></td>
                    <!-- <td align="center"><?php echo $data['id_anggota_keluarga']; ?></td> -->
                    <td align="center">
                        <?php
                        $data_pasien = \App\Repo\admin\DataAnggotaKeluargaRepo::get_data_pasien($data['id_pasien']);
                        if ($data_pasien) {
                            echo $data_pasien['id_petugas'];
                        }
                        ?>
                    </td>
                    <td align="center"><?php echo $data['nama']; ?></td>
                    <td align="center"><?php echo $data['alamat']; ?></td>
                    <td align="center"><?php echo $data['no_telepon']; ?></td>
                    <td align="center"><?php echo $data['username']; ?></td>
                    <td align="center"><?php echo $data['password']; ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- BODY -->

    <!-- FOOTER -->
    <p class="auto-style3"><?php echo \App\RCore\Setting_Keluarga::instance()->formatwaktu(); ?>
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting_Keluarga::instance()->ttd; ?></p>
    <p class="auto-style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting_Keluarga::instance()->siapa; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;</p>
    <p class="auto-style3"></p>

<?php } ?>