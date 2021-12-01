<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MAqmIspu;
use App\Models\MAqmParamIspu;
use App\Models\MAqmStation;

class AqmIspu extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->loginCheck();

        $this->aqmStation = new MAqmStation();
        $this->aqmIspu = new MAqmIspu();
        $this->aqmParamIspu = new MAqmParamIspu();
    }

    public function listIspu($stationID)
    {
        $data['title']          = 'List Aqm Ispu';
        $aqmParams              = @$this->aqmParamIspu->where(['station_id' => $stationID])->findAll();
        $data['listParams']     = $aqmParams;
        $data['stationID']      = @$this->aqmStation->where(['is_ispu' => 1, 'station_id' => $stationID])->first()->station_id;
        if (empty($data['stationID'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('ID Stasiun ' . $stationID . ' Tidak ditemukan!');
        }
        echo view('Ispu/Ispu', $data);
    }

    public function ajaxAqmIspu($stationID)
    {
        $aqmParams = @$this->aqmParamIspu->where(['station_id' => $stationID])->findAll();
        $aqmParam = [];
        foreach ($aqmParams as $param) {
            $aqmParam[] = $param->param;
        }
        $where              = "station_id = '{$stationID}'";
        $rowData            = [];
        $numrow             = $this->aqmIspu->where($where)->countAllResults();
        // $listIspu           = $this->aqmIspu->where($where)->orderBy("id", "DESC")->findALL($this->request->getPost('length'), $this->request->getPost('start'));
        $listIspu           = $this->aqmIspu->where($where)->orderBy("id", "DESC")->findALL();
        $no = @$this->request->getPost('start');
        foreach ($listIspu as $key => $lIspu) {
            $no++;
            foreach ($aqmParam as $param) {
                $rowData[$key]['no'] = $no;
                $rowData[$key]['station_id']    = $lIspu->station_id;
                $rowData[$key]['date_time']     = $lIspu->date_time;
                $rowData[$key][$param]          = $lIspu->$param;
            }
        }
        // foreach ($listIspu as $key => $lIspu) {
        //     $no++;
        //     $rowData[$key] = [
        //         $no,
        //         $lIspu->station_id,
        //         $lIspu->date_time,
        //         $lIspu->pm10,
        //         $lIspu->pm25,
        //         $lIspu->so2,
        //         $lIspu->co,
        //         $lIspu->o3,
        //         $lIspu->no2,
        //         $lIspu->hc,
        //     ];
        // }

        $results = [
            'draw'                => @$this->request->getPost('draw'),
            'recordsTotal'        => $numrow,
            'recordsFiltered'     => $numrow,
            'data'                => $rowData
        ];
        echo json_encode($results);
    }
}
