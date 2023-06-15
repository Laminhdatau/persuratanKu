<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Surat_masuk extends BaseController
{

   

    public function index()
    {
        $data['title'] = "Surat Masuk";
        return view('surat_masuk/surat_masuk',$data);
    }

    public function suratMasukp()
    {
        $data['title'] = "Surat Masuk";
        return view('surat_masuk/surat_masuk',$data);
    }

}
