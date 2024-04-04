<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedSatuanBarang extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_satuan' => 'Pcs',
            ],
            [
                'nama_satuan' => 'Dus',
            ],
            [
                'nama_satuan' => 'Kaleng',
            ],
        ];

        $this->db->table('tb_satuan')->insertBatch($data);
    }
}
