<?php

function id_otomatis($nama_tabel, $id_nama_tabel, $panjang_id)
{
    //    $db = db_connect();
    // $cek = mysql_query("SELECT * FROM $nama_tabel");
    // $rowcek = mysql_num_rows($cek);
    $kodedepan = strtoupper($nama_tabel);
    $kodedepan = str_replace("DATA_", "", $kodedepan);
    $kodedepan = str_replace("DATA", "", $kodedepan);
    $kodedepan = str_replace("TABEL_", "", $kodedepan);
    $kodedepan = str_replace("TABEL", "", $kodedepan);
    $kodedepan = str_replace("TABLE_", "", $kodedepan);
    $kodedepan = strtoupper(substr($kodedepan, 0, 3));
    $id_tabel_otomatis = $kodedepan . date('YmdHis');
    $min = pow($panjang_id, 3 - 1);
    $max = pow($panjang_id, 3) - 1;

    $kodeakhir = mt_rand($min, $max);
    return $id_tabel_otomatis . $kodeakhir;
}

//PROSES ACTION CETAK
function proses_action_cetak($tabel)
{
    $status = "";
    if (isset($_GET['preview'])) {
        $status = "preview";
    } else if (isset($_GET['cetak'])) {
        $status = "cetak";
?>
        <script>
            window.print();
        </script>
    <?php
    } else if (isset($_GET['export'])) {
        $status = "export";
        header("Content-Type: application/force-download");
        header("Cache-Control: no-cache, must-revalidate");
        header("content-disposition: attachment;filename=laporan_$tabel" . date('dmY') . ".xls");
    }
}

function action_cetak($tabel)
{
    ?>

    <form name="formcari" id="formcari" action="cetak" method="get" target="_blank">
        <fieldset>
            <table>
                <tbody>
                    <tr>
                        <td><b>CETAK KESELURUHAN</b></td>

                        <td></td>
                    </tr>


                    <tr>
                        <td style="width:40%"></td>

                        <td>
                            <?php btn_preview_laporan('Print Preview'); ?>
                            <?php btn_cetak_laporan('Print'); ?>
                            <?php btn_export_laporan('Export Excel'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <br>
    <form name="formcari" id="formcari" action="cetak" method="get" target="_blank">
        <fieldset>
            <table>
                <tbody>
                    <tr>
                        <td><b>CETAK DENGAN FILTER</b></td>

                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:40%">Berdasarkan :</td>

                        <td>
                            <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                <?php
                                $sql = "desc $tabel";
                                $db = db_connect();
                                $result = $db->query($sql)->getResultArray();
                                foreach ($result as $row) {
                                    echo "<option name='berdasarkan' value=$row[Field]>$row[Field]</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="width:40%">Pencarian :</td>

                        <td>
                            <input class="form-control" type="text" name="isi" value="">
                        </td>
                    </tr>

                    <tr>
                        <td></td>

                        <td>
                            <?php btn_preview_laporan('Print Preview'); ?>
                            <?php btn_cetak_laporan('Print'); ?>
                            <?php btn_export_laporan('Export Excel'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>
    </form>
    <br>
    <?php
    $ada = 0;
    $sql = "desc $tabel";
    $db = db_connect();
    $result = $db->query($sql)->getResultArray();
    foreach ($result as $row) {
        $typedata = $row['Type'];
        $kalimat = $typedata;
        if (preg_match("/date/i", $kalimat)) {
            $ada = $ada + 1;
        }
    }

    if ($ada > 0) {
    ?>

        <form name="formcari" id="formcari" action="cetak" method="get" target="_blank">
            <fieldset>
                <table>
                    <tbody>
                        <tr>
                            <td><b>CETAK PERPERIODE</b></td>

                            <td></td>
                        </tr>
                        <tr>
                            <td style="width:40%">Berdasarkan :</td>

                            <td>
                                <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                    <?php
                                    $sql = "desc $tabel";
                                    $db = db_connect();
                                    $result = $db->query($sql)->getResultArray();
                                    foreach ($result as $row) {
                                        $typedata = $row['Type'];

                                        $kalimat = $typedata;
                                        if (preg_match("/date/i", $kalimat)) {

                                            echo "<option name='berdasarkan' value=$row[Field]>$row[Field]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td style="width:40%">Dari Tanggal :</b></td>

                            <td><input type="date" name="tanggal1"></td>
                        </tr>

                        <tr>
                            <td style="width:40%">Sampai Tanggal :</b></td>

                            <td><input type="date" name="tanggal2"></td>
                        </tr>


                        <tr>
                            <td></td>

                            <td>
                                <?php btn_preview_laporan('Print Preview'); ?>
                                <?php btn_cetak_laporan('Print'); ?>
                                <?php btn_export_laporan('Export Excel'); ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
        </form>


    <?php
    }
}


function btn_tambah($namatombol)
{
    echo "<button class='btn btn-primary' ><i class='fa fa-plus-square'></i> " . $namatombol . "</button>";
};

function btn_preview_laporan($namatombol)
{
    echo "<button class='btn btn-info' name='preview'><i class='fa fa-info'></i> " . $namatombol . "</button>";
};

function btn_export_laporan($namatombol)
{
    echo "<button class='btn btn-danger' name='export'><i class='fa fa-file-excel-o'></i> " . $namatombol . "</button>";
};

function btn_grafik_laporan($namatombol)
{
    echo "<button class='btn btn-danger' name='grafik'><i class='fa fa-graphic'></i> " . $namatombol . "</button>";
};

function btn_cetak_laporan($namatombol)
{
    echo "<button class='btn btn-warning' name='cetak'><i class='fa fa-print'></i> " . $namatombol . "</button>";
};

function btn_export($namatombol)
{ //echo "<button class='btn btn-primary' ><i class='fa fa-file-excel-o'></i> ".$namatombol."</button>";
};

function btn_cetak($namatombol)
{ //echo "<button class='btn btn-primary' ><i class='fa fa-print'></i> ".$namatombol."</button>";
};

function btn_refresh($namatombol)
{
    echo "<button class='btn btn-primary' ><i class='fa fa-refresh'></i> " . $namatombol . "</button>";
};

function btn_cari($namatombol)
{
    echo "<button class='btn btn-success' ><i class='fa fa-search'></i> " . $namatombol . "</button>";
};

function btn_detail($namatombol)
{
    echo "<button class='btn btn-info btn-xs' ><i class='fa fa-info'></i> " . $namatombol . "</button>";
};

function btn_edit($namatombol)
{
    echo "<button class='btn btn-warning btn-xs' ><i class='fa fa-edit'></i> " . $namatombol . "</button>";
};

function btn_hapus($namatombol)
{
    echo "<button class='btn btn-danger btn-xs' ><i class='fa fa-remove'></i> " . $namatombol . "</button>";
};

function btn_pagination($namatombol)
{
    echo "<button class='btn btn-info btn-xs' >" . $namatombol . "</button>";
};

function btn_ya($namatombol)
{
    echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>" . $namatombol . "</button>";
};

function btn_tidak($namatombol)
{
    echo "<button class='btn btn-danger btn-xs' ><i class='fa fa-remove'></i>" . $namatombol . "</button>";
};

function btn_kembali($namatombol)
{
    echo "<button class='btn btn-primary' ><i class='fa fa-backward'></i>" . $namatombol . "</button>";
};

function btn_simpan($namatombol)
{
    echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>" . $namatombol . "</button>";
};

function btn_update($namatombol)
{
    echo "<button class='btn btn-success btn-xs' ><i class='fa fa-check'></i>" . $namatombol . "</button>";
};


//TABEL
// function tabel($width, $satuan, $border = 0, $align)
// {
//     echo "width='" . $width . $satuan . "' border='" . $border . "' align='" . $align . "' class='table table-hover'";
// };

function tabel($width, $satuan, $align, $border = 0)
{
    echo "width='" . $width . $satuan . "' border='" . $border . "' align='" . $align . "' class='table table-hover'";
}


function tabel_in($width, $satuan, $border, $align)
{
    echo "width='" . $width . $satuan . "' border='" . $border . "' align='" . $align . "' class='table'";
};

function encrypt($value)
{
    return $value;
}


function combo_enum($tabel, $field, $query)
{
    $database = config('database')->default['database'];
    $db = db_connect();
    $result = $db->query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = '$tabel' AND COLUMN_NAME = '$field'");
    $row = $result->getRowArray();
    $enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE']) - 6))));

    $selectDropdown = "";
    foreach ($enumList as $value) {
        $selectDropdown .= "<option>$value</option>";
    }
    return $selectDropdown;
}


function tanggal_otomatis()
{
    $tanggal = date("Y-m-d");
    echo $tanggal;
}

function decrypt($value)
{
    return $value;
}

function show_error_message($error = null)
{
    if ($error) {
    ?>
        <span class="bg-error"><?= $error ?></span>
    <?php
    }
}

function combo_database2($tabel, $field1, $field2, $query)
{
    $db = db_connect();
    if ($query != null) {
        $result = $db->query($query)->getResultArray();
    } else {
        $result = $db->query("SELECT * FROM $tabel")->getResultArray();
    }
    foreach ($result as $data) {
    ?>
        <option value="<?php echo $data["$field1"] ?>"><?php echo $data["$field1"] . " ( " . $data["$field2"] . ")" ?></option>';
<?php
    }
}


function tanggal_indo($tanggal)
{
    return $tanggal;
}

function format_rupiah($val)
{
    return $val;
}

class HomeAuth
{
    static function check()
    {
        return session()->get('home_logged_in');
    }

    static function id()
    {
        return session()->get('home_id');
    }
}

function baca_database($tabel, $field, $query)
{
    $db = db_connect();

    if ($query != null) {
        $result = $db->query($query)->getResultArray();
    } else {
        $result = $db->query("SELECT * FROM $tabel")->getResultArray();
    }

    foreach ($result as $data) {
        return $data["$field"];
    }
}
