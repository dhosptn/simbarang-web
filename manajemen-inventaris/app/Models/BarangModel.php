<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $stokHistoryModel; // tambahkan ini

    protected $table      = 'barang';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nama_barang', 'kategori', 'stok', 'satuan', 'lokasi'];

    protected $useTimestamps = true;

    public function __construct()
    {
        parent::__construct(); // jangan lupa panggil constructor parent
    }
     
}