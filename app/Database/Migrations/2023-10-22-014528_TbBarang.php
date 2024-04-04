<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => '256'
            ],
            'id_kategori' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'id_satuan' => [
                'type'           => 'INT',
                'constraint' => 11
            ],
            'kondisi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_barang', true);
        $this->forge->createTable('tb_barang');
    }

    public function down()
    {
        $this->forge->dropTable('tb_barang');
    }
}
