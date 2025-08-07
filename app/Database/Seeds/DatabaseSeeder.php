<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(JabatanSeeder::class);
        $this->call(LokasiPresensiSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
