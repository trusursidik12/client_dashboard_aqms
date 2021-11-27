<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\MCompanyProfile;
use App\Models\MUser;

class Login extends BaseController
{
    public function __construct()
    {
        $this->user = new MUser();
        $this->companyProfile = new MCompanyProfile();
    }

    public function loginForm()
    {
        if (session('session_level')) {
            if (session('session_level') == 2) {
                return redirect()->to('/');
            } else {
                return redirect()->to('/');
            }
        }
        $data = [
            'title'         => 'Form Login',
            'logo'          => @$this->companyProfile->first(),
            'informasi'     => base_url(),
            'validation'    => \Config\Services::validation(),
        ];
        echo view('Login/LoginForm', $data);
    }

    public function loginProcess()
    {
        $userCheck = @$this->user->where(['status_id' => '1', 'email' => $this->request->getPost('email')])->first();

        if (!$this->validate([
            'email' => [
                'rules'     => 'required',
                'errors'     => [
                    'required'    => 'Email kosong!. silakan isi ..'
                ]
            ],
            'password' => [
                'rules'     => 'required',
                'errors'     => [
                    'required'    => 'Password kosong!. silakan isi ..'
                ]
            ]
        ])) {
            return redirect()->to('/login')->withInput();
        }
        if (empty($userCheck)) {
            session()->setFlashdata('noemail', 'Email belum terdaftar!..');
            return redirect()->to('/login');
        }

        if (password_verify($this->request->getPost('password'), $userCheck->password)) {
            $getSessionLogin =
                [
                    'loggedin'          => true,
                    'session_id'        => $userCheck->id,
                    'session_level'      => $userCheck->level_id,
                    'session_name'        => $userCheck->full_name,
                    'session_email'        => $userCheck->email,
                ];
            session()->set($getSessionLogin);
            session()->setFlashdata('message', 'Selamat Datang ' . session('session_name') . ' ..');
            if (session('session_level') == 2) {
                return redirect()->to('/');
            } else {
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('didntmatch', 'Password yang Anda masukkan Salah!..');
            return redirect()->to('/login');
        }
    }

    public function logOut()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
