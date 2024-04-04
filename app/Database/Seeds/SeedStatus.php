<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedStatus extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_status' => 'Belum Verifikasi',
            ],
            [
                'nama_status' => 'Sudah Verifikasi',
            ]
        ];


        $this->db->table('tb_status')->insertBatch($data);
    }
}
