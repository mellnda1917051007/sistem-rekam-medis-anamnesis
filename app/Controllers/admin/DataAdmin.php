<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Repo\admin\DataAdminRepo;

class DataAdmin extends BaseController
{

    public function __construct()
    {
        $this->data['nama_halaman'] = 'Data Admin';
    }

    public function index()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        if ($berdasarkan && $isi) {
            $data_admin = DataAdminRepo::tampil_berdasarkan($berdasarkan, $isi);
        } else {
            $data_admin = DataAdminRepo::tampil();
        }
        $this->data['data_admin'] = $data_admin->paginate(15);
        $this->data['pager'] = $data_admin->pager;
        $this->data['desc_tabel'] = DataAdminRepo::desc_tabel();
        return view("admin/data_admin/tampil", $this->data);
    }

    public function tambah()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_simpan())) {
                $this->data['validation'] = $this->validator;
            } else {
                $hashed_password = hash('md5', $this->request->getPost('password'));
                DataAdminRepo::simpan([
                    "id_admin" => $this->request->getPost("id_admin"),
                    "username" => $this->request->getPost("username"),
                    "password" => $hashed_password
                ]);
                \SweetAlert::alert_berhasil("Data berhasil disimpan");
                return $this->response->redirect(base_url(route_to("admin.data_admin")));
            }
        }
        return view("admin/data_admin/tambah", $this->data);
    }

    public function edit()
    {
        $proses = $this->request->getPostGet("proses");
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_edit())) {
                $this->data['validation'] = $this->validator;
            } else {
                $where = [
                    "id_admin" => $this->request->getPost("id_admin")
                ];
                $forms = [
                    "username" => $this->request->getPost("username"),
                    "password" => $this->request->getPost("password")
                ];

                DataAdminRepo::ubah(
                    $where,
                    $forms
                );
                \SweetAlert::alert_berhasil("Data berhasil diubah");
                return $this->response->redirect(base_url(route_to("admin.data_admin")));
            }
        }
        $this->data["data"] = DataAdminRepo::detail($proses);
        return view("admin/data_admin/edit", $this->data);
    }


    public function cetak()
    {
        $berdasarkan = $this->request->getPostGet("Berdasarkan");
        $isi = $this->request->getPostGet("isi");
        $tanggal1 = $this->request->getPostGet("tanggal1");
        $tanggal2 = $this->request->getPostGet("tanggal2");
        if ($berdasarkan) {
            if ($tanggal1) {
                $this->data['datas'] = DataAdminRepo::cetak_berdasarkan_tanggal($berdasarkan, $tanggal1, $tanggal2);
            } else {
                $this->data['datas'] = DataAdminRepo::cetak_berdasarkan($berdasarkan, $isi);
            }
        } else {
            $this->data['datas'] = DataAdminRepo::cetak_semua();
        }
        return view("admin/data_admin/cetak", $this->data);
    }

    private function validate_edit()
    {
        $rule = [
            'id_admin' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }

    private function validate_simpan()
    {
        $rule = [
            'id_admin' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }

    public function hapus($proses)
    {
        DataAdminRepo::hapus($proses);
        $this->session->setFlashData("pesan", "Data berhasil dihapus");
        return $this->response->redirect(base_url(route_to("admin.data_admin")));
    }

    public function detail()
    {
        $proses = $this->request->getPostGet("proses");
        $this->data['data'] = DataAdminRepo::detail($proses);
        return view("admin/data_admin/detail", $this->data);
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
