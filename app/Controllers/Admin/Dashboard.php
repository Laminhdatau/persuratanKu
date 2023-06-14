<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Controllers\Auth\Auth;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = new Auth();

        return view('dashboard', $data);
    }

    // Contoh fung
}