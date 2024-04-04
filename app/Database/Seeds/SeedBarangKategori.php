<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedBarangKategori extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_kategori' => 'Sandang',
            ],
            [
                'nama_kategori' => 'Pangan',
            ],
            [
                'nama_kategori' => 'Perlengkapan',
            ],
        ];

        $this->db->table('tb_kategori')->insertbatch($data);
    }
}
