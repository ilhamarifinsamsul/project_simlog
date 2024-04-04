<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPenerimaanBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penerimaan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_barang' => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            // 'id_kategori' => [
            //     'type'           => 'INT',
            //     'constraint'     => 11,
            // ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // 'id_satuan' => [
            //     'type'           => 'INT',
            //     'constraint' => 11
            // ],
            'tanggal' => [
                'type'           => 'DATETIME',
            ],
            'id_status' => [
                'type'           => 'INT',
                'constraint' => 11
            ],

            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_penerimaan', true);
        $this->forge->createTable('tb_penerimaan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_penerimaan');
    }
}
