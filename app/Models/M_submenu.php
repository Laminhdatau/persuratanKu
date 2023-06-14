<?php

namespace App\Models;

use CodeIgniter\Model;

class M_submenu extends Model
{
    protected $table = 't_sub_menu';
    protected $primaryKey = 'id_sub_menu';
    protected $allowedFields = ['id_menu', 'title','url','url','is_active'];
}
