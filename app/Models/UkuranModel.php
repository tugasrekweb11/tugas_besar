<?php

use CodeIgniter\Model;

class UkuranModel extends Model
{
    // ini nama tabel dari Ukuran
    protected $table = 'ukuran';
    protected $primaryKey = 'id_ukuran';

    /// mengambil data dari ukuran
    public function getAll()
    {
        return $this->findAll();
    }
}
