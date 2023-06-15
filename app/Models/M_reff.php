<?php

namespace App\Models;

use CodeIgniter\Model;

class M_reff extends Model
{
    protected $table = 't_reff_surat';
    protected $primaryKey = 'id_reff_surat';
    protected $allowedFields = ['nomor_surat', 'perihal'];
}
