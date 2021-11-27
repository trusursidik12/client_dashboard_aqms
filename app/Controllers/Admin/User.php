<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MUser;
use App\Models\MUserLevel;

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // login and admin check
        $this->loginCheck();
        $this->adminCheck();

        // model
        $this->user = new MUser();
        $this->level = new MUserLevel();
    }

    // data reference
    public function reference()
    {
        $data['level']        = $this->level->where('is_deleted', 0)->findAll();

        return $data;
    }

    // list user
    public function index()
    {
        $data['title']        = 'Daftar User';
        $data['users']        = $this->user->where('is_deleted', 0)->findAll();

        $data = $data + $this->reference();

        echo view('User/List', $data);
    }

    // column
    public function column()
    {
        $data['level_id']               = $this->request->getPost('level_id');
        $data['nip']                    = $this->request->getPost('nip');
        $data['full_name']              = $this->request->getPost('full_name');
        $data['phone']                  = $this->request->getPost('phone');
        $data['email']                  = $this->request->getPost('phone');
        $data['status_id']              = $this->request->getPost('status_id');

        return $data;
    }

    // create user
    public function create()
    {
        $data['title']            = 'Tambah User';
        $data['validation']     = \Config\Services::validation();

        $data = $data + $this->reference();

        echo view('User/Create', $data);
    }

    // saved user
    public function save()
    {
        if (!$this->validate(
            [
                'level_id' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Level kosong!. silakan pilih ..',
                    ]
                ],
                'full_name' => [
                    'rules'    => 'required|max_length[50]',
                    'errors'     => [
                        'required'          => 'Nama Lengkap kosong!. silakan isi ..',
                        'max_length'        => 'Panjang karakter tidak boleh lebih dari 50 karakter ..',
                    ]
                ],
                'email' => [
                    'rules'    => 'required|max_length[45]|is_unique[users.email]',
                    'errors'     => [
                        'required'        => 'Email kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                        'is_unique'        => 'Email sudah digunakan, silakan gunakan email yang lain ..',
                    ]
                ],
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
            return redirect()->to('/user/create')->withInput();
        }

        $password = ['password' => password_hash($this->request->getPost('password'), PASSWORD_ARGON2ID)];

        $fields = $this->column() + $password + $this->savedInfo() + $this->updatedInfo();

        $this->user->save($fields);

        session()->setFlashdata('message', 'User berhasil ditambah');
        return redirect()->to('/user');
    }

    // edit user
    public function edit($id)
    {
        $data['title']            = 'Edit User';
        $data['validation']     = \Config\Services::validation();
        $data['user']            = $this->user->where('id', $id)->first();

        $data = $data + $this->reference();

        echo view('User/Edit', $data);
    }

    // updated user
    public function update()
    {
        $emailCheck = $this->user->where(['id !=' => $this->request->getPost('id'), 'email' => $this->request->getPost('email'), 'is_deleted' => 0])->first();
        if (!$this->validate(
            [
                'level_id' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Level kosong!. silakan pilih ..',
                    ]
                ],
                'full_name' => [
                    'rules'    => 'required|max_length[80]',
                    'errors'     => [
                        'required'          => 'Nama Lengkap kosong!. silakan isi ..',
                        'max_length'        => 'Panjang karakter tidak boleh lebih dari 80 karakter ..',
                    ]
                ],
                'email' => [
                    'rules'    => 'required|max_length[45]',
                    'errors'     => [
                        'required'        => 'Email kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                    ]
                ],
            ]
        )) {
            return redirect()->to('/user/edit/' . $this->request->getPost('id'))->withInput();
        } else if (!empty($emailCheck)) {
            session()->setFlashdata('u_email', 'Email sudah digunakan, silakan gunakan Email lain ..');
            return redirect()->to('/user/edit/' . $this->request->getPost('id'))->withInput();
        }

        if (!empty($this->request->getPost('password'))) {
            if (strlen($this->request->getPost('password')) < 6) {
                session()->setFlashdata('passworderror', 'Password tidak boleh kurang dari 6 karakter!..');
                return redirect()->to('/user/edit/' . $this->request->getPost('id') . '')->withInput();
            } else if (strlen($this->request->getPost('password')) > 20) {
                session()->setFlashdata('passworderror', 'Password tidak boleh lebih 20 karakter!..');
                return redirect()->to('/user/edit/' . $this->request->getPost('id') . '')->withInput();
            } else {
                $password = ['password' => password_hash($this->request->getPost('password'), PASSWORD_ARGON2ID)];
            }
            $fields = $this->column() + $password + $this->updatedInfo();
        } else {
            $fields = $this->column() + $this->updatedInfo();
        }

        $this->user->update($this->request->getPost('id'), $fields);

        session()->setFlashdata('message', 'User berhasil diubah');
        return redirect()->to('/user');
    }

    // delete user
    public function delete()
    {
        $this->user->update($this->request->getPost('id'), ['is_deleted' => 1] + $this->deletedInfo());

        session()->setFlashdata('message', 'User berhasil dihapus!');
        return redirect()->to('/user');
    }
}
