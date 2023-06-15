<?php

namespace App\Controllers\Super;

use App\Models\M_menu;
use App\Controllers\BaseController;

class Menu extends BaseController
{
    // protected $akuHelper;

    // public function __construct()
    // {
    //     $this->akuHelper = new AkuHelper();
    // }

    public function index()
    {

        $m_menu = new M_menu();
        $menu = $m_menu->findAll();

        // Pass the menu data to the view
        $data['title'] = "Menu";
        $data['menu'] = $menu;

        // Load the view and pass the data
        return view('menu/menu', $data);
    }


    public function create()
    {
        $m_menu = new M_menu();

        $data = [
            'id_menu' => $this->request->getPost('id_menu'),
            'menu' => $this->request->getPost('menu')
        ];
        $m_menu->insert($data);
        return redirect()->to(base_url('menu'))->with('success', 'Data berhasil disimpan.');
    }

    public function update()
    {
        $m_menu = new M_menu();
        $id = $this->request->getPost('id_menu');
        $data = [
            'menu' => $this->request->getPost('menu')
        ];
        $m_menu->update($id, $data);

        // Return a success message
        return redirect()->to(base_url('menu'))->with('success', 'Data Berhasil di update');
    }

    public function delete()
    {
        $m_menu = new M_menu();
        $id = $this->request->getPost('id_menu');

        $m_menu->where('id_menu', $id)->delete();

        // Return a success message
        return redirect()->to(base_url('menu'))->with('success', 'Data is deleted');
    }
}
