<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JabatanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['jabatan' => 'Administrator'],
            ['jabatan' => 'Manajer'],
            ['jabatan' => 'Staff'],
            ['jabatan' => 'HRD'],
            ['jabatan' => 'Keuangan'],
            ['jabatan' => 'IT Support'],
        ];

        $this->db->table('jabatan')->insertBatch($data);
    }
}
