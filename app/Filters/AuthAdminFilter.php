<?php

namespace App\Filters;

use App\Repo\admin\DataAdminRepo;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('admin_logged_in') != TRUE) {
            return redirect()->to(base_url('/admin/login'))->with('error', "Invalid Credential");
        }
        $id_admin = session()->get('admin_id');
        $admin = DataAdminRepo::get_data_admin($id_admin);
        if ($admin == null) {
            return redirect()->to(base_url('/admin/login'))->with('error', "Invalid Credential");
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
