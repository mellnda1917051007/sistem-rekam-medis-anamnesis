<?php

$routes->get('profil', 'home\Home::profil', ['as' => 'home.profil']);
$routes->get('galeri', 'home\Home::galeri', ['as' => 'home.galeri']);
$routes->get('produk', 'home\Home::produk', ['as' => 'home.produk']);
$routes->match(['post', 'get'], 'pemesanan', 'home\Home::keranjang', ['as' => 'home.keranjang']);
$routes->match(['post', 'get'], 'transaksi', 'home\Home::transaksi', ['as' => 'home.transaksi']);
$routes->match(['post', 'get'], 'upload_bukti/(:any)', 'home\Home::upload_bukti/$1', ['as' => 'home.upload_bukti']);
$routes->match(['post', 'get'], 'produk/(:any)', 'home\Home::detail/$1', ['as' => 'home.produk.detail']);
$routes->match(['post', 'get'], 'login', 'home\Login::index', ['as' => 'home.login']);
$routes->match(['post', 'get'], 'daftar', 'home\Login::daftar', ['as' => 'home.daftar']);
$routes->get('logout', 'home\Login::logout', ['as' => 'home.logout']);
