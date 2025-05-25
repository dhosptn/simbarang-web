<?php

namespace App\Models;

use CodeIgniter\Model;

class StokHistoryModel extends Model
{
    protected $table = 'stok_history';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'jenis', 'jumlah', 'tanggal', 'keterangan'];
    protected $useTimestamps = false; // Kalau kamu mau pakai created_at bisa juga
}