<?php

namespace App\Controllers\petugas;

use App\Controllers\BaseController;
use App\Models\DataPetugas;
use App\RCore\Setting;

class Login extends BaseController
{
    public function index()
    {
        if ($this->request->getPost() == null) {
            return view("tmp/" . Setting::instance()->lg . '/login');
        }

        $username = $this->request->getPostGet('username');
        $password = $this->request->getPostGet('password');

        $session = session();
        $model = new DataPetugas();
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = $this->password_sama($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'petugas_id' => $data['id_petugas'],
                    'petugas_username' => $data['username'],
                    'petugas_logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(route_to('petugas.home'));
            } else {
                echo <<<html
<script >
    alert("Password salah");
</script>
html;
                return redirect()->to(route_to('petugas.login'));
            }
        } else {
            //            $session->setFlashdata('msg', 'Username not Found');
            echo <<<html
<script >
    alert("Username tidak ditemukan");
</script>
html;
            return redirect()->to(route_to('petugas.login'));
        }
    }

    public function password_sama($password, $pass)
    {
        return md5($password) == $pass;
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url(route_to('petugas.login')));
    }
}
