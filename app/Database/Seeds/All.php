<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class All extends Seeder
{
    public function run()
    {
        $this->call('SeedUser');
        $this->call('SeedRole');
        $this->call('SeedBarangKategori');
        $this->call('SeedSatuanBarang');
        $this->call('SeedStatus');
        $this->call('SeedStatusPengajuan');
    }
}
