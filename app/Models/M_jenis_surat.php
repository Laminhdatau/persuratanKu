<?php

namespace App\Models;

use CodeIgniter\Model;

class M_jenis_surat extends Model
{
    protected $table = 't_jenis_surat';
    protected $primaryKey = 'id_jenis_surat';
    protected $allowedFields = ['jenis_surat'];
}
