<?php
$routes->group('admin', static function ($routes) {
	$routes->get('data_admin', 'admin\DataAdmin::index', ['as' => 'admin.data_admin']);
	$routes->match(['post', 'get'], 'data_admin/tambah', 'admin\DataAdmin::tambah', ['as' => 'admin.data_admin.tambah']);
	$routes->match(['post', 'get'], 'data_admin/edit', 'admin\DataAdmin::edit', ['as' => 'admin.data_admin.edit']);
	$routes->get('data_admin/hapus/(:any)', 'admin\DataAdmin::hapus/$1', ['as' => 'admin.data_admin.hapus']);
	$routes->get('data_admin/detail', 'admin\DataAdmin::detail', ['as' => 'admin.data_admin.detail']);
	$routes->get('data_admin/cetak', 'admin\DataAdmin::cetak', ['as' => 'admin.data_admin.cetak']);

	$routes->get('data_anamnesis', 'admin\DataAnamnesis::index', ['as' => 'admin.data_anamnesis']);
	$routes->match(['post', 'get'], 'data_anamnesis/tambah', 'admin\DataAnamnesis::tambah', ['as' => 'admin.data_anamnesis.tambah']);
	$routes->match(['post', 'get'], 'data_anamnesis/edit', 'admin\DataAnamnesis::edit', ['as' => 'admin.data_anamnesis.edit']);
	$routes->get('data_anamnesis/hapus/(:any)', 'admin\DataAnamnesis::hapus/$1', ['as' => 'admin.data_anamnesis.hapus']);
	$routes->get('data_anamnesis/detail', 'admin\DataAnamnesis::detail', ['as' => 'admin.data_anamnesis.detail']);
	$routes->get('data_anamnesis/cetak', 'admin\DataAnamnesis::cetak', ['as' => 'admin.data_anamnesis.cetak']);

	$routes->get('data_anggota_keluarga', 'admin\DataAnggotaKeluarga::index', ['as' => 'admin.data_anggota_keluarga']);
	$routes->match(['post', 'get'], 'data_anggota_keluarga/tambah', 'admin\DataAnggotaKeluarga::tambah', ['as' => 'admin.data_anggota_keluarga.tambah']);
	$routes->match(['post', 'get'], 'data_anggota_keluarga/edit', 'admin\DataAnggotaKeluarga::edit', ['as' => 'admin.data_anggota_keluarga.edit']);
	$routes->get('data_anggota_keluarga/hapus/(:any)', 'admin\DataAnggotaKeluarga::hapus/$1', ['as' => 'admin.data_anggota_keluarga.hapus']);
	$routes->get('data_anggota_keluarga/detail', 'admin\DataAnggotaKeluarga::detail', ['as' => 'admin.data_anggota_keluarga.detail']);
	$routes->get('data_anggota_keluarga/cetak', 'admin\DataAnggotaKeluarga::cetak', ['as' => 'admin.data_anggota_keluarga.cetak']);

	$routes->get('data_berita_acara', 'admin\DataBeritaAcara::index', ['as' => 'admin.data_berita_acara']);
	$routes->match(['post', 'get'], 'data_berita_acara/tambah', 'admin\DataBeritaAcara::tambah', ['as' => 'admin.data_berita_acara.tambah']);
	$routes->match(['post', 'get'], 'data_berita_acara/edit', 'admin\DataBeritaAcara::edit', ['as' => 'admin.data_berita_acara.edit']);
	$routes->get('data_berita_acara/hapus/(:any)', 'admin\DataBeritaAcara::hapus/$1', ['as' => 'admin.data_berita_acara.hapus']);
	$routes->get('data_berita_acara/detail', 'admin\DataBeritaAcara::detail', ['as' => 'admin.data_berita_acara.detail']);
	$routes->get('data_berita_acara/cetak', 'admin\DataBeritaAcara::cetak', ['as' => 'admin.data_berita_acara.cetak']);

	$routes->get('data_berita_acara_pengiriman_penderita_pulang', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::index', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang']);
	$routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/tambah', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::tambah', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang.tambah']);
	$routes->match(['post', 'get'], 'data_berita_acara_pengiriman_penderita_pulang/edit', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::edit', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang.edit']);
	$routes->get('data_berita_acara_pengiriman_penderita_pulang/hapus/(:any)', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::hapus/$1', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang.hapus']);
	$routes->get('data_berita_acara_pengiriman_penderita_pulang/detail', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::detail', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang.detail']);
	$routes->get('data_berita_acara_pengiriman_penderita_pulang/cetak', 'admin\DataBeritaAcaraPengirimanPenderitaPulang::cetak', ['as' => 'admin.data_berita_acara_pengiriman_penderita_pulang.cetak']);

	$routes->get('data_pasien', 'admin\DataPasien::index', ['as' => 'admin.data_pasien']);
	$routes->match(['post', 'get'], 'data_pasien/tambah', 'admin\DataPasien::tambah', ['as' => 'admin.data_pasien.tambah']);
	$routes->match(['post', 'get'], 'data_pasien/edit', 'admin\DataPasien::edit', ['as' => 'admin.data_pasien.edit']);
	$routes->get('data_pasien/hapus/(:any)', 'admin\DataPasien::hapus/$1', ['as' => 'admin.data_pasien.hapus']);
	$routes->get('data_pasien/detail', 'admin\DataPasien::detail', ['as' => 'admin.data_pasien.detail']);
	$routes->get('data_pasien/cetak', 'admin\DataPasien::cetak', ['as' => 'admin.data_pasien.cetak']);

	$routes->get('data_pembayaran', 'admin\DataPembayaran::index', ['as' => 'admin.data_pembayaran']);
	$routes->match(['post', 'get'], 'data_pembayaran/tambah', 'admin\DataPembayaran::tambah', ['as' => 'admin.data_pembayaran.tambah']);
	$routes->match(['post', 'get'], 'data_pembayaran/edit', 'admin\DataPembayaran::edit', ['as' => 'admin.data_pembayaran.edit']);
	$routes->get('data_pembayaran/hapus/(:any)', 'admin\DataPembayaran::hapus/$1', ['as' => 'admin.data_pembayaran.hapus']);
	$routes->get('data_pembayaran/detail', 'admin\DataPembayaran::detail', ['as' => 'admin.data_pembayaran.detail']);
	$routes->get('data_pembayaran/cetak', 'admin\DataPembayaran::cetak', ['as' => 'admin.data_pembayaran.cetak']);

	$routes->get('data_petugas', 'admin\DataPetugas::index', ['as' => 'admin.data_petugas']);
	$routes->match(['post', 'get'], 'data_petugas/tambah', 'admin\DataPetugas::tambah', ['as' => 'admin.data_petugas.tambah']);
	$routes->match(['post', 'get'], 'data_petugas/edit', 'admin\DataPetugas::edit', ['as' => 'admin.data_petugas.edit']);
	$routes->get('data_petugas/hapus/(:any)', 'admin\DataPetugas::hapus/$1', ['as' => 'admin.data_petugas.hapus']);
	$routes->get('data_petugas/detail', 'admin\DataPetugas::detail', ['as' => 'admin.data_petugas.detail']);
	$routes->get('data_petugas/cetak', 'admin\DataPetugas::cetak', ['as' => 'admin.data_petugas.cetak']);

	$routes->get('data_rekam_medis', 'admin\DataRekamMedis::index', ['as' => 'admin.data_rekam_medis']);
	$routes->match(['post', 'get'], 'data_rekam_medis/tambah', 'admin\DataRekamMedis::tambah', ['as' => 'admin.data_rekam_medis.tambah']);
	$routes->match(['post', 'get'], 'data_rekam_medis/edit', 'admin\DataRekamMedis::edit', ['as' => 'admin.data_rekam_medis.edit']);
	$routes->get('data_rekam_medis/hapus/(:any)', 'admin\DataRekamMedis::hapus/$1', ['as' => 'admin.data_rekam_medis.hapus']);
	$routes->get('data_rekam_medis/detail', 'admin\DataRekamMedis::detail', ['as' => 'admin.data_rekam_medis.detail']);
	$routes->get('data_rekam_medis/cetak', 'admin\DataRekamMedis::cetak', ['as' => 'admin.data_rekam_medis.cetak']);


	$routes->match(['post', 'get'], 'home', 'admin\Home::index', ['as' => 'admin.home']);
});
$routes->match(['post', 'get'], 'admin/login', 'admin\Login::index', ['as' => 'admin.login']);
$routes->get('admin/logout', 'admin\Login::logout', ['as' => 'admin.logout']);
/*$routes->match(['post', 'get'], 'admin/login', 'admin\Login::index', ['as' => 'admin.login']);
*/
