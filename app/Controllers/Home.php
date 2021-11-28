<?php

namespace App\Controllers;

use App\Models\MAqmData;
use App\Models\MAqmStation;
use App\Models\MUserStation;

class Home extends BaseController
{
    public function __construct()
    {
        $this->loginCheck();
        $this->aqmData = new MAqmData();
        $this->aqmStation = new MAqmStation();
        $this->userStation = new MUserStation();
    }

    public function index()
    {
        $data['title']          = 'Aqms Dasbhaord';
        $userStations           = $this->userStation->where(['user_id' => session('session_id')])->findAll();
        foreach ($userStations as $uStation) {
            $uStations[]        = $uStation->station_id;
        }
        $aqmStations            = $this->aqmStation
            ->where(['is_deleted' => 0])
            ->whereIn('station_id', @$uStations)
            ->findAll();
        $countAqmStation        = $this->aqmStation
            ->where(['is_deleted' => 0])
            ->whereIn('station_id', @$uStations)
            ->countAllResults();
        $aqmStation             = [];
        foreach ($aqmStations as $key => $aqmStat) {
            $aqmStation[$key]['station_id']     = $aqmStat->station_id;
            $aqmStation[$key]['city']           = $aqmStat->city;
            $aqmStation[$key]['last_data']      = @$this->aqmData->selectMax('date_time')->where(['station_id' => @$aqmStat->station_id])->first()->date_time;
            $date = date('Y-m-d H:i:s', strtotime(@$aqmStation[$key]['last_data']) + (60 * 60 * 3));
            if ($date < date('Y-m-d H:i:s')) {
                $aqmStation[$key]['status']     = 'red';
            } else {
                $aqmStation[$key]['status']     = 'green';
            }
        }
        $data['aqmStations']            = $aqmStation;
        $data['listaqmStations']        = $aqmStations;
        $data['countAqmStation']        = $countAqmStation;
        echo view('Home/Home', $data);
    }
}
