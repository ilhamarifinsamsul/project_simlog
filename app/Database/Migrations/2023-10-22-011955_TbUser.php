<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_lengkap' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'id_role' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
