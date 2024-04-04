<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedUser extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'staff',
                'nama_lengkap' => 'Kunkun',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'id_role' => 1,
                'created_at' => '2023-10-22 14:15:00.000',
                'updated_at' => '2023-10-22 14:15:00.000',
            ],
            [
                'username' => 'kasi',
                'nama_lengkap' => 'Sri',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'id_role' => 2,
                'created_at' => '2023-10-22 14:15:00.000',
                'updated_at' => '2023-10-22 14:15:00.000',
            ],
            [
                'username' => 'kabid',
                'nama_lengkap' => 'Deni',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'id_role' => 3,
                'created_at' => '2023-10-22 14:15:00.000',
                'updated_at' => '2023-10-22 14:15:00.000',
            ],
            [
                'username' => 'kadis',
                'nama_lengkap' => 'Deden',
                'password' => password_hash('123', PASSWORD_DEFAULT),
                'id_role' => 4,
                'created_at' => '2023-10-22 14:15:00.000',
                'updated_at' => '2023-10-22 14:15:00.000',
            ],
        ];
        $this->db->table('tb_user')->insertBatch($data);
    }
}
