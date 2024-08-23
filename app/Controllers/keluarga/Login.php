<?php

namespace App\Controllers\keluarga;

use App\Controllers\BaseController;
use App\Models\DataAnggotaKeluarga;
use App\RCore\Setting_Keluarga;

class Login extends BaseController
{
    public function index()
    {
        if ($this->request->getPost() == null) {
            return view("tmp/" . Setting_Keluarga::instance()->lg . '/login');
        }

        $username = $this->request->getPostGet('username');
        $password = $this->request->getPostGet('password');

        $session = session();
        $model = new DataAnggotaKeluarga();
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = $this->password_sama($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'anggota_keluarga_id' => $data['id_anggota_keluarga'],
                    'anggota_keluarga_username' => $data['username'],
                    'anggota_keluarga_logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(route_to('keluarga.home'));
            } else {
                echo <<<html
<script >
    alert("Password salah");
</script>
html;
                return redirect()->to(route_to('keluarga.login'));
            }
        } else {
            //            $session->setFlashdata('msg', 'Username not Found');
            echo <<<html
<script >
    alert("Username tidak ditemukan");
</script>
html;
            return redirect()->to(route_to('keluarga.login'));
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
        return redirect()->to(base_url(route_to('keluarga.login')));
    }
}
