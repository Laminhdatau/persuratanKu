<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use App\Models\M_user;
class User extends BaseController
{


    public function index()
    {
        $db = \Config\Database::connect();

        $query = $db->query('SELECT u.id_user,u.foto,u.email,u.password,p.id_pegawai,p.nip,p.nip,p.pangkat,p.golongan,p.jabatan,p.id_instansi,b.id_biodata,b.nama_lengkap,b.telp,i.nm_instansi
        from t_user u
        ,t_pegawai p 
        ,t_biodata b 
        ,t_instansi i
        where u.id_biodata=b.id_biodata
        and p.id_biodata=b.id_biodata
        and i.id_instansi=p.id_instansi;');

        $user = $query->getResultArray();

        $data['title'] = "Menu";
        $data['user'] = $user;

        return view('menu/menu', $data);
    }


    public function create()
    {
        $m_user = new M_user();

        $data = [
            'id_user' => $this->request->getPost('id_user'),
            'menu' => $this->request->getPost('menu')
        ];
        $m_user->insert($data);
        return redirect()->to(base_url('menu'))->with('success', 'Data berhasil disimpan.');
    }

    public function update()
    {
        $m_user = new M_user();
        $id = $this->request->getPost('id_menu');
        $data = [
            'menu' => $this->request->getPost('menu')
        ];
        $m_user->update($id, $data);

        // Return a success message
        return redirect()->to(base_url('menu'))->with('success', 'Data Berhasil di update');
    }

    public function delete()
    {
        $m_user = new M_user();
        $id = $this->request->getPost('id_menu');

        $m_user->where('id_menu', $id)->delete();

        // Return a success message
        return redirect()->to(base_url('menu'))->with('success', 'Data is deleted');
    }
}
