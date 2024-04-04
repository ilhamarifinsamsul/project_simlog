<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPengeluaranBarang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran' => [
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
            //     'type'       => 'INT',
            //     'constraint' => 11
            // ],
            'jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            // 'id_satuan' => [
            //     'type'       => 'INT',
            //     'constraint' => 11
            // ],
            'tanggal' => [
                'type'           => 'DATE',
            ],
            'nama_penerima' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => true
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => true
            ],
            'jenis_bencana' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => true
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '256'
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
                'null' => true
            ],
            'id_status' => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'created_at' => [
                'type'           => 'DATETIME',
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
            ],
        ]);

        $this->forge->addKey('id_pengeluaran', true);
        $this->forge->createTable('tb_pengeluaran');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengeluaran');
    }
}
