<?php

namespace App\Controllers\keluarga;

use App\Repo\keluarga\DataAnggotaKeluargaRepo;
use App\Controllers\BaseController;


class Daftar extends \App\Controllers\BaseController
{
    public function index()
    {
        return view("keluarga/home/daftar");
    }
    public function daftar()
    {

        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_daftar())) {
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
                \SweetAlert::alert_berhasil("Daftar Berhasil");
                return $this->response->redirect(base_url(route_to("keluarga.login")));
            }
        }
        return view('home/daftar', $this->data);
    }


    private function validate_daftar()
    {
        $rule = [
            'id_anggota_keluarga' => 'required', 'id_pasien' => 'required', 'nama' => 'required', 'alamat' => 'required', 'no_telepon' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }
}
