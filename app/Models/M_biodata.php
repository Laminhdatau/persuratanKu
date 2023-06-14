<?php

namespace App\Models;

use CodeIgniter\Model;

class M_biodata extends Model
{
    protected $table = 't_biodata';
    protected $primaryKey = 'id_biodata';
    protected $allowedFields = ['id_biodata', 'nama_lengkap','jk','alamat','tgl_lahir','agama','telp'];
}
