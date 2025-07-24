<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => service('validation')
        ];
        return view('login', $data);
    }

    public function login_action()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('login', $data);
        } else {
            $session = session();
            $loginModel = new LoginModel;

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $checkUsername = $loginModel->where('username', $username)->first();

            if ($checkUsername) {
                $passwordDb = $checkUsername['password'];
                $checkPassword = password_verify($password, $passwordDb);
                if ($checkPassword) {

                    $session_data = [
                        'logged_in' => TRUE,
                        'role_id' => $checkUsername['role'],
                        'username' => $checkUsername['username']
                    ];
                    $session->set($session_data);

                    switch ($checkUsername['role']) {
                        case "Admin";
                            return redirect()->to('admin/home');
                        case "Pegawai";
                            return redirect()->to('pegawai/home');
                        default:
                            $session->setFlashdata('pesan', 'Akun Anda belum Terdaftar!');
                            return redirect()->to('/');
                    }
                } else {
                    $session->setFlashdata('pesan', 'Password Salah! Silahkan coba lagi!');
                    return redirect()->to('/');
                }
            } else {
                $session->setFlashdata('pesan', 'Username Salah! Silahkan coba lagi!');
                return redirect()->to('/');
            }
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }


}
