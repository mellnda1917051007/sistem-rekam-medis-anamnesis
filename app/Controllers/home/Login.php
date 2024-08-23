<?php

namespace App\Controllers\home;

use App\Controllers\BaseController;
use App\Models\DataPelanggan;
use App\Repo\pelanggan\DataPelangganRepo;

class Login extends BaseController
{
    public function index()
    {
        if ($this->request->getPost() == null) {
            return view("home/login");
        }

        $username = $this->request->getPostGet('username');
        $password = $this->request->getPostGet('password');

        $session = session();
        $model = new DataPelanggan();
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = $this->password_sama($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'home_id' => $data['id_pelanggan'],
                    'home_username' => $data['username'],
                    'home_logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(route_to('home.produk'));
            } else {
                //                $session->setFlashdata('msg', 'Wrong Password');
                echo <<<html
<script >
    alert("Password salah");
</script>
html;
                return redirect()->to(route_to('home.login'));
            }
        } else {
            //            $session->setFlashdata('msg', 'Username not Found');
            echo <<<html
<script >
    alert("Username tidak ditemukan");
</script>
html;
            return redirect()->to(route_to('home.login'));
        }
    }

    public function daftar()
    {
        if ($this->request->getPost()) {
            if (!$this->validate($this->validate_daftar())) {
                $this->data['validation'] = $this->validator;
            } else {
                DataPelangganRepo::simpan([
                    "id_pelanggan" => $this->request->getPost("id_pelanggan"),
                    "nama_pelanggan" => $this->request->getPost("nama_pelanggan"),
                    "alamat" => $this->request->getPost("alamat"),
                    "jenis_kelamin" => $this->request->getPost("jenis_kelamin"),
                    "no_telepon" => $this->request->getPost("no_telepon"),
                    "email" => $this->request->getPost("email"),
                    "username" => $this->request->getPost("username"),
                    "password" => md5($this->request->getPost("password"))
                ]);
                $url_login = route_to("home.login");
                echo <<<html
<script >
    alert("Pendaftaran berhasil silahkan login");
    window.location = "$url_login";
</script>
html;
            }
        }
        return view('home/daftar', $this->data);
    }


    private function validate_daftar()
    {
        $rule = [
            'id_pelanggan' => 'required', 'nama_pelanggan' => 'required', 'alamat' => 'required', 'jenis_kelamin' => 'required', 'no_telepon' => 'required', 'email' => 'required', 'username' => 'required', 'password' => 'required'
        ];
        return $rule;
    }

    public function password_sama($password, $pass)
    {
        return md5($password) == $pass;
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
