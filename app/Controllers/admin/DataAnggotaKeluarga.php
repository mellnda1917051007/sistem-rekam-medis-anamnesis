<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Repo\admin\DataAnggotaKeluargaRepo;

class DataAnggotaKeluarga extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Anggota Keluarga';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_anggota_keluarga = DataAnggotaKeluargaRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_anggota_keluarga = DataAnggotaKeluargaRepo::tampil();
        }
        $this->data['data_anggota_keluarga'] = $data_anggota_keluarga->paginate(15);
        $this->data['pager'] = $data_anggota_keluarga->pager;
        $this->data['desc_tabel'] = DataAnggotaKeluargaRepo::desc_tabel();
        return view("admin/data_anggota_keluarga/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataAnggotaKeluargaRepo::simpan([
                    "id_anggota_keluarga" => $this->request->getPost("id_anggota_keluarga"),
                    "id_pasien" => $this->request->getPost("id_pasien"),
                    "nama" => $this->request->getPost("nama"),
                    "alamat" => $this->request->getPost("alamat"),
                    "no_telepon" => $this->request->getPost("no_telepon"),
                    "username" => $this->request->getPost("username"),
                    "password" => md5($this->request->getPost("password"))
                ]);
                \SweetAlert::alert_berhasil("Data Berhasil Ditambah");
                return $this->response->redirect(base_url(route_to("admin.data_anggota_keluarga")));
            }
        }
        return view("admin/data_anggota_keluarga/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_anggota_keluarga" => $this->request->getPost("id_anggota_keluarga")
                ];
                $forms = [
                    "id_pasien" => $this->request->getPost("id_pasien"),
                    "nama" => $this->request->getPost("nama"),
                    "alamat" => $this->request->getPost("alamat"),
                    "no_telepon" => $this->request->getPost("no_telepon"),
                    "username" => $this->request->getPost("username"),
                    "password" => $this->request->getPost("password")
                ];

                DataAnggotaKeluargaRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(base_url(route_to("admin.data_anggota_keluarga")));
            }
        }
        $this->data["data"] = DataAnggotaKeluargaRepo::detail($proses);
        return view("admin/data_anggota_keluarga/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataAnggotaKeluargaRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataAnggotaKeluargaRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataAnggotaKeluargaRepo::cetak_semua();
        }
        return view("admin/data_anggota_keluarga/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_anggota_keluarga' => 'required', 'id_pasien' => 'required', 'nama' => 'required', 'alamat' => 'required', 'no_telepon' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_anggota_keluarga' => 'required', 'id_pasien' => 'required', 'nama' => 'required', 'alamat' => 'required', 'no_telepon' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataAnggotaKeluargaRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(base_url(route_to("admin.data_anggota_keluarga")));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataAnggotaKeluargaRepo::detail($proses);
        return view("admin/data_anggota_keluarga/detail", $this->data);
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
