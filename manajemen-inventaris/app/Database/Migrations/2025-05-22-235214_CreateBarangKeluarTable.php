<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangKeluarTable extends Migration
{
  public function up()
{
    $this->forge->addField([
        'id' => [
            'type'           => 'INT',
            'constraint'     => 11,
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_barang' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
        ],
        'jumlah' => [
            'type'       => 'INT',
            'constraint' => 11,
            'unsigned'   => true,
        ],
        'tanggal' => [
            'type' => 'DATETIME',
            'null' => false,
        ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('id_barang', 'barang', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('barang_keluar');
}


public function down()
{
    $this->forge->dropTable('barang_keluar');
}

}