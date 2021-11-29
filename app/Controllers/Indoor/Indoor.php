<?php

namespace App\Controllers\Indoor;

use App\Controllers\BaseController;
use App\Models\MAqmData;
use App\Models\MAqmIspu;
use App\Models\MAqmParam;
use App\Models\MAqmStation;

class Indoor extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->aqmStation = new MAqmStation();
        $this->aqmData = new MAqmData();
        $this->aqmIspu = new MAqmIspu();
        $this->aqmParam = new MAqmParam();
    }

    public function index()
    {
        $data['title']          = 'INDOOR AQMS';
        $aqmStations            = @$this->aqmStation->findAll();
        foreach ($aqmStations as $station) {
            $stations[]        = $station->station_id;
        }
        $aqmParams              = $this->aqmParam
            ->select('aqm_params.*, aqm_params.name as pname, aqm_units.name as uname')
            ->join('aqm_units', 'aqm_units.id = aqm_params.unit_id', 'left')
            ->whereIn('aqm_params.station_id', @$stations)->findAll();
        $aqmParam               = [];
        foreach ($aqmParams as $param) {
            $aqmParam[]        = $param->param;
        }
        $aqmData                = $this->aqmData->groupBy('station_id')->where('id IN (select max(id) from aqm_data group by station_id)')->findAll();
        $lastData               = [];
        foreach ($aqmData as $key => $rowDawa) {
            foreach ($aqmParam as $param) {
                $lastData[$key]['station_id'] = $rowDawa->station_id;
                $lastData[$key]['date_time'] = $rowDawa->date_time;
                $lastData[$key]['data'][$param] = $rowDawa->$param;
                $lastData[$key]['ispu'][$param] = @$this->aqmIspu->where('station_id', $rowDawa->station_id)->first()->$param;
            }
        }
        $data['theLastData']    = @$lastData;
        $data['aqmParams']      = @$aqmParams;
        // dd($data['theLastData'][0]['ispu']['so2']);
        echo view('Indoor/Indoor', $data);
    }
}
