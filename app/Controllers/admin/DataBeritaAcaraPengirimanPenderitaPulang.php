<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Repo\admin\DataBeritaAcaraPengirimanPenderitaPulangRepo;

class DataBeritaAcaraPengirimanPenderitaPulang extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Berita Acara Pengiriman Penderita Pulang';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_berita_acara_pengiriman_penderita_pulang = DataBeritaAcaraPengirimanPenderitaPulangRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_berita_acara_pengiriman_penderita_pulang = DataBeritaAcaraPengirimanPenderitaPulangRepo::tampil();
        }
        $this->data['data_berita_acara_pengiriman_penderita_pulang'] = $data_berita_acara_pengiriman_penderita_pulang->paginate(15);
        $this->data['pager'] = $data_berita_acara_pengiriman_penderita_pulang->pager;
        $this->data['desc_tabel'] = DataBeritaAcaraPengirimanPenderitaPulangRepo::desc_tabel();
        return view("admin/data_berita_acara_pengiriman_penderita_pulang/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataBeritaAcaraPengirimanPenderitaPulangRepo::simpan([
                    "id_berita_acara_penderita_pulang" => $this->request->getPost("id_berita_acara_penderita_pulang"),
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis"),
                    'file' => $this->upload('file')
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(base_url(route_to("admin.data_berita_acara_pengiriman_penderita_pulang")));
            }
        }
        return view("admin/data_berita_acara_pengiriman_penderita_pulang/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_berita_acara_penderita_pulang" => $this->request->getPost("id_berita_acara_penderita_pulang")
                ];
                $forms = [
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis"),
                    'file' => $this->upload('file')
                ];
                if ($forms['file'] == null) {
                    unset($forms['file']);
                }
                DataBeritaAcaraPengirimanPenderitaPulangRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(base_url(route_to("admin.data_berita_acara_pengiriman_penderita_pulang")));
            }
        }
        $this->data["data"] = DataBeritaAcaraPengirimanPenderitaPulangRepo::detail($proses);
        return view("admin/data_berita_acara_pengiriman_penderita_pulang/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataBeritaAcaraPengirimanPenderitaPulangRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataBeritaAcaraPengirimanPenderitaPulangRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataBeritaAcaraPengirimanPenderitaPulangRepo::cetak_semua();
        }
        return view("admin/data_berita_acara_pengiriman_penderita_pulang/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_berita_acara_penderita_pulang' => 'required',
            'id_rekam_medis' => 'required',
            'file'    => 'uploaded[file_bimbingan]|max_size[file_bimbingan,2048]|mime_in[file_bimbingan,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|permit_empty'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_berita_acara_penderita_pulang' => 'required',
            'id_rekam_medis' => 'required',
            'file'    => 'uploaded[file_bimbingan]|max_size[file_bimbingan,2048]|mime_in[file_bimbingan,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|permit_empty'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataBeritaAcaraPengirimanPenderitaPulangRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(base_url(route_to("admin.data_berita_acara_pengiriman_penderita_pulang")));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataBeritaAcaraPengirimanPenderitaPulangRepo::detail($proses);
        return view("admin/data_berita_acara_pengiriman_penderita_pulang/detail", $this->data);
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
