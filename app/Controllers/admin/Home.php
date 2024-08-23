<?php

namespace App\Controllers\admin;

class Home extends \App\Controllers\BaseController
{
    public function index()
    {
        return view("admin/home/home");
    }
}