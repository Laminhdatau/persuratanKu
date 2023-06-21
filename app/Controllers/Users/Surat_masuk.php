<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class Surat_masuk extends BaseController
{

   

    public function index()
    {
        $data['title'] = "Surat Masuk";
        return view('public/lldikti/surat_masuk',$data);
    }

    public function suratMasukp()
    {
        $data['title'] = "Surat Masuk";
        return view('public/pts/surat_masuk',$data);
    }

}
