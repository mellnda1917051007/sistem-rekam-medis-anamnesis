<?php

namespace App\Controllers\petugas;

use App\Controllers\BaseController;
use App\Repo\petugas\DataPasienRepo;

class DataPasien extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Pasien';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_pasien = DataPasienRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_pasien = DataPasienRepo::tampil();
        }
        $this->data['data_pasien'] = $data_pasien->paginate(15);
        $this->data['pager'] = $data_pasien->pager;
        $this->data['desc_tabel'] = DataPasienRepo::desc_tabel();
        return view("petugas/data_pasien/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataPasienRepo::simpan([
                    "id_pasien" => $this->request->getPost("id_pasien"),
                    "id_petugas" => $this->request->getPost("id_petugas"),
                    "nama_lengkap" => $this->request->getPost("nama_lengkap"),
                    "jenis_kelamin" => $this->request->getPost("jenis_kelamin"),
                    "tanggal_masuk" => $this->request->getPost("tanggal_masuk"),
                    "diagnosa_kejiwaan" => $this->request->getPost("diagnosa_kejiwaan"),
                    "status" => $this->request->getPost("status")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(route_to("petugas.data_pasien"));
            }
        }
        return view("petugas/data_pasien/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_pasien" => $this->request->getPost("id_pasien")
                    ]; 
                    $forms = [
                    "id_petugas" => $this->request->getPost("id_petugas"),
                    "nama_lengkap" => $this->request->getPost("nama_lengkap"),
                    "jenis_kelamin" => $this->request->getPost("jenis_kelamin"),
                    "tanggal_masuk" => $this->request->getPost("tanggal_masuk"),
                    "diagnosa_kejiwaan" => $this->request->getPost("diagnosa_kejiwaan"),
                    "status" => $this->request->getPost("status")];
                
                DataPasienRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(route_to("petugas.data_pasien"));
            }
        }
        $this->data["data"] = DataPasienRepo::detail($proses);
        return view("petugas/data_pasien/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataPasienRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataPasienRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataPasienRepo::cetak_semua();
        }
        return view("petugas/data_pasien/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_pasien' => 'required'
			,'id_petugas' => 'required'
			,'nama_lengkap' => 'required'
			,'jenis_kelamin' => 'required'
			,'tanggal_masuk' => 'required'
			,'diagnosa_kejiwaan' => 'required'
			,'status' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_pasien' => 'required'
			,'id_petugas' => 'required'
			,'nama_lengkap' => 'required'
			,'jenis_kelamin' => 'required'
			,'tanggal_masuk' => 'required'
			,'diagnosa_kejiwaan' => 'required'
			,'status' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataPasienRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(route_to("petugas.data_pasien"));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataPasienRepo::detail($proses);
        return view("petugas/data_pasien/detail", $this->data);
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
