<?php

namespace App\Service;

use App\Repo\pelanggan\DataTransaksiRepo;

class BookingService
{
    private $tersedia = false;

    public function __construct($tanggal)
    {
        $this->tanggal = $tanggal;
        $this->cekKetersediaan();
    }

    private function cekKetersediaan()
    {
        $this->tersedia = DataTransaksiRepo::ada_pemesanan_by_tanggal_pemesanan($this->tanggal) == null;
    }

    public function getTesedia()
    {
        return $this->tersedia;
    }
}
