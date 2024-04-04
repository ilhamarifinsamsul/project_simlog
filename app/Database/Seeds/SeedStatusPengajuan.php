<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedStatusPengajuan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_status_pengajuan' => 'Pending',
            ],
            [
                'nama_status_pengajuan' => 'Done',
            ],
            [
                'nama_status_pengajuan' => 'Reject',
            ]
        ];

        $this->db->table('tb_status_pengajuan')->insertBatch($data);
    }
}
