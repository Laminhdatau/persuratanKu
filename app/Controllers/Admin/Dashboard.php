<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\M_pegawai;
use \App\Models\M_userpegawai;

class Dashboard extends BaseController
{
    public function index()
    {
        $m_menu = new M_userpegawai();
        $m_pegawai = new M_pegawai(); // Gunakan model M_pegawai

        $menu = $m_menu->findAll();
        $pegawai = $m_pegawai->findAll(); // Ambil data pegawai dari model M_pegawai

        $data['title'] = "Dashboard";
        $data['menu'] = $menu;
        $data['pegawai'] = $pegawai;
        // dd($data);
        return view('dashboard', $data);
    }
}
