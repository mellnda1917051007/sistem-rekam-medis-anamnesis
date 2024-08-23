<?php

include dirname(__FILE__) . "/../../../RCore/BridgeAll.php";
include dirname(__FILE__) . "/../../../RCore/BridgeView.php";

if (isset($_GET['input'])) {

    $this->extend(\Config\Setting::instance()->tmp_views());

    $this->section("halaman");

    echo "<h3> Cetak Laporan ";
    $nama_halaman;
    echo "</h3>";
?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
<?php
    action_cetak("data_rekam_medis");
    $this->endSection();
} else {

    function location()
    {
        return "cetak";
    }

    proses_action_cetak("data_rekam_medis");
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
                    <img alt="" height="100" src="<?= base_url("data/image/logo/logo.png"); ?>" width="100">
                </td>

                <td class="auto-style1">
                    <center>
                        <h2 class="auto-style1"><?php echo \App\RCore\Setting::instance()->judul; ?></h2>
                    </center>
                </td>

                <td class="auto-style1" rowspan="3" width="101">
                    <img alt="" height="100" src="<?= base_url("data/image/logo/logo.png"); ?>" width="100">
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td class="auto-style2">
                <center>
                    <strong>LAPORAN

                        <?php
                        $tabelnya = "data_rekam_medis";
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
            <td class="auto-style2"><?php echo \App\RCore\Setting::instance()->alamat; ?></td>
        </tr>
    </table>
    <!-- HEADER -->

    <!-- BODY -->
    <table width="100%" class="tblcms2">
        <tr>
            <th class="th_border cell">No</th>
            <!-- <th align="center" class="th_border cell">Id Rekam Medis</th> -->
            <th align="center" class="th_border cell">Nama Pasien</th>
            <th align="center" class="th_border cell">Obat</th>
            <th align="center" class="th_border cell">Nama Petugas</th>
            <th align="center" class="th_border cell">Status</th>

        </tr>

        <tbody>
            <?php
            $no = 0;
            foreach ($datas as $data) {
            ?>
                <tr class="event2">
                    <td align="center" width="50"><?php $no = $no + 1;
                                                    echo $no; ?></td>
                    <!-- <td align="center"><?php echo $data['id_rekam_medis']; ?></td> -->
                    <td align="center">
                        <?php
                        $data_pasien = \App\Repo\admin\DataRekamMedisRepo::get_data_pasien($data['id_pasien']);
                        if ($data_pasien) {
                            echo $data_pasien['nama_lengkap'];
                        }
                        ?>
                    </td>
                    <td align="center"><?php echo $data['obat']; ?></td>
                    <td align="center">
                        <?php
                        $data_petugas = \App\Repo\admin\DataRekamMedisRepo::get_data_petugas($data['id_petugas']);
                        if ($data_petugas) {
                            echo $data_petugas['nama'];
                        }
                        ?>
                    </td>
                    <td align="center"><?php echo $data['status']; ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- BODY -->

    <!-- FOOTER -->
    <p class="auto-style3"><?php echo \App\RCore\Setting::instance()->formatwaktu(); ?>
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting::instance()->ttd; ?></p>
    <p class="auto-style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting::instance()->siapa; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;</p>
    <p class="auto-style3"></p>

<?php } ?>