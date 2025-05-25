<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table      = 'barang_keluar';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id_barang', 'jumlah', 'tanggal'];

    public function getKeluarWithBarang()
    {
        return $this->select('barang_keluar.*, barang.nama_barang')
                    ->join('barang', 'barang.id = barang_keluar.id_barang')
                    ->orderBy('tanggal', 'DESC')
                    ->findAll();
    }
}