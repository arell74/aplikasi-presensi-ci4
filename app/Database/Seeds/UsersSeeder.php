<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Contoh 1 user admin (pastikan id_pegawai sudah ada di tabel pegawai)
        $data = [
            [
                'id_pegawai' => 1, // Pastikan ini ID valid dari tabel pegawai
                'username'   => 'admin',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'status'     => 'aktif',
                'role'       => 'Admin'
            ],
            [
                'id_pegawai' => 2,
                'username' => 'raiden',
                'password' => password_hash('pegawai123', PASSWORD_DEFAULT),
                'status' => 'aktif',
                'role' => 'Admin'
            ]
        ];

        // Insert ke tabel users
        $this->db->table('users')->insertBatch($data);
    }
}
