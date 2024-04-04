<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedRole extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_role' => 'staff',
            ],
            [
                'nama_role' => 'kasi',
            ],
            [
                'nama_role' => 'kabid',
            ],
            [
                'nama_role' => 'kadis',
            ],
            [
                'nama_role' => 'desa'
            ]
        ];

        $this->db->table('tb_role')->insertbatch($data);
    }
}
