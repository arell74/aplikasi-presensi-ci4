<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\KetidakhadiranModel;
use CodeIgniter\HTTP\ResponseInterface;

class Ketidakhadiran extends BaseController
{

    function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        $ketidakhadiranModel = new KetidakhadiranModel();
        $id_pegawai = session()->get('id_pegawai');
        $data = [
            'title' => 'Ketidakhadiran',
            'ketidakhadiran' => $ketidakhadiranModel->where('id_pegawai', $id_pegawai)->findAll()
        ];
        return view('pegawai/ketidakhadiran/ketidakhadiran', $data);
    }

    public function create()
    {
        $ketidakhadiranModel = new KetidakhadiranModel();
        $data = [
            'title' => 'Ajukan Ketidakhadiran',
            'validation' => service('validation'),
            'ketidakhadiran' => $ketidakhadiranModel
        ];

        return view('pegawai/ketidakhadiran/create', $data);
    }

    public function store()
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Keterangan Wajib Diisi!"
                ],
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Tanggal Wajib Diisi!"
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Deskripsi Wajib Diisi!"
                ],
            ],
            'file' => [
                'rules' => 'uploaded[file]|max_size[file, 10240]|mime_in[file,image/png,image/jpeg,application/pdf]',
                'errors' => [
                    'uploaded' => 'File Di Upload!',
                    'max_size' => "Ukuran file melebihi 10 MB!",
                    'mime_in' => "Jenis File yang diizinkan hanya PNG, JPEG atau PDF!"
                ],
            ],
        ];

        $ketidakhadiranModel = new KetidakhadiranModel();
        $data = [
            'title' => 'Tambah Data Pegawai',
            'validation' => service('validation'),
            'ketidakhadiran' => $ketidakhadiranModel
        ];
        if (!$this->validate($rules)) {
            echo view('pegawai/ketidakhadiran/create', $data);
        } else {
            $ketidakhadiranModel = new KetidakhadiranModel();

            $file = $this->request->getFile('file');

            if ($file->getError() == 4) {
                $nama_file = '';
            } else {
                $nama_file = $file->getRandomName();
                $file->move('file_ketidakhadiran', $nama_file);
            }

            $ketidakhadiranModel->insert([
                'id_pegawai' => $this->request->getPost('id_pegawai'),
                'keterangan' => $this->request->getPost('keterangan'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'tanggal' => $this->request->getPost('tanggal'),
                'status' => 'Pending',
                'file' => $nama_file
            ]);

            session()->setFlashdata('berhasil', 'Ketidakhadiran Berhasil Diajukan!');

            return redirect()->to(base_url('pegawai/ketidakhadiran'));
        }
    }

    public function edit($id)
    {
        $ketidakhadiranModel = new KetidakhadiranModel();
        $data = [
            'title' => 'Edit Data Pegawai',
            'validation' => service('validation'),
            'ketidakhadiran' => $ketidakhadiranModel->find($id)
        ];

        return view('pegawai/ketidakhadiran/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Wajib isi Keterangan!"
                ],
            ],
            'tanggal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Wajib Isi tanggal"
                ],
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Wajib isi Deskripsi!"
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            $ketidakhadiranModel = new KetidakhadiranModel();
            $data = [
                'title' => 'Edit Data Ketidakhadiran',
                'validation' => service('validation'),
                'ketidakhadiran' => $ketidakhadiranModel->find($id)
            ];

            return view('pegawai/ketidakhadiran/edit', $data);
        } else {
            $ketidakhadiranModel = new KetidakhadiranModel();
            $file = $this->request->getFile('file');

            if ($file->getError() == 4) {
                $nama_file = $this->request->getPost('file_lama');
            } else {
                $nama_file = $file->getRandomName();
                $file->move('file_ketidakhadiran', $nama_file);
            }
            $ketidakhadiranModel->update($id, [
                'keterangan' => $this->request->getPost('keterangan'),
                'tanggal' => $this->request->getPost('tanggal'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'status' => 'Pending',
                'file' => $nama_file,
            ]);

            session()->setFlashdata('berhasil', 'Data Ketidakhadiran Berhasil Diperbarui!');

            return redirect()->to(base_url('pegawai/ketidakhadiran'));
        }
    }

    public function delete($id)
    {

        $ketidakhadiran = new KetidakhadiranModel();
        $ketidakhadiran->delete($id);

        session()->setFlashdata('berhasil', 'Data Pegawai Berhasil Dihapus!');

        return redirect()->to(base_url('pegawai/ketidakhadiran'));
    }
}
