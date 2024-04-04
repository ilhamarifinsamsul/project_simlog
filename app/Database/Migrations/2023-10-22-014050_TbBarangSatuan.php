<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbBarangSatuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_satuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_satuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_satuan', true);
        $this->forge->createTable('tb_satuan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_satuan');
    }
}
