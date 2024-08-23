<?php

namespace App\Controllers\keluarga;

class Home extends \App\Controllers\BaseController
{
    public function index()
    {
        return view("keluarga/home/home");
    }
}
