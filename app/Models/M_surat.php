<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat extends Model
{
    protected $table = 't_surat_lldikti';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'price', 'description'];

    public function getProduct($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }

    public function createProduct($data)
    {
        return $this->insert($data);
    }

    public function updateProduct($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProduct($id)
    {
        return $this->delete($id);
    }
}
