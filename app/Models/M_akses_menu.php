<?php

namespace App\Models;

use CodeIgniter\Model;

class M_akses_menu extends Model
{
    protected $table = 't_akses_menu';
    protected $primaryKey = 'id_akses_menu';
    protected $allowedFields = ['id_level', 'id_menu'];
}
