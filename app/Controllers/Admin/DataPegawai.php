<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\LokasiPresensiModel;
use App\Models\JabatanModel;
use App\Models\RoleModel;

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
            'title' => 'Detail Pegawai',
            'data_pegawai' => $pegawaiModel->detailPegawai($id)
        ];
        return view('admin/data_pegawai/detail', $data);
    }

    public function create()
    {
        $jabatan = new JabatanModel();
        $lokasi_presensi = new LokasiPresensiModel();
        $role = new RoleModel();
        $data = [
            'title' => 'Tambah Data Pegawai',
            'validation' => service('validation'),
            'lokasi_presensi' => $lokasi_presensi->findAll(),
            'jabatan' => $jabatan->orderBy('jabatan', 'ASC')->findAll(),
            'role' => $role->findAll()
        ];

        return view('admin/data_pegawai/create', $data);
    }

    public function generateNIP()
    {
        $pegawai = new PegawaiModel();
        $pegawaiTerakhir = $pegawai->select('nip')->orderBy('id', 'DESC')->first();
        $nipTerakhir = $pegawaiTerakhir ? $pegawaiTerakhir['nip'] : 'PEG-0000';
        $angkaNIP = (int) substr($nipTerakhir, 4);
        $angkaNIP++;
        return 'PEG-' . str_pad($angkaNIP, 4, '0', STR_PAD_LEFT);
    }

    public function store()
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
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Jabatan Wajib Diisi!"
                ],
            ],
            'lokasi_presensi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Lokasi Presensi Wajib Diisi!"
                ],
            ],
            'foto_pegawai' => [
                'rules' => 'max_size[foto_pegawai, 10240]|mime_in[foto_pegawai,image/png,image/jpeg]',
                'errors' => [
                    'max_size' => "Ukuran foto melebihi 10 MB!",
                    'mime_in' => "Jenis File yang diizinkan hanya PNG atau JPEG!"
                ],
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Username Wajib Diisi!"
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Password Wajib Diisi!"
                ],
            ],
            'konfirmasi_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => "Konfirmasi Password Wajib Diisi!",
                    'matches' => "Konfirmasi Password Tidak cocok!"
                ],
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Role Wajib Diisi!"
                ],
            ],
        ];
        $jabatan = new JabatanModel();
        $lokasi_presensi = new LokasiPresensiModel();
        $role = new RoleModel();
        $data = [
            'title' => 'Tambah Data Pegawai',
            'validation' => service('validation'),
            'lokasi_presensi' => $lokasi_presensi->findAll(),
            'jabatan' => $jabatan->orderBy('jabatan', 'ASC')->findAll(),
            'role' => $role->findAll()
        ];
        if (!$this->validate($rules)) {
            echo view('admin/data_pegawai/create', $data);
        } else {
            $pegawaiModel = new PegawaiModel();
            $nipBaru = $this->generateNIP();

            $foto = $this->request->getFile('foto_pegawai');

            if ($foto->getError() == 4) {
                $nama_foto = '';
            } else {
                $nama_foto = $foto->getRandomName();
                $foto->move('profile', $nama_foto);
            }

            $pegawaiModel->insert([
                'nip' => $nipBaru,
                'nama' => $this->request->getPost('nama'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'jabatan' => $this->request->getPost('jabatan'),
                'lokasi_presensi' => $this->request->getPost('lokasi_presensi'),
                'foto' => $nama_foto,
            ]);

            $id_pegawai = $pegawaiModel->insertID();
            $userModel = new UserModel();
            $userModel->insert([
                'id_pegawai' => $id_pegawai,
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status' => 'Aktif',
                'role' => $this->request->getPost('role')
            ]);

            session()->setFlashdata('berhasil', 'Data Pegawai Berhasil Tersimpan');

            return redirect()->to(base_url('admin/data_pegawai'));
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
        if ($lokasi_presensi) {
            $pegawaiModel->delete($id);

            session()->setFlashdata('berhasil', 'Data Lokasi Presensi Berhasil Dihapus!');

            return redirect()->to(base_url('admin/lokasi_presensi'));
        }
    }
}
