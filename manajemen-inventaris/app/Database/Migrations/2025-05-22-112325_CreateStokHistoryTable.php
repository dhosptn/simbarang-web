<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStokHistoryTable extends Migration
{
   public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'barang_id'      => ['type' => 'INT', 'unsigned' => true],
            'jenis'          => ['type' => 'ENUM', 'constraint' => ['masuk', 'keluar']],
            'jumlah'         => ['type' => 'INT', 'unsigned' => true],
            'tanggal'        => ['type' => 'DATETIME', 'null' => false],
            'keterangan'     => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('barang_id', 'barang', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stok_history');
    }

    public function down()
    {
        $this->forge->dropTable('stok_history');
    }
}