<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_user;

class User extends BaseController
{


    public function index()
    {
        $M_user = new M_user();
        $query = $M_user->query("SELECT *
        FROM db_persuratan.t_user_pegawai
        JOIN db_pegawai.t_pegawai ON db_pegawai.t_pegawai.id_pegawai = db_persuratan.t_user_pegawai.id_pegawai
        JOIN db_persuratan.users AS u ON u.id = db_persuratan.t_user_pegawai.id_user
        JOIN db_persuratan.auth_groups AS g ON g.id = db_persuratan.t_user_pegawai.id_auth_group");

        $users = $query->getResultArray();


        $data = [
            'title' => 'Users',
            'users' => $users
        ];


        // dd($data);

        return view('private/manuser/users', $data);
    }

    public function create()
    {
        $M_user = new M_user();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $M_user->createUser($data);

        return redirect()->to(base_url('admin/user'))->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $M_user = new M_user();
        $user = $M_user->getUserById($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $data = [
            'title' => 'Edit User',
            'user' => $user
        ];

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $M_user = new M_user();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        $M_user->updateUser($id, $data);

        return redirect()->to(base_url('admin/user'))->with('success', 'User updated successfully.');
    }

    public function delete($id)
    {
        $M_user = new M_user();
        $M_user->deleteUser($id);

        return redirect()->to(base_url('admin/user'))->with('success', 'User deleted successfully.');
    }
}
