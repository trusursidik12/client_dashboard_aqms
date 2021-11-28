<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MAqmData;
use App\Models\MAqmParam;
use App\Models\MAqmStation;
use App\Models\MUserStation;

class AqmData extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->loginCheck();

        $this->aqmStation = new MAqmStation();
        $this->aqmData = new MAqmData();
        $this->userStation = new MUserStation();
        $this->aqmParam = new MAqmParam();
    }

    public function listData($stationID)
    {
        $data['title']          = 'List Aqm Data';
        $aqmParams              = @$this->aqmParam->where(['station_id' => $stationID])->findAll();
        $checkStationID         = $this->userStation->where(['user_id' => session('session_id'), 'station_id' => $stationID])->first();
        if (empty($checkStationID)) {
            echo "<script> window.location='" . base_url() . "'; </script>";
        }
        $data['listParams']     = $aqmParams;
        $data['stationID']      = $this->aqmStation->where('station_id', $stationID)->first()->station_id;
        echo view('Data/Data', $data);
    }

    public function ajaxAqmData($stationID)
    {
        $aqmParams = @$this->aqmParam->where(['station_id' => $stationID])->findAll();
        $aqmParam = [];
        foreach ($aqmParams as $param) {
            $aqmParam[] = $param->param;
        }
        $where              = "station_id = '{$stationID}'";
        $rowData            = [];
        $numrow             = $this->aqmData->where($where)->countAllResults();
        $listData           = $this->aqmData->where($where)->orderBy("id", "DESC")->findALL($this->request->getPost('length'), $this->request->getPost('start'));
        $no = @$this->request->getPost('start');
        foreach ($listData as $key => $lData) {
            $no++;
            foreach ($aqmParam as $param) {
                $rowData[$key]['no'] = $no;
                $rowData[$key]['station_id']    = $lData->station_id;
                $rowData[$key]['date_time']     = $lData->date_time;
                $rowData[$key][$param]          = $lData->$param;
            }
        }

        $results = [
            'draw'                => @$this->request->getPost('draw'),
            'recordsTotal'        => $numrow,
            'recordsFiltered'     => $numrow,
            'data'                => $rowData
        ];
        echo json_encode($results);
    }
}
