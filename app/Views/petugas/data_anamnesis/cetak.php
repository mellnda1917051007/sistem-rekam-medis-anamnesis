<?php

include dirname(__FILE__) . "/../../../RCore/BridgeAll.php";
include dirname(__FILE__) . "/../../../RCore/BridgeView.php";

if (isset($_GET['input'])) {

    $this->extend(\Config\Setting_Petugas::instance()->tmp_views());

    $this->section("halaman");

    echo "<h3> Cetak Laporan ";
    $nama_halaman;
    echo "</h3>";
?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
<?php
    action_cetak("data_anamnesis");
    $this->endSection();
} else {

    function location()
    {
        return "cetak";
    }

    proses_action_cetak("data_anamnesis");
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
                        <h2 class="auto-style1"><?php echo \App\RCore\Setting_Petugas::instance()->judul; ?></h2>
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
                        $tabelnya = "data_anamnesis";
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
            <td class="auto-style2"><?php echo \App\RCore\Setting_Petugas::instance()->alamat; ?></td>
        </tr>
    </table>
    <!-- HEADER -->

    <!-- BODY -->
    <table width="100%" class="tblcms2">
        <tr>
            <th class="th_border cell">No</th>
            <!-- <th align="center" class="th_border cell">Id Anamnesis</th> -->
            <th align="center" class="th_border cell">Keadaan Baik</th>
            <th align="center" class="th_border cell">Kesadaran</th>
            <th align="center" class="th_border cell">Refleksi Pupil Kanan</th>
            <th align="center" class="th_border cell">Refleksi Pupil Kiri</th>
            <th align="center" class="th_border cell">Tekanan Darah</th>
            <th align="center" class="th_border cell">Nadi</th>
            <th align="center" class="th_border cell">Pernapasan</th>
            <th align="center" class="th_border cell">Suhu</th>
            <th align="center" class="th_border cell">Id Rekam Medis</th>

        </tr>

        <tbody>
            <?php
            $no = 0;
            foreach ($datas as $data) {
            ?>
                <tr class="event2">
                    <td align="center" width="50"><?php $no = $no + 1;
                                                    echo $no; ?></td>
                    <!-- <td align="center"><?php echo $data['id_anamnesis']; ?></td> -->
                    <td align="center"><?php echo $data['keadaan_baik']; ?></td>
                    <td align="center"><?php echo $data['kesadaran']; ?></td>
                    <td align="center"><?php echo $data['refleksi_pupil_kanan']; ?></td>
                    <td align="center"><?php echo $data['refleksi_pupil_kiri']; ?></td>
                    <td align="center"><?php echo $data['tekanan_darah']; ?></td>
                    <td align="center"><?php echo $data['nadi']; ?></td>
                    <td align="center"><?php echo $data['pernapasan']; ?></td>
                    <td align="center"><?php echo $data['suhu']; ?></td>
                    <td align="center">
                        <?php echo $data['id_rekam_medis']; ?>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- BODY -->

    <!-- FOOTER -->
    <p class="auto-style3"><?php echo \App\RCore\Setting_Petugas::instance()->formatwaktu(); ?>
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting_Petugas::instance()->ttd; ?></p>
    <p class="auto-style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="auto-style3"><?php echo \App\RCore\Setting_Petugas::instance()->siapa; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;</p>
    <p class="auto-style3"></p>

<?php } ?>