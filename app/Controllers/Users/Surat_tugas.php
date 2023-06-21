<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class Surat_tugas extends BaseController
{



    public function index()
    {
        $data['title'] = "Surat Tugas";
        return view('public/lldikti/surat_tugas', $data);
    }

   
}
