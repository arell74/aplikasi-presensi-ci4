<?php

namespace App\Database\Seeds;

use App\Models\PegawaiModel;
use CodeIgniter\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run()
    {
        $pegawaiModel = new PegawaiModel();

        $data = [
            [
                'nip'            => 'PEG-0001',
                'nama'           => 'Admin Utama',
                'jenis_kelamin'  => 'Laki-laki',
                'alamat'         => 'Jl. Merdeka No.1',
                'no_hp'          => '081234567890',
                'jabatan'        => 'Administrator',
                'lokasi_presensi' => 'Kantor Pusat',
                'foto_pegawai'   => 'zani.jpg',
            ],
            [
            'nip'            => 'PEG-0002',
            'nama'           => 'Pegawai',
            'jenis_kelamin'  => 'Perempuan',
            'alamat'         => 'Jl. Merdeka No.1',
            'no_hp'          => '081234567890',
            'jabatan'        => 'IT Support',
            'lokasi_presensi' => 'Kantor Pusat',
            'foto_pegawai'   => 'zani.jpg',
            ]
        ];

        $this->db->table('pegawai')->insertBatch($data);
    }
}
