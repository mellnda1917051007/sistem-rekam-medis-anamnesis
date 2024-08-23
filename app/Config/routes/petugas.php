<?php
$routes->group('petugas', static function ($routes) {
    $routes->get('data_admin', 'petugas\DataAdmin::index', ['as' => 'petugas.data_admin']);
    $routes->match(['post', 'get'], 'data_admin/tambah', 'petugas\DataAdmin::tambah', ['as' => 'petugas.data_admin.tambah']);
    $routes->match(['post', 'get'], 'data_admin/edit', 'petugas\DataAdmin::edit', ['as' => 'petugas.data_admin.edit']);
    $routes->get('data_admin/hapus/(:any)', 'petugas\DataAdmin::hapus/$1', ['as' => 'petugas.data_admin.hapus']);
    $routes->get('data_admin/detail', 'petugas\DataAdmin::detail', ['as' => 'petugas.data_admin.detail']);
    $routes->get('data_admin/cetak', 'petugas\DataAdmin::cetak', ['as' => 'petugas.data_admin.cetak']);

    $routes->get('data_anamnesis', 'petugas\DataAnamnesis::index', ['as' => 'petugas.data_anamnesis']);
    $routes->match(['post', 'get'], 'data_anamnesis/tambah', 'petugas\DataAnamnesis::tambah', ['as' => 'petugas.data_anamnesis.tambah']);
    $routes->match(['post', 'get'], 'data_anamnesis/edit', 'petugas\DataAnamnesis::edit', ['as' => 'petugas.data_anamnesis.edit']);
    $routes->get('data_anamnesis/hapus/(:any)', 'petugas\DataAnamnesis::hapus/$1', ['as' => 'petugas.data_anamnesis.hapus']);
    $routes->get('data_anamnesis/detail', 'petugas\DataAnamnesis::detail', ['as' => 'petugas.data_anamnesis.detail']);
    $routes->get('data_anamnesis/cetak', 'petugas\DataAnamnesis::cetak', ['as' => 'petugas.data_anamnesis.cetak']);

    $routes->get('data_anggota_keluarga', 'petugas\DataAnggotaKeluarga::index', ['as' => 'petugas.data_anggota_keluarga']);
    $routes->match(['post', 'get'], 'data_anggota_keluarga/tambah', 'petugas\DataAnggotaKeluarga::tambah', ['as' => 'petugas.data_anggota_keluarga.tambah']);
    $routes->match(['post', 'get'], 'data_anggota_keluarga/edit', 'petugas\DataAnggotaKeluarga::edit', ['as' => 'petugas.data_anggota_keluarga.edit']);
    $routes->get('data_anggota_keluarga/hapus/(:any)', 'petugas\DataAnggotaKeluarga::hapus/$1', ['as' => 'petugas.data_anggota_keluarga.hapus']);
    $routes->get('data_anggota_keluarga/detail', 'petugas\DataAnggotaKeluarga::detail', ['as' => 'petugas.data_anggota_keluarga.detail']);
    $routes->get('data_anggota_keluarga/cetak', 'petugas\DataAnggotaKeluarga::cetak', ['as' => 'petugas.data_anggota_keluarga.cetak']);

    $routes->get('data_berita_acara', 'petugas\DataBeritaAcara::index', ['as' => 'petugas.data_berita_acara']);
    $routes->match(['post', 'get'], 'data_berita_acara/tambah', 'petugas\DataBeritaAcara::tambah', ['as' => 'petugas.data_berita_acara.tambah']);
    $routes->match(['post', 'get'], 'data_berita_acara/edit', 'petugas\DataBeritaAcara::edit', ['as' => 'petugas.data_berita_acara.edit']);
    $routes->get('data_berita_acara/hapus/(:any)', 'petugas\DataBeritaAcara::hapus/$1', ['as' => 'petugas.data_berita_acara.hapus']);
    $routes->get('data_berita_acara/detail', 'petugas\DataBeritaAcara::detail', ['as' => 'petugas.data_berita_acara.detail']);
    $routes->get('data_berita_acara/cetak', 'petugas\DataBeritaAcara::cetak', ['as' => 'petugas.data_berita_acara.cetak']);

    $routes->get('data_berita_acara_pengiriman_penderita_pulang', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::index', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang']);
    $routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/tambah', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::tambah', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang.tambah']);
    $routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/edit', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::edit', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang.edit']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/hapus/(:any)', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::hapus/$1', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang.hapus']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/detail', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::detail', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang.detail']);
    $routes->get('data_berita_acara_pengiriman_penderita_pulang/cetak', 'petugas\DataBeritaAcaraPengirimanPenderitaPulang::cetak', ['as' => 'petugas.data_berita_acara_pengiriman_penderita_pulang.cetak']);

    $routes->get('data_pasien', 'petugas\DataPasien::index', ['as' => 'petugas.data_pasien']);
    $routes->match(['post', 'get'], 'data_pasien/tambah', 'petugas\DataPasien::tambah', ['as' => 'petugas.data_pasien.tambah']);
    $routes->match(['post', 'get'], 'data_pasien/edit', 'petugas\DataPasien::edit', ['as' => 'petugas.data_pasien.edit']);
    $routes->get('data_pasien/hapus/(:any)', 'petugas\DataPasien::hapus/$1', ['as' => 'petugas.data_pasien.hapus']);
    $routes->get('data_pasien/detail', 'petugas\DataPasien::detail', ['as' => 'petugas.data_pasien.detail']);
    $routes->get('data_pasien/cetak', 'petugas\DataPasien::cetak', ['as' => 'petugas.data_pasien.cetak']);

    $routes->get('data_pembayaran', 'petugas\DataPembayaran::index', ['as' => 'petugas.data_pembayaran']);
    $routes->match(['post', 'get'], 'data_pembayaran/tambah', 'petugas\DataPembayaran::tambah', ['as' => 'petugas.data_pembayaran.tambah']);
    $routes->match(['post', 'get'], 'data_pembayaran/edit', 'petugas\DataPembayaran::edit', ['as' => 'petugas.data_pembayaran.edit']);
    $routes->get('data_pembayaran/hapus/(:any)', 'petugas\DataPembayaran::hapus/$1', ['as' => 'petugas.data_pembayaran.hapus']);
    $routes->get('data_pembayaran/detail', 'petugas\DataPembayaran::detail', ['as' => 'petugas.data_pembayaran.detail']);
    $routes->get('data_pembayaran/cetak', 'petugas\DataPembayaran::cetak', ['as' => 'petugas.data_pembayaran.cetak']);

    $routes->get('data_petugas', 'petugas\DataPetugas::index', ['as' => 'petugas.data_petugas']);
    $routes->match(['post', 'get'], 'data_petugas/tambah', 'petugas\DataPetugas::tambah', ['as' => 'petugas.data_petugas.tambah']);
    $routes->match(['post', 'get'], 'data_petugas/edit', 'petugas\DataPetugas::edit', ['as' => 'petugas.data_petugas.edit']);
    $routes->get('data_petugas/hapus/(:any)', 'petugas\DataPetugas::hapus/$1', ['as' => 'petugas.data_petugas.hapus']);
    $routes->get('data_petugas/detail', 'petugas\DataPetugas::detail', ['as' => 'petugas.data_petugas.detail']);
    $routes->get('data_petugas/cetak', 'petugas\DataPetugas::cetak', ['as' => 'petugas.data_petugas.cetak']);

    $routes->get('data_rekam_medis', 'petugas\DataRekamMedis::index', ['as' => 'petugas.data_rekam_medis']);
    $routes->match(['post', 'get'], 'data_rekam_medis/tambah', 'petugas\DataRekamMedis::tambah', ['as' => 'petugas.data_rekam_medis.tambah']);
    $routes->match(['post', 'get'], 'data_rekam_medis/edit', 'petugas\DataRekamMedis::edit', ['as' => 'petugas.data_rekam_medis.edit']);
    $routes->get('data_rekam_medis/hapus/(:any)', 'petugas\DataRekamMedis::hapus/$1', ['as' => 'petugas.data_rekam_medis.hapus']);
    $routes->get('data_rekam_medis/detail', 'petugas\DataRekamMedis::detail', ['as' => 'petugas.data_rekam_medis.detail']);
    $routes->get('data_rekam_medis/cetak', 'petugas\DataRekamMedis::cetak', ['as' => 'petugas.data_rekam_medis.cetak']);


    $routes->match(['post', 'get'], 'home', 'petugas\Home::index', ['as' => 'petugas.home']);
});

$routes->match(['post', 'get'], 'petugas/login', 'petugas\Login::index', ['as' => 'petugas.login']);
$routes->get('petugas/logout', 'petugas\Login::logout', ['as' => 'petugas.logout']);
