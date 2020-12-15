<?php

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // ini nama tabel dari kategori
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';

    /// mengambil data dari kategori
    public function getAll()
    {
        return $this->findAll();
    }
}
