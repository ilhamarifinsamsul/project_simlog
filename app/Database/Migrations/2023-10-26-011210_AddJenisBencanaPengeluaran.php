<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddJenisBencanaPengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tb_pengeluaran', [
            'jenis_bencana' => [
                'type'           => 'VARCHAR',
                'constraint'     => '200',
                'after'          => 'alamat'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tb_pengeluaran', 'jenis_bencana');
    }
}
