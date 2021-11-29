<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MAqmParamIspu;
use App\Models\MAqmParamList;
use App\Models\MAqmStation;
use App\Models\MAqmUnit;

class AqmParamIspu extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        // login and admin check
        $this->loginCheck();
        $this->adminCheck();

        // model
        $this->station = new MAqmStation();
        $this->param = new MAqmParamIspu();
        $this->paramList = new MAqmParamList();
        $this->unit = new MAqmUnit();
    }

    // edit aqm param
    public function edit($id)
    {
        $data['title']              = 'Edit Aqm Param Ispu';
        $data['validation']         = \Config\Services::validation();
        $data['station']            = $this->station->where('station_id', $id)->first();
        $data['paramlists']         = $this->paramList->findAll();
        $data['units']              = $this->unit->findAll();
        $data['params'] = $this->param->where('aqm_param_ispu.station_id', $id)
            ->select('aqm_param_ispu.*,aqm_units.name as uname')
            ->join('aqm_units', 'aqm_units.id = aqm_param_ispu.unit_id', 'left')
            ->orderBy('aqm_param_ispu.id', 'ASC')
            ->findAll();

        echo view('Admin/AqmParamIspu/Edit', $data);
    }

    // column
    public function column()
    {
        $param = $this->paramList->where('id', $this->request->getPost('list_param_id'))->first();
        $data['station_id']            = $this->request->getPost('station_id');
        $data['param']                 = $param->param;
        $data['name']                  = $param->name;
        $data['unit_id']               = $this->request->getPost('unit_id');

        return $data;
    }

    // add station
    public function add()
    {
        $paramListID = $this->paramList->where('id', $this->request->getPost('list_param_id'))->first()->param;
        $paramCheck = $this->param->where(['station_id' => $this->request->getPost('station_id'), 'param' => $paramListID])->first();

        if (empty($paramCheck)) {

            $fields = $this->column() + $this->savedInfo();

            if (isset($_POST['add_param'])) {
                if ($this->param->save($fields)) {
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

    // list aqm param
    public function list($id)
    {
        $data['params'] = $this->param->where('aqm_param_ispu.station_id', $id)
            ->select('aqm_param_ispu.*,aqm_units.name as uname')
            ->join('aqm_units', 'aqm_units.id = aqm_param_ispu.unit_id', 'left')
            ->orderBy('aqm_param_ispu.id', 'ASC')
            ->findAll();

        echo view('Admin/AqmParamIspu/List', $data);
    }

    // remove aqm param
    public function remove()
    {
        if (isset($_POST['remove_param'])) {
            if ($this->param->delete($this->request->getPost('deleteid'))) {
                $params = array("success" => true);
            } else {
                $params = array("success" => false);
            }

            echo json_encode($params);
        }
    }
}
