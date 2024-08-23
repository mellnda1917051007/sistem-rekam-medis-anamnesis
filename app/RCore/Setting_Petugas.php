<?php

namespace App\RCore;

$file = dirname(__FILE__) . "/settings_petugas.xml";
$read = simplexml_load_file($file);
$exe = new \SimpleXMLElement($read->asXML());
$rows = count($exe);

class Setting_Petugas
{
    private $datas = [];

    static $instance = null;

    public function __construct($datas)
    {
        $this->datas = $datas;
        foreach ($datas as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function __call($property, $args)
    {
        if (array_key_exists($property, $this->datas)) {
            if (is_array($this->datas[$property])) {
                return new self($this->datas[$property]);
            }
            return $this->datas[$property];
        }
        return null;
    }


    public static function set_data($datas)
    {
        if (self::$instance) {
            return self::$instance;
        }
        self::$instance = new self($datas);
        return self::$instance;
    }

    /**
     * @return Setting_Petugas
     */
    public static function instance()
    {
        return self::$instance ? self::$instance : new self([]);
    }

    public function get_sambutan()
    {
        $sambutan = str_replace('br', '<br>', $this->sambutan);
        $sambutan = str_replace('siapa', $this->siapa, $this->sambutan);
        $sambutan = str_replace('judul', $this->judul, $this->sambutan);
        return $sambutan;
    }

    public function file_menu_xml()
    {
        $file = dirname(__FILE__) . "/menu_petugas.xml";
        return new \SimpleXMLElement($file, 0, true);
    }

    public function get_lokasi_lg()
    {
        return base_url("") . "/data/tmp/" . Setting_Petugas::instance()->lg . "/file";
    }

    public function get_lokasi_tmp()
    {
        return base_url("") . "/data/tmp/" . Setting_Petugas::instance()->tmp . "/file/";
    }

    public function get_avatar()
    {
        $avatar = str_replace("../../../", "", $this->avatar);
        return base_url("") . "/" . $avatar;
    }

    public function formatwaktu()
    {
        $array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
        $hari = $array_hari[date("N")];
        $tanggal = date("j");
        $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $bulan = $array_bulan[date("n")];
        $tahun = date("Y");
        return $this->wilayah . ", " . $hari . " " . $tanggal . " " . $bulan . " " . $tahun;
    }

    public function sambutan()
    {
        $sambutan = str_replace('br', '<br>', $this->sambutan);
        $sambutan = str_replace('siapa', '', $sambutan);
        $sambutan = str_replace('judul', $this->judul, $sambutan);
        echo $sambutan;
    }
}

for ($i = 0; $i < $rows; $i++) {

    // if ($exe->users[$i]->id == '1') {

    //     // Meta
    //     $charset = $exe->users[$i]->charset;
    //     $keywords = decryptIt($exe->users[$i]->keywords);
    //     $description = decryptIt($exe->users[$i]->description);
    //     $Author = decryptIt($exe->users[$i]->Author);
    //     $icon = $exe->users[$i]->icon;
    //     $situs = decryptIt($exe->users[$i]->situs);

    //     // Settings Aplikasi
    //     $logo = $exe->users[$i]->logo;
    //     $imageerror = $exe->users[$i]->imageerror;
    //     $avatar = $exe->users[$i]->avatar;
    //     $background = $exe->users[$i]->background;
    //     $bg_login = $exe->users[$i]->bg_login;

    //     $slide1 = $exe->users[$i]->slide1;
    //     $slide2 = $exe->users[$i]->slide2;
    //     $slide3 = $exe->users[$i]->slide3;

    //     $judul = $exe->users[$i]->judul;
    //     $objek = $exe->users[$i]->objek;
    //     $alamat = $exe->users[$i]->alamat;
    //     $telepon = $exe->users[$i]->telepon;
    //     $email = $exe->users[$i]->email;

    //     $facebook = $exe->users[$i]->facebook;
    //     $google = $exe->users[$i]->google;
    //     $twitter = $exe->users[$i]->twitter;
    //     $instagram = $exe->users[$i]->instagram;
    //     $linkedin = $exe->users[$i]->linkedin;
    //     $youtube = $exe->users[$i]->youtube;
    //     $maps_x = $exe->users[$i]->maps_x;
    //     $maps_y = $exe->users[$i]->maps_y;

    //     $nama_aplikasi = $exe->users[$i]->nama_aplikasi;
    //     $keterangan_aplikasi = $exe->users[$i]->keterangan_aplikasi;
    //     $tahun =  $exe->users[$i]->tahun;
    //     $copyright =  $exe->users[$i]->copyright;
    //     $c_siapa =  $exe->users[$i]->c_siapa;
    //     if (empty($_COOKIE["$c_siapa"])) {
    //         $siapa = $exe->users[$i]->siapa;
    //     } else {
    //         $siapa = decrypt($_COOKIE["$c_siapa"]);
    //     }
    //     $sambutan = str_replace('br', '<br>', $exe->users[$i]->sambutan);
    //     $sambutan = str_replace('siapa', $siapa, $sambutan);
    //     $sambutan = str_replace('judul', $judul, $sambutan);

    //     //Setting_Petugas Tampilan
    //     $meta_head = $exe->users[$i]->meta_head;
    //     $combosearch = $exe->users[$i]->combosearch;
    //     $grafik = $exe->users[$i]->grafik;
    //     $kata_sambutan = $exe->users[$i]->kata_sambutan;
    //     $gambar_background = $exe->users[$i]->gambar_background;
    //     $menu_setting = $exe->users[$i]->menu_setting;
    //     $menu_admin = $exe->users[$i]->menu_admin;
    //     $ckeditor = $exe->users[$i]->ckeditor;
    //     $popup = $exe->users[$i]->popup;
    //     $seo = $exe->users[$i]->seo;
    //     $ekstensi_dilarang    = array($exe->users[$i]->ekstensi_dilarang);
    //     $class = $exe->users[$i]->classe;

    //     //setting laporan
    //     $logo_laporan1 = $exe->users[$i]->logo_laporan1;
    //     $logo_laporan2 = $exe->users[$i]->logo_laporan2;
    //     $ttd = $exe->users[$i]->ttd . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
    //     $array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
    //     $hari = $array_hari[date("N")];
    //     $tanggal = date("j");
    //     $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    //     $bulan = $array_bulan[date("n")];
    //     $tahun = date("Y");
    //     $formatwaktu = $exe->users[$i]->wilayah . ", " . $hari . " " . $tanggal . " " . $bulan . " " . $tahun;

    //     //login	
    //     $tabel_login = $exe->users[$i]->tabel_login;
    //     $field_username_login = $exe->users[$i]->field_username_login;
    //     $field_password_login = $exe->users[$i]->field_password_login;
    //     $pesan_gagal = $exe->users[$i]->pesan_gagal;
    //     $url_desain = $exe->users[$i]->url_desain;
    // }

    if ($exe->users[$i]->id == '1') {
        $datas = [];
        foreach ($exe->users[$i] as $key => $value) {
            $datas[$key] = $value->__toString();
        }
        Setting_Petugas::set_data($datas);
    }
}

function sambutan()
{
    global $sambutan;
    echo $sambutan;
};

function index()
{
    global $url_index;
    $url_index = "index.php";
    echo $url_index;
};

function admin()
{
    global $url_admin;
    $url_admin = "app";
    echo $url_admin;
};

function home()
{
    echo "../home/index.php";
};

function logout()
{
    echo "../../../login/logout.php";
};

function go_index_halaman()
{
?>
    <script>
        location.href = "index.php";
    </script>
<?php
};

?>