<?php

namespace App\Models;

use CodeIgniter\Model;

class M_level extends Model
{
    protected $table = 't_level';
    protected $primaryKey = 'id_level';
    protected $allowedFields = ['id_level', 'level'];
}
