<?php

namespace App\Models;

use CodeIgniter\Model;

class M_formenu extends Model
{
    protected $table = 't_user_pegawai';
    protected $allowedFields = ['id_user', 'id_level', 'id_pegawai'];

    public function getUserPegawai($idUser)
    {
        return $this->where('id_user', $idUser)->first();
    }
}
