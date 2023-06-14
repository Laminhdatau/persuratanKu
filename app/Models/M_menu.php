<?php

namespace App\Models;

use CodeIgniter\Model;

class M_menu extends Model
{
    protected $table = 't_menu';
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['menu','id_jenis_surat'];
}
