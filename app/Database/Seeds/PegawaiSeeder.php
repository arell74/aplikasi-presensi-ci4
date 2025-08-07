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
            'nip'            => $pegawaiModel->generateNIP(),
            'nama'           => 'Admin Utama',
            'jenis_kelamin'  => 'Laki-laki',
            'alamat'         => 'Jl. Merdeka No.1',
            'no_hp'          => '081234567890',
            'jabatan'        => 'Administrator',
            'lokasi_presensi'=> 'Kantor Pusat',
            'foto_pegawai'   => 'zani.jpg',
        ];

        $pegawaiModel->insert($data);
    }
}
