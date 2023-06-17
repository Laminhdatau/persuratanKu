<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pegawai extends Model
{
    protected $table = 't_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['id_biodata', 'nip', 'pangkat', 'golongan', 'jabatan', 'id_instansi'];
}
