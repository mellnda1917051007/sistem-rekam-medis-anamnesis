<?php

namespace App\Controllers\petugas;

use App\Controllers\BaseController;
use App\Repo\petugas\DataPetugasRepo;

class DataPetugas extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Petugas';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_petugas = DataPetugasRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_petugas = DataPetugasRepo::tampil();
        }
        $this->data['data_petugas'] = $data_petugas->paginate(15);
        $this->data['pager'] = $data_petugas->pager;
        $this->data['desc_tabel'] = DataPetugasRepo::desc_tabel();
        return view("petugas/data_petugas/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataPetugasRepo::simpan([
                    "id_petugas" => $this->request->getPost("id_petugas"),
                    "nama" => $this->request->getPost("nama"),
                    "jenis_kelamin" => $this->request->getPost("jenis_kelamin"),
                    "alamat" => $this->request->getPost("alamat"),
                    "no_telepon" => $this->request->getPost("no_telepon"),
                    "username" => $this->request->getPost("username"),
                    "password" => $this->request->getPost("password")
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(route_to("petugas.data_petugas"));
            }
        }
        return view("petugas/data_petugas/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_petugas" => $this->request->getPost("id_petugas")
                    ]; 
                    $forms = [
                    "nama" => $this->request->getPost("nama"),
                    "jenis_kelamin" => $this->request->getPost("jenis_kelamin"),
                    "alamat" => $this->request->getPost("alamat"),
                    "no_telepon" => $this->request->getPost("no_telepon"),
                    "username" => $this->request->getPost("username"),
                    "password" => $this->request->getPost("password")];
                
                DataPetugasRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(route_to("petugas.data_petugas"));
            }
        }
        $this->data["data"] = DataPetugasRepo::detail($proses);
        return view("petugas/data_petugas/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataPetugasRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataPetugasRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataPetugasRepo::cetak_semua();
        }
        return view("petugas/data_petugas/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_petugas' => 'required'
			,'nama' => 'required'
			,'jenis_kelamin' => 'required'
			,'alamat' => 'required'
			,'no_telepon' => 'required'
			,'username' => 'required'
			,'password' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_petugas' => 'required'
			,'nama' => 'required'
			,'jenis_kelamin' => 'required'
			,'alamat' => 'required'
			,'no_telepon' => 'required'
			,'username' => 'required'
			,'password' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataPetugasRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(route_to("petugas.data_petugas"));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataPetugasRepo::detail($proses);
        return view("petugas/data_petugas/detail", $this->data);
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
