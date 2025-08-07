<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LokasiPresensiSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_lokasi'    => 'Kantor Pusat',
                'alamat_lokasi'  => 'Link. Mukti Kel. Windusengkahan RT 11 RW 04',
                'tipe_lokasi'    => 'Kantor Pusat',
                'latitude'       => '-6.983659369502531',
                'longitude'      => '108.50359389944383',
                'radius'         => 50, 
                'zona_waktu'     => 'WIB',
                'jam_masuk'      => '08:00:00',
                'jam_pulang'     => '17:00:00',
            ],
            [
                'nama_lokasi'    => 'Kantor Cabang Bandung',
                'alamat_lokasi'  => 'Jl. Rinascita Fontaine No.10, Bandung',
                'tipe_lokasi'    => 'Cabang',
                'latitude'       => '-6.983659369502531',
                'longitude'      => '108.50359389944383',
                'radius'         => 50,
                'zona_waktu'     => 'WIB',
                'jam_masuk'      => '08:00:00',
                'jam_pulang'     => '17:00:00',
            ]
        ];

        $this->db->table('lokasi_presensi')->insertBatch($data);
    }
}
