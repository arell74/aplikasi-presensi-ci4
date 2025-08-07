<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Contoh 1 user admin (pastikan id_pegawai sudah ada di tabel pegawai)
        $data = [
            'id_pegawai' => 1, // Pastikan ini ID valid dari tabel pegawai
            'username'   => 'admin',
            'password'   => password_hash('raidenshogun', PASSWORD_DEFAULT),
            'status'     => 'aktif',
            'role'       => 'Admin'
        ];

        // Insert ke tabel users
        $this->db->table('users')->insert($data);
    }
}
