<?php

namespace App\Controllers\keluarga;

use App\Controllers\BaseController;
use App\Repo\keluarga\DataRekamMedisRepo;

class DataRekamMedis extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Rekam Medis';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $id_anggota_keluarga = session()->get('anggota_keluarga_id');
        $id_pasien = baca_database("", "id_pasien", "select * from data_anggota_keluarga where id_anggota_keluarga='$id_anggota_keluarga'");

        if ($berdasarkan && $isi) {
            $data_rekam_medis = DataRekamMedisRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_rekam_medis = DataRekamMedisRepo::tampil()->where('id_pasien', $id_pasien)
                ->orWhere('id_pasien', $id_pasien);
        }



        $this->data['data_rekam_medis'] = $data_rekam_medis->paginate(15);
        $this->data['pager'] = $data_rekam_medis->pager;
        $this->data['desc_tabel'] = DataRekamMedisRepo::desc_tabel();
        return view("keluarga/data_rekam_medis/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataRekamMedisRepo::simpan([
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis"),
                    "id_pasien" => $this->request->getPost("id_pasien"),
                    "obat" => $this->request->getPost("obat"),
                    "id_petugas" => $this->request->getPost("id_petugas"),
                    "status" => $this->request->getPost("status")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(route_to("keluarga.data_rekam_medis"));
            }
        }
        return view("keluarga/data_rekam_medis/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_rekam_medis" => $this->request->getPost("id_rekam_medis")
                ];
                $forms = [
                    "id_pasien" => $this->request->getPost("id_pasien"),
                    "obat" => $this->request->getPost("obat"),
                    "id_petugas" => $this->request->getPost("id_petugas"),
                    "status" => $this->request->getPost("status")
                ];

                DataRekamMedisRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(route_to("keluarga.data_rekam_medis"));
            }
        }
        $this->data["data"] = DataRekamMedisRepo::detail($proses);
        return view("keluarga/data_rekam_medis/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataRekamMedisRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataRekamMedisRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataRekamMedisRepo::cetak_semua();
        }
        return view("keluarga/data_rekam_medis/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_rekam_medis' => 'required', 'id_pasien' => 'required', 'obat' => 'required', 'id_petugas' => 'required', 'status' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_rekam_medis' => 'required', 'id_pasien' => 'required', 'obat' => 'required', 'id_petugas' => 'required', 'status' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataRekamMedisRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(route_to("keluarga.data_rekam_medis"));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataRekamMedisRepo::detail($proses);
        return view("keluarga/data_rekam_medis/detail", $this->data);
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
