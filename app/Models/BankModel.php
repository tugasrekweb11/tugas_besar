<?php

use CodeIgniter\Model;

class BankModel extends Model
{
    // ini nama tabel dari bank
    protected $table = 'bank';
    protected $primaryKey = 'id_bank';

    /// mengambil data dari bank
    public function getAll()
    {
        return $this->findAll();
    }
}
