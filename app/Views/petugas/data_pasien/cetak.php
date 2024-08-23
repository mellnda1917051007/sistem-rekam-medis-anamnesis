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
    action_cetak("data_pasien");
    $this->endSection();
} else {

    function location()
    {
        return "cetak";
    }

    proses_action_cetak("data_pasien");
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
                    <img alt="" height="100" src="<?php echo \App\RCore\Setting_Petugas::instance()->logo_laporan1; ?>" width="100">
                </td>

                <td class="auto-style1">
                    <center>
                        <h2 class="auto-style1"><?php echo \App\RCore\Setting_Petugas::instance()->judul; ?></h2>
                    </center>
                </td>

                <td class="auto-style1" rowspan="3" width="101">
                    <img alt="" height="100" src="<?php echo \App\RCore\Setting_Petugas::instance()->logo_laporan2; ?>" width="100">
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td class="auto-style2">
                <center>
                    <strong>LAPORAN

                        <?php
                        $tabelnya = "data_pasien";
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
            <!-- <th align="center" class="th_border cell">Id Pasien</th> -->
            <th align="center" class="th_border cell">Nama</th>
            <th align="center" class="th_border cell">Nama Lengkap</th>
            <th align="center" class="th_border cell">Jenis Kelamin</th>
            <th align="center" class="th_border cell">Tanggal Masuk</th>
            <th align="center" class="th_border cell">Diagnosa Kejiwaan</th>
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
                    <!-- <td align="center"><?php echo $data['id_pasien']; ?></td> -->
                    <td align="center">
                        <?php
                        $data_petugas = \App\Repo\admin\DataPasienRepo::get_data_petugas($data['id_petugas']);
                        if ($data_petugas) {
                            echo $data_petugas['nama'];
                        }
                        ?>
                    </td>
                    <td align="center"><?php echo $data['nama_lengkap']; ?></td>
                    <td align="center"><?php echo $data['jenis_kelamin']; ?></td>
                    <td align="center"><?php echo tanggal_indo($data['tanggal_masuk']); ?></td>
                    <td align="center"><?php echo $data['diagnosa_kejiwaan']; ?></td>
                    <td align="center"><?php echo $data['status']; ?></td>

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