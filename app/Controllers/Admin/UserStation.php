<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MAqmStation;
use App\Models\MUser;
use App\Models\MUserStation;

class UserStation extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // login and admin check
        $this->loginCheck();
        $this->adminCheck();

        // model
        $this->user = new MUser();
        $this->station = new MAqmStation();
        $this->userStation = new MUserStation();
    }

    // edit user station
    public function edit($id)
    {
        $data['title']              = 'Edit User';
        $data['validation']         = \Config\Services::validation();
        $data['user']               = $this->user->where('id', $id)->first();
        $data['stations']           = $this->station->findAll();
        $data['userStations'] = $this->userStation->where('user_stations.user_id', $id)
            ->select('user_stations.*,users.full_name as full_name')
            ->join('users', 'users.id = user_stations.user_id', 'left')
            ->orderBy('user_stations.id', 'ASC')
            ->findAll();

        echo view('Admin/UserStation/Edit', $data);
    }

    // column
    public function column()
    {
        $data['user_id']            = $this->request->getPost('user_id');
        $data['station_id']         = $this->request->getPost('station_id');

        return $data;
    }

    // add station
    public function add()
    {
        $stationIDCheck = $this->userStation->where(['user_id' => $this->request->getPost('user_id'), 'station_id' => $this->request->getPost('station_id')])->first();

        if (empty($stationIDCheck)) {

            $fields = $this->column() + $this->savedInfo();

            if (isset($_POST['add_station'])) {

                if ($this->userStation->save($fields)) {
                    $params = array("success" => true);
                } else {
                    $params = array("success" => false);
                }

                echo json_encode($params);
            }
        } else {
            $params = array("success" => false);
            echo json_encode($params);
        }
    }

    // list user station
    public function list($id)
    {
        $data['userStations'] = $this->userStation->where('user_stations.user_id', $id)
            ->select('user_stations.*,users.full_name as full_name')
            ->join('users', 'users.id = user_stations.user_id', 'left')
            ->orderBy('user_stations.id', 'ASC')
            ->findAll();

        echo view('Admin/UserStation/List', $data);
    }

    // remove user station
    public function remove()
    {
        if (isset($_POST['remove_station'])) {
            if ($this->userStation->delete($this->request->getPost('deleteid'))) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }

            echo json_encode($params);
        }
    }
}
