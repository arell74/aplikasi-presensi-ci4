<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PegawaiModel;
use App\Models\UserModel;

class DataPegawai extends BaseController
{
    public function index()
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $pegawaiModel->findAll()
        ];

        return view('admin/data_pegawai/data_pegawai', $data);
    }

    public function detail($id)
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            'title' => 'Detail Lokasi Presensi',
            'data_pegawai' => $pegawaiModel->detailPegawai($id)
        ];
        return view('admin/data_pegawai/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Lokasi Presensi',
            'validation' => service('validation')
        ];

        return view('admin/lokasi_presensi/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama Lokasi Wajib Diisi!"
                ],
            ],
            'alamat_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Alamat Lokasi Wajib Diisi!"
                ],
            ],
            'tipe_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Tipe Lokasi Wajib Diisi!"
                ],
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Latitude Wajib Diisi!"
                ],
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Longitude Wajib Diisi!"
                ],
            ],
            'radius' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Radius Wajib Diisi!"
                ],
            ],
            'zona_waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Zona Waktu Wajib Diisi!"
                ],
            ],
            'jam_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jam Masuk Wajib Diisi!"
                ],
            ],
            'jam_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jam Pulang Wajib Diisi!"
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $data = [
                'title' => 'Tambah Data Lokasi Presensi',
                'validation' => service('validation')
            ];
            echo view('admin/lokasi_presensi/create', $data);
        } else {
            $pegawaiModel = new PegawaiModel();
            $pegawaiModel->insert([
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'tipe_lokasi' => $this->request->getPost('tipe_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'zona_waktu' => $this->request->getPost('zona_waktu'),
                'jam_masuk' => $this->request->getPost('jam_masuk'),
                'jam_pulang' => $this->request->getPost('jam_pulang'),
            ]);

            session()->setFlashdata('berhasil', 'Data Lokasi Presensi Berhasil Tersimpan');

            return redirect()->to(base_url('admin/lokasi_presensi'));
        }
    }

    public function edit($id)
    {
        $pegawaiModel = new PegawaiModel();
        $data = [
            'title' => 'Edit Data Lokasi Presensi',
            'lokasi_presensi' => $pegawaiModel->find($id),
            'validation' => service('validation')
        ];

        return view('admin/lokasi_presensi/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'nama_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Nama Lokasi Wajib Diisi!"
                ],
            ],
            'alamat_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Alamat Lokasi Wajib Diisi!"
                ],
            ],
            'tipe_lokasi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Tipe Lokasi Wajib Diisi!"
                ],
            ],
            'latitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Latitude Wajib Diisi!"
                ],
            ],
            'longitude' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Longitude Wajib Diisi!"
                ],
            ],
            'radius' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Radius Wajib Diisi!"
                ],
            ],
            'zona_waktu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Zona Waktu Wajib Diisi!"
                ],
            ],
            'jam_masuk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jam Masuk Wajib Diisi!"
                ],
            ],
            'jam_pulang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jam Pulang Wajib Diisi!"
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $pegawaiModel = new PegawaiModel();
            $data = [
                'title' => 'Edit Data Lokasi Presensi',
                'lokasi_presensi' => $pegawaiModel->find($id),
                'validation' => service('validation')
            ];
            echo view('admin/lokasi_presensi/edit', $data);
        } else {
            $pegawaiModel = new pegawaiModel();
            $pegawaiModel->update($id, [
                'nama_lokasi' => $this->request->getPost('nama_lokasi'),
                'alamat_lokasi' => $this->request->getPost('alamat_lokasi'),
                'tipe_lokasi' => $this->request->getPost('tipe_lokasi'),
                'latitude' => $this->request->getPost('latitude'),
                'longitude' => $this->request->getPost('longitude'),
                'radius' => $this->request->getPost('radius'),
                'zona_waktu' => $this->request->getPost('zona_waktu'),
                'jam_masuk' => $this->request->getPost('jam_masuk'),
                'jam_pulang' => $this->request->getPost('jam_pulang'),
            ]);

            session()->setFlashdata('berhasil', 'Data Lokasi Presensi Berhasil Diupdate!');

            return redirect()->to(base_url('admin/lokasi_presensi'));
        }
    }

    public function delete($id)
    {
        $pegawaiModel = new PegawaiModel();

        $lokasi_presensi = $pegawaiModel->find($id);
        if($lokasi_presensi) {
            $pegawaiModel->delete($id);

            session()->setFlashdata('berhasil', 'Data Lokasi Presensi Berhasil Dihapus!');

            return redirect()->to(base_url('admin/lokasi_presensi'));
        }
    }
}
