<?php

namespace App\Models;

use CodeIgniter\Model;

class M_surat extends Model
{
    protected $table = 't_surat_lldikti';
    protected $primaryKey = 'id_surat_lldikti';
    protected $allowedFields = ['id_reff_surat', 'id_sifat', 'tgl_surat', 'id_jenis_surat', 'id_instansi', 'id_status', 'tembusan', 'filex'];

    public function getSurat($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }

    public function createSurat($data)
    {
        return $this->insert($data);
    }

    public function updateSurat($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSurat($id)
    {
        return $this->delete($id);
    }
}
