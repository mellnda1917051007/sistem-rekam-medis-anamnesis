<?php

namespace App\Controllers\keluarga;

use App\Controllers\BaseController;
use App\Repo\keluarga\DataBeritaAcaraRepo;

class DataBeritaAcara extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Berita Acara';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $id_anggota_keluarga = session()->get('anggota_keluarga_id');
        $id_pasien = baca_database("", "id_pasien", "select * from data_anggota_keluarga where id_anggota_keluarga='$id_anggota_keluarga'");
        $id_rekam_medis = baca_database("", "id_rekam_medis", "select * from data_rekam_medis where id_pasien='$id_pasien'");
        if ($berdasarkan && $isi) {
            $data_berita_acara = DataBeritaAcaraRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_berita_acara = DataBeritaAcaraRepo::tampil()->where('id_rekam_medis', $id_rekam_medis)
                ->orWhere('id_rekam_medis', $id_rekam_medis);
        }
        $this->data['data_berita_acara'] = $data_berita_acara->paginate(15);
        $this->data['pager'] = $data_berita_acara->pager;
        $this->data['desc_tabel'] = DataBeritaAcaraRepo::desc_tabel();
        return view("keluarga/data_berita_acara/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataBeritaAcaraRepo::simpan([
                    "id_berita_acara" => $this->request->getPost("id_berita_acara"),
                    'file' => $this->upload('file'),
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(route_to("keluarga.data_berita_acara"));
            }
        }
        return view("keluarga/data_berita_acara/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_berita_acara" => $this->request->getPost("id_berita_acara")
                ];
                $forms = [
                    'file' => $this->upload('file'),
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis")
                ];
                if ($forms['file'] == null) {
                    unset($forms['file']);
                }
                DataBeritaAcaraRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(route_to("keluarga.data_berita_acara"));
            }
        }
        $this->data["data"] = DataBeritaAcaraRepo::detail($proses);
        return view("keluarga/data_berita_acara/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataBeritaAcaraRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataBeritaAcaraRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataBeritaAcaraRepo::cetak_semua();
        }
        return view("keluarga/data_berita_acara/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_berita_acara' => 'required', 'file' => 'permit_empty|uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]|max_size[file,2048]', 'id_rekam_medis' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_berita_acara' => 'required', 'file' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/gif,image/png]|max_size[file,2048]', 'id_rekam_medis' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataBeritaAcaraRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(route_to("keluarga.data_berita_acara"));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataBeritaAcaraRepo::detail($proses);
        return view("keluarga/data_berita_acara/detail", $this->data);
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
