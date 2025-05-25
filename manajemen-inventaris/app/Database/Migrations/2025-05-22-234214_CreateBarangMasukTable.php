<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangMasukTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id'          => [
            'type'           => 'INT',
            'unsigned'       => true,
            'auto_increment' => true,
        ],
        'id_barang'   => [
            'type'       => 'INT',
            'unsigned'   => true,
        ],
        'jumlah'      => [
            'type'       => 'INT',
            'unsigned'   => true,
        ],
        'tanggal'     => [
            'type'       => 'DATETIME',
            'null'       => false,
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('id_barang', 'barang', 'id', 'CASCADE', 'CASCADE');
    $this->forge->createTable('barang_masuk');
}

    public function down()
    {
        $this->forge->dropTable('barang_masuk');
    }
}