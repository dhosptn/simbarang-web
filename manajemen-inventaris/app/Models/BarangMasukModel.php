<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table      = 'barang_masuk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_barang', 'jumlah', 'tanggal'];

    public function getMasukWithBarang()
    {
        return $this->select('barang_masuk.*, barang.nama_barang')
                    ->join('barang', 'barang.id = barang_masuk.id_barang')
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
}