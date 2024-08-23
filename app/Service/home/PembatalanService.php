<?php

namespace App\Service\home;

use App\Repo\pelanggan\DataTransaksiRepo;

class PembatalanService
{
    public function __construct($kode_transaksi)
    {
        $this->kode_transaksi = $kode_transaksi;

        $this->batalkan();
    }

    private function batalkan()
    {
        return DataTransaksiRepo::batal_by_kode_transaksi($this->kode_transaksi);
    }
}
