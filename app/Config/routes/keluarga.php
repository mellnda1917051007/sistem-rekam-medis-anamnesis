
<?php
$routes->group('keluarga', static function ($routes) {
    $routes->get('data_admin', 'keluarga\DataAdmin::index', ['as' => 'keluarga.data_admin']);
    $routes->match(['post', 'get'], 'data_admin/tambah', 'keluarga\DataAdmin::tambah', ['as' => 'keluarga.data_admin.tambah']);
    $routes->match(['post', 'get'], 'data_admin/edit', 'keluarga\DataAdmin::edit', ['as' => 'keluarga.data_admin.edit']);
    $routes->get('data_admin/hapus/(:any)', 'keluarga\DataAdmin::hapus/$1', ['as' => 'keluarga.data_admin.hapus']);
    $routes->get('data_admin/detail', 'keluarga\DataAdmin::detail', ['as' => 'keluarga.data_admin.detail']);
    $routes->get('data_admin/cetak', 'keluarga\DataAdmin::cetak', ['as' => 'keluarga.data_admin.cetak']);

    $routes->get('data_anamnesis', 'keluarga\DataAnamnesis::index', ['as' => 'keluarga.data_anamnesis']);
    $routes->match(['post', 'get'], 'data_anamnesis/tambah', 'keluarga\DataAnamnesis::tambah', ['as' => 'keluarga.data_anamnesis.tambah']);
    $routes->match(['post', 'get'], 'data_anamnesis/edit', 'keluarga\DataAnamnesis::edit', ['as' => 'keluarga.data_anamnesis.edit']);
    $routes->get('data_anamnesis/hapus/(:any)', 'keluarga\DataAnamnesis::hapus/$1', ['as' => 'keluarga.data_anamnesis.hapus']);
    $routes->get('data_anamnesis/detail', 'keluarga\DataAnamnesis::detail', ['as' => 'keluarga.data_anamnesis.detail']);
    $routes->get('data_anamnesis/cetak', 'keluarga\DataAnamnesis::cetak', ['as' => 'keluarga.data_anamnesis.cetak']);

    $routes->get('data_anggota_keluarga', 'keluarga\DataAnggotaKeluarga::index', ['as' => 'keluarga.data_anggota_keluarga']);
    $routes->match(['post', 'get'], 'data_anggota_keluarga/tambah', 'keluarga\DataAnggotaKeluarga::tambah', ['as' => 'keluarga.data_anggota_keluarga.tambah']);
    $routes->match(['post', 'get'], 'data_anggota_keluarga/edit', 'keluarga\DataAnggotaKeluarga::edit', ['as' => 'keluarga.data_anggota_keluarga.edit']);
    $routes->get('data_anggota_keluarga/hapus/(:any)', 'keluarga\DataAnggotaKeluarga::hapus/$1', ['as' => 'keluarga.data_anggota_keluarga.hapus']);
    $routes->get('data_anggota_keluarga/detail', 'keluarga\DataAnggotaKeluarga::detail', ['as' => 'keluarga.data_anggota_keluarga.detail']);
    $routes->get('data_anggota_keluarga/cetak', 'keluarga\DataAnggotaKeluarga::cetak', ['as' => 'keluarga.data_anggota_keluarga.cetak']);

    $routes->get('data_berita_acara', 'keluarga\DataBeritaAcara::index', ['as' => 'keluarga.data_berita_acara']);
    $routes->match(['post', 'get'], 'data_berita_acara/tambah', 'keluarga\DataBeritaAcara::tambah', ['as' => 'keluarga.data_berita_acara.tambah']);
    $routes->match(['post', 'get'], 'data_berita_acara/edit', 'keluarga\DataBeritaAcara::edit', ['as' => 'keluarga.data_berita_acara.edit']);
    $routes->get('data_berita_acara/hapus/(:any)', 'keluarga\DataBeritaAcara::hapus/$1', ['as' => 'keluarga.data_berita_acara.hapus']);
    $routes->get('data_berita_acara/detail', 'keluarga\DataBeritaAcara::detail', ['as' => 'keluarga.data_berita_acara.detail']);
    $routes->get('data_berita_acara/cetak', 'keluarga\DataBeritaAcara::cetak', ['as' => 'keluarga.data_berita_acara.cetak']);

    $routes->get('data_berita_acara_pengiriman_penderita_pulang', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::index', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang']);
    $routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/tambah', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::tambah', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang.tambah']);
    $routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/edit', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::edit', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang.edit']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/hapus/(:any)', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::hapus/$1', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang.hapus']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/detail', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::detail', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang.detail']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/cetak', 'keluarga\DataBeritaAcaraPengirimanPenderitaPulang::cetak', ['as' => 'keluarga.data_berita_acara_pengiriman_penderita_pulang.cetak']);

    $routes->get('data_pasien', 'keluarga\DataPasien::index', ['as' => 'keluarga.data_pasien']);
    $routes->match(['post', 'get'], 'data_pasien/tambah', 'keluarga\DataPasien::tambah', ['as' => 'keluarga.data_pasien.tambah']);
    $routes->match(['post', 'get'], 'data_pasien/edit', 'keluarga\DataPasien::edit', ['as' => 'keluarga.data_pasien.edit']);
    $routes->get('data_pasien/hapus/(:any)', 'keluarga\DataPasien::hapus/$1', ['as' => 'keluarga.data_pasien.hapus']);
    $routes->get('data_pasien/detail', 'keluarga\DataPasien::detail', ['as' => 'keluarga.data_pasien.detail']);
    $routes->get('data_pasien/cetak', 'keluarga\DataPasien::cetak', ['as' => 'keluarga.data_pasien.cetak']);

    $routes->get('data_pembayaran', 'keluarga\DataPembayaran::index', ['as' => 'keluarga.data_pembayaran']);
    $routes->match(['post', 'get'], 'data_pembayaran/tambah', 'keluarga\DataPembayaran::tambah', ['as' => 'keluarga.data_pembayaran.tambah']);
    $routes->match(['post', 'get'], 'data_pembayaran/edit', 'keluarga\DataPembayaran::edit', ['as' => 'keluarga.data_pembayaran.edit']);
    $routes->get('data_pembayaran/hapus/(:any)', 'keluarga\DataPembayaran::hapus/$1', ['as' => 'keluarga.data_pembayaran.hapus']);
    $routes->get('data_pembayaran/detail', 'keluarga\DataPembayaran::detail', ['as' => 'keluarga.data_pembayaran.detail']);
    $routes->get('data_pembayaran/cetak', 'keluarga\DataPembayaran::cetak', ['as' => 'keluarga.data_pembayaran.cetak']);

    $routes->get('data_petugas', 'keluarga\DataPetugas::index', ['as' => 'keluarga.data_petugas']);
    $routes->match(['post', 'get'], 'data_petugas/tambah', 'keluarga\DataPetugas::tambah', ['as' => 'keluarga.data_petugas.tambah']);
    $routes->match(['post', 'get'], 'data_petugas/edit', 'keluarga\DataPetugas::edit', ['as' => 'keluarga.data_petugas.edit']);
    $routes->get('data_petugas/hapus/(:any)', 'keluarga\DataPetugas::hapus/$1', ['as' => 'keluarga.data_petugas.hapus']);
    $routes->get('data_petugas/detail', 'keluarga\DataPetugas::detail', ['as' => 'keluarga.data_petugas.detail']);
    $routes->get('data_petugas/cetak', 'keluarga\DataPetugas::cetak', ['as' => 'keluarga.data_petugas.cetak']);

    $routes->get('data_rekam_medis', 'keluarga\DataRekamMedis::index', ['as' => 'keluarga.data_rekam_medis']);
    $routes->match(['post', 'get'], 'data_rekam_medis/tambah', 'keluarga\DataRekamMedis::tambah', ['as' => 'keluarga.data_rekam_medis.tambah']);
    $routes->match(['post', 'get'], 'data_rekam_medis/edit', 'keluarga\DataRekamMedis::edit', ['as' => 'keluarga.data_rekam_medis.edit']);
    $routes->get('data_rekam_medis/hapus/(:any)', 'keluarga\DataRekamMedis::hapus/$1', ['as' => 'keluarga.data_rekam_medis.hapus']);
    $routes->get('data_rekam_medis/detail', 'keluarga\DataRekamMedis::detail', ['as' => 'keluarga.data_rekam_medis.detail']);
    $routes->get('data_rekam_medis/cetak', 'keluarga\DataRekamMedis::cetak', ['as' => 'keluarga.data_rekam_medis.cetak']);


    $routes->match(['post', 'get'], 'home', 'keluarga\Home::index', ['as' => 'keluarga.home']);

    $routes->match(['post', 'get'], 'daftar', 'keluarga\Daftar::index', ['as' => 'keluarga.daftar']);
    $routes->match(['post', 'get'], 'daftar/proses', 'keluarga\Daftar::daftar', ['as' => 'keluarga.daftar.proses']);
});

$routes->match(['post', 'get'], 'keluarga/login', 'keluarga\Login::index', ['as' => 'keluarga.login']);
// $routes->match(['post', 'get'], 'keluarga/daftar', 'keluarga\Daftar::index', ['as' => 'keluarga.daftar']);
$routes->get('keluarga/logout', 'keluarga\Login::logout', ['as' => 'keluarga.logout']);
