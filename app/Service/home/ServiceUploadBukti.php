<?php

namespace App\Service\home;

use App\Repo\pelanggan\DataPemesananRepo;
use App\Repo\pelanggan\DataTransaksiRepo;

class ServiceUploadBukti
{
    private $error = false;

    public function __construct($kode_transaksi, $bank, $foto)
    {
        $this->kode_transaksi = $kode_transaksi;
        $this->bank           = $bank;
        $this->foto           = $foto;

        $this->updatePemesanan();
        $this->updateStatusTransaksi();
    }

    private function updatePemesanan()
    {
        DataPemesananRepo::upload_bukti($this->kode_transaksi, [
            'nama_bank'                       => $this->bank['nama_bank'],
            'rekening'                        => $this->bank['rekening'],
            'tanggal_upload_bukti_pembayaran' => date('Y-m-d'),
            'foto_bukti_pembayaran'           => $this->foto
        ]);
        $this->error = false;
    }

    private function updateStatusTransaksi()
    {
        DataTransaksiRepo::update_status_by_kode_transaksi($this->kode_transaksi, 'menunggu_konfirmasi');
        $this->error = false;
    }

    public function uploadBerhasil()
    {
        return $this->error == false;
    }
}
