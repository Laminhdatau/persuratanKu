<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;

class Nota_dinas extends BaseController
{
    public function index()
    {
        $data['title'] = "Nota Dinas";
        return view('public/lldikti/nota_dinas', $data);
    }
}
