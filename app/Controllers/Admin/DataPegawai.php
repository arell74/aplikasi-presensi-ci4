<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Models\LokasiPresensiModel;
use App\Models\JabatanModel;

class DataPegawai extends BaseController
{

    function __construct()
    {
        helper(['url', 'form']);
    }

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
            'data_pegawai' => $pegawaiModel->detailPegawai($id),
        ];
        return view('admin/data_pegawai/detail', $data);
    }

    public function create()
    {
        $jabatan = new JabatanModel();
        $lokasi_presensi = new LokasiPresensiModel();
        $data = [
            'title' => 'Tambah Data Pegawai',
            'validation' => service('validation'),
            'lokasi_presensi' => $lokasi_presensi->findAll(),
            'jabatan' => $jabatan->orderBy('jabatan', 'ASC')->findAll()
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
                'rules' => 'uploaded[foto_pegawai]|max_size[foto_pegawai, 10240]|mime_in[foto_pegawai,image/png,image/jpeg]',
                'errors' => [
                    'uploaded' => 'Foto Harus Di Upload!',
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
        $data = [
            'title' => 'Tambah Data Pegawai',
            'validation' => service('validation'),
            'lokasi_presensi' => $lokasi_presensi->findAll(),
            'jabatan' => $jabatan->orderBy('jabatan', 'ASC')->findAll(),
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
                'foto_pegawai' => $nama_foto,
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

        return view('admin/data_pegawai/edit', $data);
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
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Username Wajib Diisi!"
                ],
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Role Wajib Diisi!"
                ],
            ],
            
        ];

        if (!empty($password)) {
            $rules['password'] = [
            'rules' => 'required|min_length[6]',
            'errors' => [
                'required' => 'Password wajib diisi!',
                'min_length' => 'Password minimal 6 karakter!'
            ]
        ];
        $rules['konfirmasi_password'] = [
            'rules' => 'matches[password]',
            'errors' => [
                'matches' => "Konfirmasi Password tidak cocok!"
            ],
        ];
        }

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

            return view('admin/data_pegawai/edit', $data);
        } else {
            $pegawaiModel = new PegawaiModel();
            $userModel = new UserModel();
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
                'jabatan' => $this->request->getPost('jabatan'),
                'lokasi_presensi' => $this->request->getPost('lokasi_presensi'),
                'foto_pegawai' => $nama_foto,
            ]);

            if ($this->request->getPost('password') == '') {
                $password = $this->request->getPost('password_lama');
            } else {
                $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
            }
            $userModel
                ->where('id_pegawai', $id)
                ->set([
                    'username' => $this->request->getPost('username'),
                    'password' => $password,
                    'status' => $this->request->getPost('status'),
                    'role' => $this->request->getPost('role')
                    ])
                ->update();

            session()->set('foto_pegawai', $nama_foto);

            session()->setFlashdata('berhasil', 'Data Pegawai Berhasil Diupdate!');

            return redirect()->to(base_url('admin/data_pegawai'));
        }
    }

    public function delete($id)
    {
        $pegawaiModel = new PegawaiModel();
        $userModel = new UserModel();

        $pegawai = $pegawaiModel->find($id);
        if ($pegawai) {
            $userModel->where('id_pegawai', $id)->delete();
            $pegawaiModel->delete($id);

            session()->setFlashdata('berhasil', 'Data Pegawai Berhasil Dihapus!');

            return redirect()->to(base_url('admin/data_pegawai'));
        }
    }
}
