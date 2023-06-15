<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Surat_keluar extends BaseController
{


    public function index()
    {
        $data['title'] = "Surat Keluar";
        return view('surat_keluar/surat_keluar', $data);
    }

    public function suratKeluarp()
    {
        $data['title'] = "Surat Masuk";
        return view('surat_masuk/surat_masuk', $data);
    }
}
