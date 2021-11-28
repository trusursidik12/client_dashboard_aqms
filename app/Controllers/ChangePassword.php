<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MUser;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // login and admin check
        $this->loginCheck();

        // model
        $this->user = new MUser();
    }

    // form change password
    public function index()
    {
        $data['title']          = 'Ubah Password';
        $data['validation']     = \Config\Services::validation();
        $data['user']           = $this->user->where(['is_deleted' => 0, 'status_id' => 1, 'id' => session('session_id')])->first();

        echo view('User/ChangePassword', $data);
    }

    // updated password
    public function update()
    {
        if (!$this->validate(
            [
                'password' => [
                    'rules'    => 'required|min_length[6]|max_length[20]',
                    'errors'     => [
                        'required'        => 'Password kosong!. silakan isi ..',
                        'min_length'  => 'Panjang karakter minimal 6 karakter ..',
                        'max_length'  => 'Panjang karakter maksimal 20 karakter ..',
                    ]
                ],
            ]
        )) {
            return redirect()->to('/change-password')->withInput();
        }

        $password = ['password' => password_hash($this->request->getPost('password'), PASSWORD_ARGON2ID)];
        $fields = $password + $this->updatedInfo();

        $this->user->update($this->request->getPost('id'), $fields);

        session()->setFlashdata('message', 'Password User berhasil diubah');
        return redirect()->to('/change-password');
    }
}
