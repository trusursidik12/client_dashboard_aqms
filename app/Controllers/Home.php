<?php

namespace App\Controllers;

use App\Models\MAqmStation;
use App\Models\MUserStation;

class Home extends BaseController
{
    public function __construct()
    {
        $this->loginCheck();
        $this->aqmStation = new MAqmStation();
        $this->userStation = new MUserStation();
    }

    public function index()
    {
        $data['title']          = 'Aqms Dasbhaord';
        $userStations       = $this->userStation->where(['user_id' => session('session_id')])->findAll();
        foreach ($userStations as $uStation) {
            $uStations[] = $uStation->id_stasiun;
        }
        $aqmStations        = $this->aqmStation
            ->where(['is_deleted' => 0])
            ->whereIn('id_stasiun', @$uStations)
            ->findAll();
        $countAqmStation        = $this->aqmStation
            ->where(['is_deleted' => 0])
            ->whereIn('id_stasiun', @$uStations)
            ->countAllResults();
        $aqmStation         = [];
        foreach ($aqmStations as $key => $aqmStat) {
            $aqmStation[$key]['id_stasiun']     = $aqmStat->id_stasiun;
            $aqmStation[$key]['kota']           = $aqmStat->kota;
            $aqmStation[$key]['last_data']      = @$this->aqmData->selectMax('waktu')->where(['id_stasiun' => @$aqmStat->id_stasiun])->first()->waktu;
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
