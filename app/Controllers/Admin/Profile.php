<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        $pegawai_model = new PegawaiModel();
        $id_pegawai = session()->get('id_pegawai');

        $data = [
            'title' => 'Profile',
            'pegawai' => $pegawai_model->where('id', $id_pegawai)->findAll()
        ];
        return view('admin/profile/index', $data);
    }
}
