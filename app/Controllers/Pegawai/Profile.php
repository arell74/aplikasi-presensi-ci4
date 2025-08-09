<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\JabatanModel;
use App\Models\LokasiPresensiModel;
use App\Models\PegawaiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        $pegawai_model = new PegawaiModel();
        $id_pegawai = session()->get('id_pegawai');
        $jabatan_model = new JabatanModel();
        $lokasi_presensi_model = new LokasiPresensiModel();

        $data = [
            'title' => 'Profile',
            'pegawai' => $pegawai_model->where('id', $id_pegawai)->findAll(),
            'validation' => service('validation'),
            'jabatan' => $jabatan_model->findAll(),
            'id_pegawai' => $pegawai_model->where('id', $id_pegawai)->first(),
            'lokasi_presensi' => $lokasi_presensi_model->findAll(),
        ];

        return view('pegawai/profile/profile', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama Wajib Diisi!"
                ],
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jenis Kelamin Wajib Diisi!"
                ],
            ],
            'no_hp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nomor HP Wajib Diisi!"
                ],
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Alamat Wajib Diisi!"
                ],
            ],
            'lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Lokasi Presensi Wajib Diisi!"
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $jabatan = new JabatanModel();
            $pegawaiModel = new PegawaiModel();
            $lokasi_presensi = new LokasiPresensiModel();
            $data = [
                'title' => 'Edit Data Pegawai',
                'pegawai' => $pegawaiModel->editPegawai($id),
                'validation' => service('validation'),
                'lokasi_presensi' => $lokasi_presensi->findAll(),
                'jabatan' => $jabatan->orderBy('jabatan', 'ASC')->findAll(),
            ];

            return view('pegawai/profile', $data);
        } else {
            $pegawaiModel = new PegawaiModel();
            $foto = $this->request->getFile('foto_pegawai');

            if ($foto->getError() == 4) {
                $nama_foto = $this->request->getPost('foto_lama');
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move(FCPATH . 'profile', $nama_foto);

                // Hapus foto lama kalau ada
                $fotoLama = $this->request->getPost('foto_lama');
                if ($fotoLama && file_exists(FCPATH . 'profile/' . $fotoLama)) {
                    unlink(FCPATH . 'profile/' . $fotoLama);
                }
            }
            $pegawaiModel->update($id, [
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'lokasi_presensi' => $this->request->getPost('lokasi_presensi'),
                'foto_pegawai' => $nama_foto,
            ]);

            session()->setFlashdata('berhasil', 'Data Pegawai Berhasil Diupdate!');

            session()->set('foto_pegawai', $nama_foto);

            return redirect()->to(base_url('pegawai/profile'));
        }
    }
}
