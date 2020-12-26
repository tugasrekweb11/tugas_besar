<?php

use CodeIgniter\Model;

class JenisModel extends Model
{
    // ini nama tabel dari jenis
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';

    /// mengambil data dari jenis
    public function getAll()
    {
        return $this->findAll();
    }
}
