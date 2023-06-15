<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Nota_dinas extends BaseController
{
    public function index()
    {
        $data['title'] = "Nota Dinas";
        return view('nota_dinas/nota_dinas', $data);
    }
}
