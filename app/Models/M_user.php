<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table = 't_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'id_biodata', 'email','foto', 'id_level', 'password'];
}
