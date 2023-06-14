<?php

namespace App\Controllers\Auth;

use App\Models\M_level;
use App\Models\M_user;
use App\Models\M_biodata;
use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        // Tampilkan halaman login
        $data['title'] = "Login";
        return view('auth/login', $data);
    }

    public function prosesLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Buat instansi model TUserModel
        $userModel = new M_user();

        // Cari user berdasarkan email
        $user = $userModel->where('email', $email)->first();

        // Jika user ditemukan dan password cocok
        if ($user && $user['password']) {
            // Buat instansi model TLevelModel
            $levelModel = new M_level();
            $biodata = new M_biodata();
            // $level = session('id_level');


            // Cari level user berdasarkan id_level
            $level = $levelModel->find($user['id_level']);
            $bio = $biodata->find($user['id_biodata']);
            // dd($level);
            // Simpan data user yang login ke session
            $session = session();
            $session->set([
                'id_user' => $user['id_user'],
                'email' => $user['email'],
                'level' => $level['level'],
                'id_level' => $level['id_level'],
                'foto' => $user['foto'],
                'nama_lengkap' => $bio['nama_lengkap']
            ]);

            // var_dump($user);
            // Redirect ke halaman setelah login sukses
            return redirect()->to('dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withInput()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        // Hapus data user dari session
        $session = session();
        $session->destroy();

        // Redirect ke halaman login setelah logout
        return redirect()->to('/');
    }
}
