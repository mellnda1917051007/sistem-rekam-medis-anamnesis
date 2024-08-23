<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Repo\admin\DataPembayaranRepo;

class DataPembayaran extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Pembayaran';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_pembayaran = DataPembayaranRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_pembayaran = DataPembayaranRepo::tampil();
        }
        $this->data['data_pembayaran'] = $data_pembayaran->paginate(15);
        $this->data['pager'] = $data_pembayaran->pager;
        $this->data['desc_tabel'] = DataPembayaranRepo::desc_tabel();
        return view("admin/data_pembayaran/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataPembayaranRepo::simpan([
                    "id_pembayaran" => $this->request->getPost("id_pembayaran"),
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis"),
                    "nama_biaya" => $this->request->getPost("nama_biaya"),
                    "harga" => $this->request->getPost("harga"),
                    "total" => $this->request->getPost("total"),
                    "status" => $this->request->getPost("status")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(base_url(route_to("admin.data_pembayaran")));
            }
        }
        return view("admin/data_pembayaran/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_pembayaran" => $this->request->getPost("id_pembayaran")
                ];
                $forms = [
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis"),
                    "nama_biaya" => $this->request->getPost("nama_biaya"),
                    "harga" => $this->request->getPost("harga"),
                    "total" => $this->request->getPost("total"),
                    "status" => $this->request->getPost("status")
                ];

                DataPembayaranRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(route_to("admin.data_pembayaran"));
            }
        }
        $this->data["data"] = DataPembayaranRepo::detail($proses);
        return view("admin/data_pembayaran/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataPembayaranRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataPembayaranRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataPembayaranRepo::cetak_semua();
        }
        return view("admin/data_pembayaran/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_pembayaran' => 'required',
            'id_rekam_medis' => 'required',
            'nama_biaya' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'status' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_pembayaran' => 'required',
            'id_rekam_medis' => 'required',
            'nama_biaya' => 'required',
            'harga' => 'required',
            'total' => 'required',
            'status' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataPembayaranRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(base_url(route_to("admin.data_pembayaran")));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataPembayaranRepo::detail($proses);
        return view("admin/data_pembayaran/detail", $this->data);
    }


    private function upload(string $key)
    {
        $file = $this->request->getFile($key);
        if (!$file->isValid()) {
            return null;
        }
        $fileName = $file->getRandomName();
        $file->move(PUBLIC_PATH . 'uploads/', $fileName);
        return $fileName;
    }
}
