<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MAqmStation;

class AqmStation extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // login and admin check
        $this->loginCheck();
        $this->adminCheck();

        // model
        $this->aqmStation = new MAqmStation();
    }
    // list aqm station
    public function index()
    {
        $data['title']              = 'Daftar Aqm Stasiun';
        $data['stations']           = $this->aqmStation->where('is_deleted', 0)->findAll();

        echo view('Admin/Station/List', $data);
    }

    // column
    public function column()
    {
        $data['station_id']             = $this->request->getPost('station_id');
        $data['name']                   = $this->request->getPost('name');
        $data['city']                   = $this->request->getPost('city');
        $data['province']               = $this->request->getPost('province');
        $data['address']                = $this->request->getPost('address');
        $data['lat']                    = $this->request->getPost('lat');
        $data['lon']                    = $this->request->getPost('lon');
        $data['operator']               = $this->request->getPost('operator');
        $data['is_ispu']                = $this->request->getPost('is_ispu');

        return $data;
    }

    // create aqm station
    public function create()
    {
        $data['title']              = 'Tambah Aqm Stasiun';
        $data['validation']         = \Config\Services::validation();

        echo view('Admin/Station/Create', $data);
    }

    // saved user
    public function save()
    {
        if (!$this->validate(
            [
                'station_id' => [
                    'rules'    => 'required|is_unique[aqm_stations.station_id]',
                    'errors'     => [
                        'required'        => 'ID Stasiun kosong!. silakan pilih ..',
                        'is_unique'        => 'ID Stasiun sudah digunakan, silakan gunakan ID Stasiun yang lain ..',
                    ]
                ],
                'name' => [
                    'rules'    => 'required|max_length[50]',
                    'errors'     => [
                        'required'          => 'Nama Perusahaan!. silakan isi ..',
                        'max_length'        => 'Panjang karakter tidak boleh lebih dari 50 karakter ..',
                    ]
                ],
                'city' => [
                    'rules'    => 'required|max_length[45]',
                    'errors'     => [
                        'required'        => 'Kota kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                    ]
                ],
                'province' => [
                    'rules'    => 'required|max_length[45]',
                    'errors'     => [
                        'required'        => 'Provinsi kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                    ]
                ],
                'address' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Alamat kosong!. silakan isi ..',
                    ]
                ],
                'lat' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Latitude kosong!. silakan isi ..',
                    ]
                ],
                'lon' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Loongitude kosong!. silakan isi ..',
                    ]
                ],
                'operator' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Operator / PIC kosong!. silakan isi ..',
                    ]
                ],
                'is_ispu' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Status Ispu kosong!. silakan isi ..',
                    ]
                ],
            ]
        )) {
            return redirect()->to('/aqm-station/create')->withInput();
        }

        $fields = $this->column() + $this->savedInfo() + $this->updatedInfo();

        $this->aqmStation->save($fields);

        session()->setFlashdata('message', 'Aqm Stasiun berhasil ditambah');
        return redirect()->to('/aqm-station');
    }

    // edit user
    public function edit($id)
    {
        $data['title']              = 'Edit Aqm Stasiun';
        $data['validation']         = \Config\Services::validation();
        $data['aqmStation']         = $this->aqmStation->where('id', $id)->first();

        echo view('Admin/Station/Edit', $data);
    }

    // updated user
    public function update()
    {
        $stationCheck = $this->aqmStation->where(['id !=' => $this->request->getPost('id'), 'station_id' => $this->request->getPost('station_id'), 'is_deleted' => 0])->first();
        if (!$this->validate(
            [
                'station_id' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'ID Stasiun kosong!. silakan pilih ..',
                    ]
                ],
                'name' => [
                    'rules'    => 'required|max_length[50]',
                    'errors'     => [
                        'required'          => 'Nama Perusahaan!. silakan isi ..',
                        'max_length'        => 'Panjang karakter tidak boleh lebih dari 50 karakter ..',
                    ]
                ],
                'city' => [
                    'rules'    => 'required|max_length[45]',
                    'errors'     => [
                        'required'        => 'Kota kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                    ]
                ],
                'province' => [
                    'rules'    => 'required|max_length[45]',
                    'errors'     => [
                        'required'        => 'Provinsi kosong!. silakan isi ..',
                        'max_length'    => 'Panjang karakter tidak boleh lebih dari 45 karakter ..',
                    ]
                ],
                'address' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Alamat kosong!. silakan isi ..',
                    ]
                ],
                'lat' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Latitude kosong!. silakan isi ..',
                    ]
                ],
                'lon' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Loongitude kosong!. silakan isi ..',
                    ]
                ],
                'operator' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Operator / PIC kosong!. silakan isi ..',
                    ]
                ],
                'is_ispu' => [
                    'rules'    => 'required',
                    'errors'     => [
                        'required'        => 'Status Ispu kosong!. silakan isi ..',
                    ]
                ],
            ]
        )) {
            return redirect()->to('/aqm-station/edit/' . $this->request->getPost('id'))->withInput();
        } else if (!empty($stationCheck)) {
            session()->setFlashdata('u_stationid', 'ID Stasiun sudah digunakan, silakan gunakan ID Stasiun lain ..!');
            return redirect()->to('/aqm-station/edit/' . $this->request->getPost('id'))->withInput();
        }

        $fields = $this->column() + $this->updatedInfo();

        $this->aqmStation->update($this->request->getPost('id'), $fields);

        session()->setFlashdata('message', 'Aqm Stasiun berhasil diubah');
        return redirect()->to('/aqm-station');
    }

    // delete user
    public function delete()
    {
        $this->aqmStation->delete($this->request->getPost('id'));

        session()->setFlashdata('message', 'Aqm Stasiun berhasil dihapus!');
        return redirect()->to('/aqm-station');
    }
}
