<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class Surat_keluar extends BaseController
{


    public function index()
    {
        $data['title'] = "Surat Keluar";
        return view('public/lldikti/surat_keluar', $data);
    }

    public function suratKeluarp()
    {
        $data['title'] = "Surat Keluar";
        return view('public/pts/surat_keluar', $data);
    }
}
