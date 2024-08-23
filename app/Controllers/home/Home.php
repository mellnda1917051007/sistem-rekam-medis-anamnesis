<?php

namespace App\Controllers\home;

use App\Controllers\BaseController;
use App\Repo\admin\DataAdminRepo;
use App\Repo\admin\DataGaleryRepo;
use App\Repo\pelanggan\DataBankRepo;
use App\Repo\pelanggan\DataPaketRepo;
use App\Repo\pelanggan\DataPemesananRepo;
use App\Repo\pelanggan\DataProfilRepo;
use App\Repo\pelanggan\DataTransaksiRepo;
use App\Service\home\PembatalanService;
use App\Service\home\SelesaiTransksi;
use App\Service\home\ServiceUploadBukti;
use HomeAuth;

class Home extends BaseController
{
    public function index()
    {
        return view('home/home');
    }

    public function profil()
    {
        $this->data['data'] = DataProfilRepo::first();
        return view('home/profil', $this->data);
    }

    public function galeri()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_galery = DataGaleryRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_galery = DataGaleryRepo::tampil();
        }
        $this->data['datas'] = $data_galery->paginate(15);
        $this->data['pager'] = $data_galery->pager;
        $this->data['desc_tabel'] = DataGaleryRepo::desc_tabel();

        return view('home/galeri', $this->data);
    }

    public function produk()
    {
        $repo = DataPaketRepo::class;
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data = $repo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data = $repo::tampil();
        }
        $this->data['datas'] = $data->paginate(15);
        $this->data['pager'] = $data->pager;
        $this->data['desc_tabel'] = $repo::desc_tabel();

        return view('home/produk', $this->data);
    }

    public function detail($proses)
    {
        if ($this->request->getPost()) {
            DataTransaksiRepo::simpan([
                "id_transaksi" => id_otomatis("data_transaksi", "id_transaksi", "10"),
                "kode_transaksi" => null,
                "tanggal_transaksi" => null,
                "id_pelanggan" => HomeAuth::id(),
                "id_paket" => $proses,
                "jumlah" => $this->request->getPost("jumlah"),
                "jumlah_hari" => $this->request->getPost("jumlah_hari"),
                "harga" => $this->request->getPost("harga"),
                "catatan" => $this->request->getPost("catatan"),
                "status" => "proses"
            ]);
            return $this->response->redirect(route_to("home.produk"));
        }
        $this->data['data'] = DataPaketRepo::detail($proses);
        return view("home/produk_detail", $this->data);
    }


    public function keranjang()
    {
        $this->data['rencana'] = $this->request->getPostGet('rencana');

        $action = $this->request->getPostGet('action');
        if ($action == "cek") {
            $this->data['hasil_cek'] = $this->cekKetersediaan($this->request->getPostGet('rencana'));
        } else {
            $this->data['hasil_cek'] = null;
        }
        if ($action == "selesai") {
            new SelesaiTransksi(HomeAuth::id(), $this->request->getPostGet('total_pembayaran'));
            return redirect()->to(route_to('home.transaksi'));
        }
        $this->data['datas'] = DataTransaksiRepo::get_by_pelanggan_id(HomeAuth::id());
        return view("home/keranjang", $this->data);
    }


    private function cekKetersediaan($tanggal)
    {
        return DataTransaksiRepo::ada_pemesanan_by_tanggal_pemesanan($tanggal) == null;
    }

    public function transaksi()
    {
        if ($this->request->getPost()) {
            $action = $this->request->getPost('action');
            if ($action == "batal") {
                new PembatalanService($this->request->getPost('kode_transaksi'));
                return redirect()->to(base_url('transaksi'));
            }
        }
        $this->data['datas'] = DataTransaksiRepo::tampil_bukan_proses(HomeAuth::id());
        return view('home/transaksi', $this->data);
    }

    public function upload_bukti($kode_transaksi)
    {
        if ($this->request->getPost()) {
            $id_bank = $this->request->getPost('id_bank');
            $bank = DataBankRepo::get_data_bank($id_bank);
            if ($bank) {
                $foto = $this->upload('foto_bukti_pembayaran');
                new ServiceUploadBukti($kode_transaksi, $bank, $foto);
                echo <<<html
<script>
alert('bukti pembayaran berhasil diupload');
</script>
html;
            }
        }
        $this->data['data_banks'] = DataBankRepo::all();
        $this->data['data_pemesanan'] = DataPemesananRepo::get_data_pemesanan_by_kode_transaksi($kode_transaksi);
        return view('home/upload_bukti', $this->data);
    }

    private function upload(string $key)
    {
        $file = $this->request->getFile($key);
        if ($file == null) {
            return null;
        }
        if (!$file->isValid()) {
            return null;
        }
        $fileName = $file->getRandomName();
        $file->move(PUBLIC_PATH . 'uploads/', $fileName);
        return $fileName;
    }
}
