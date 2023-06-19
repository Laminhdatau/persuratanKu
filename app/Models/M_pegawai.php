<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pegawai extends Model
{
    protected $DBGroup = 'secondary'; // Menetapkan koneksi database 'secondary'
    protected $table = 't_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nama_lengkap', 'foto', 'nip', 'golongan', 'jabatan', 'unit_kerja', 'tanggal_lahir', 'jenis_kelamin', 'pendidikan_terakhir', 'alamat'];
    public function getPegawaiById($idPegawai)
    {
        return $this->find($idPegawai);
    }
}
