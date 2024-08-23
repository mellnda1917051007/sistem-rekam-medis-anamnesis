<?php

namespace App\Service\home;

use App\Repo\pelanggan\DataPelangganRepo;
use App\Repo\pelanggan\DataPemesananRepo;
use App\Repo\pelanggan\DataTransaksiRepo;

class SelesaiTransksi
{
    public function __construct($id_pelanggan, $total_bayar)
    {
        $this->id_pelanggan = $id_pelanggan;
        $this->pelanggan = $this->getPelanggan();
        $this->kode_transaksi = $this->kodeOtomatis();
        $this->tanggal_pemesanan = date("Y-m-d");
        $this->total_bayar = $total_bayar;
        $this->tujuan = $this->pelanggan['alamat'];
        $this->no_telepon_penerima = $this->pelanggan['no_telepon'];

        $this->simpan();
        $this->selesaikanTransaksi();
    }

    private function selesaikanTransaksi()
    {
        DataTransaksiRepo::selesaikan_transaksi(
            $this->id_pelanggan,
            [
                'kode_transaksi' => $this->kode_transaksi,
                'status' => 'pemesanan',
                'tanggal_transaksi' => $this->tanggal_pemesanan
            ]
        );
    }

    private function simpan()
    {
        return DataPemesananRepo::simpan([
            "id_pemesanan" => $this->idPemesanan(),
            "kode_transaksi" => $this->kode_transaksi,
            "tanggal_pemesanan" => $this->tanggal_pemesanan,
            "total_bayar" => $this->total_bayar,
            "nama_bank" => null,
            "rekening" => null,
            "tujuan" => $this->tujuan,
            "tanggal_upload_bukti_pembayaran" => null,
            'foto_bukti_pembayaran' => null,
            "no_telepon_penerima" => $this->no_telepon_penerima,
            "alamat_pengiriman" => null
        ]);
    }

    private function kodeOtomatis()
    {
        return id_otomatis("data_pemesanan", "kode_transaksi", "10");
    }

    private function idPemesanan()
    {
        return id_otomatis("data_pemesanan", "id_pemesanan", "10");
    }

    private function getPelanggan()
    {
        return DataPelangganRepo::detail($this->id_pelanggan);
    }
}
