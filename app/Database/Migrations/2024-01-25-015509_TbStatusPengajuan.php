<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbStatusPengajuan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_status_pengajuan' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_status_pengajuan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id_status_pengajuan', true);
        $this->forge->createTable('tb_status_pengajuan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_status_pengajuan');
    }
}
