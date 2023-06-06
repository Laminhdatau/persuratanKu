<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{

    public function index()
    {
        $data['title'] = "Dashboard";
        return view('dashboard',$data);
    }

    public function surat_masuk()
    {
        $data['title'] = "Surat Masuk";
        return view('surat_masuk/surat_masuk',$data);
    }
}
