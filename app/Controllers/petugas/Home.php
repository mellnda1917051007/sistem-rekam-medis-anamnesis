<?php

namespace App\Controllers\petugas;

class Home extends \App\Controllers\BaseController
{
    public function index()
    {
        return view("petugas/home/home");
    }
}
