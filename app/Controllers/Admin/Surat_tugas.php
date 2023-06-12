<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Surat_tugas extends BaseController
{

   

    public function index()
    {
        $data['title'] = "Surat Tugas";
        return view('surat_tugas/surat_tugas',$data);
    }

}
