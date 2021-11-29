<?php

namespace App\Controllers\Outdoor;

use App\Models\MAqmData;
use App\Models\MAqmIspu;
use App\Models\MAqmStation;
use App\Models\MCompanyProfile;
use CodeIgniter\RESTful\ResourceController;

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

class Outdoor extends ResourceController
{
    public function __construct()
    {
        $this->aqmData = new MAqmData();
        $this->aqmIspu = new MAqmIspu();
        $this->api = new MCompanyProfile();
        $this->aqmStation = new MAqmStation();
    }

    public function station()
    {
        $stationID = $this->request->getPost('id');
        try {
            if (!empty($stationID)) {
                $checkStatiun = $this->aqmStation->where("station_id", $stationID)->countAllResults();
                if ($checkStatiun < 1) {
                    return $this->response->setJSON([
                        'status' => 0,
                        'message' => 'Id stasiun tidak ditemukan'
                    ]);
                }
                $ispu = $this->aqmIspu->select("aqm_stations.name as nama_stasiun,aqm_ispu.*")
                    ->where([
                        'aqm_ispu.station_id' => $stationID
                    ])
                    ->join("aqm_stations", "aqm_stations.station_id = aqm_ispu.station_id", "left")
                    ->orderBy('aqm_ispu.date_time', 'desc')->first();
                if ($ispu->pm10 <= 50) {
                    $pm10 = 'BAIK';
                } else if ($ispu->pm10 > 50 & $ispu->pm10 <= 100) {
                    $pm10 = 'SEDANG';
                } else if ($ispu->pm10 > 100 & $ispu->pm10 <= 200) {
                    $pm10 = 'TIDAK SEHAT';
                } else if ($ispu->pm10 > 200 & $ispu->pm10 <= 300) {
                    $pm10 = 'SANGAT TIDAK SEHAT';
                } else {
                    $pm10 = 'BERBAHAYA';
                }
                if ($ispu->pm25 <= 50) {
                    $pm25 = 'BAIK';
                } else if ($ispu->pm25 > 50 & $ispu->pm25 <= 100) {
                    $pm25 = 'SEDANG';
                } else if ($ispu->pm25 > 100 & $ispu->pm25 <= 200) {
                    $pm25 = 'TIDAK SEHAT';
                } else if ($ispu->pm25 > 200 & $ispu->pm25 <= 300) {
                    $pm25 = 'SANGAT TIDAK SEHAT';
                } else {
                    $pm25 = 'BERBAHAYA';
                }
                if ($ispu->so2 <= 50) {
                    $so2 = 'BAIK';
                } else if ($ispu->so2 > 50 & $ispu->so2 <= 100) {
                    $so2 = 'SEDANG';
                } else if ($ispu->so2 > 100 & $ispu->so2 <= 200) {
                    $so2 = 'TIDAK SEHAT';
                } else if ($ispu->so2 > 200 & $ispu->so2 <= 300) {
                    $so2 = 'SANGAT TIDAK SEHAT';
                } else {
                    $so2 = 'BERBAHAYA';
                }
                if ($ispu->co <= 50) {
                    $co = 'BAIK';
                } else if ($ispu->co > 50 & $ispu->co <= 100) {
                    $co = 'SEDANG';
                } else if ($ispu->co > 100 & $ispu->co <= 200) {
                    $co = 'TIDAK SEHAT';
                } else if ($ispu->co > 200 & $ispu->co <= 300) {
                    $co = 'SANGAT TIDAK SEHAT';
                } else {
                    $co = 'BERBAHAYA';
                }
                if ($ispu->o3 <= 50) {
                    $o3 = 'BAIK';
                } else if ($ispu->o3 > 50 & $ispu->o3 <= 100) {
                    $o3 = 'SEDANG';
                } else if ($ispu->o3 > 100 & $ispu->o3 <= 200) {
                    $o3 = 'TIDAK SEHAT';
                } else if ($ispu->o3 > 200 & $ispu->o3 <= 300) {
                    $o3 = 'SANGAT TIDAK SEHAT';
                } else {
                    $o3 = 'BERBAHAYA';
                }
                if ($ispu->no2 <= 50) {
                    $no2 = 'BAIK';
                } else if ($ispu->no2 > 50 & $ispu->no2 <= 100) {
                    $no2 = 'SEDANG';
                } else if ($ispu->no2 > 100 & $ispu->no2 <= 200) {
                    $no2 = 'TIDAK SEHAT';
                } else if ($ispu->no2 > 200 & $ispu->no2 <= 300) {
                    $no2 = 'SANGAT TIDAK SEHAT';
                } else {
                    $no2 = 'BERBAHAYA';
                }
                if ($ispu->hc <= 50) {
                    $hc = 'BAIK';
                } else if ($ispu->hc > 50 & $ispu->hc <= 100) {
                    $hc = 'SEDANG';
                } else if ($ispu->hc > 100 & $ispu->hc <= 200) {
                    $hc = 'TIDAK SEHAT';
                } else if ($ispu->hc > 200 & $ispu->hc <= 300) {
                    $hc = 'SANGAT TIDAK SEHAT';
                } else {
                    $hc = 'BERBAHAYA';
                }
                $data = $this->aqmData->where(['station_id' => $stationID])->orderBy('date_time', 'desc')->first();
                $response['status'] = 1;
                $response['message'] = '';
                $response['data'] = [
                    'nama' => ucwords($ispu->nama_stasiun),
                    'waktu' => date('d F Y', strtotime($ispu->date_time)) . ' jam 15:00',
                    'pm10' => $ispu->pm10,
                    'pm25' => $ispu->pm25,
                    'so2' => $ispu->so2,
                    'co' => $ispu->co,
                    'o3' => $ispu->o3,
                    'no2' => $ispu->no2,
                    'hc' => $ispu->hc,
                    'c_pm10' => 1,
                    'c_pm25' => 1,
                    'c_so2' => 1,
                    'c_co' => 1,
                    'c_no2' => 1,
                    'c_hc' => 1,
                    'run1' => "Stasiun {$ispu->nama_stasiun} {$ispu->date_time} PM10:{$data->pm10} PM2.5:{$data->pm25} SO2:{$data->so2} CO:{$data->co} O3:{$data->o3} NO2:{$data->no2} HC:{$data->hc} SUHU:{$data->temperature} RH: % TEK: {$data->pressure} mBar WS: {$data->ws} m/s WD: {$data->wd}",
                    'run2' => "PM10:" . $pm10 . " PM2.5:" . $pm25 . " SO2:" . $so2 . " CO:" . $co . " O3:" . $o3 . " NO2:" . $no2 . " HC:" . $hc,
                ];
                return $this->response->setJSON($response);
            } else {
                $response['status'] = 0;
                $response['message'] = 'Id stasiun tidak ditemukan';
                return $this->response->setJSON($response);
            }
        } catch (Exception $e) {
            $response['status'] = 0;
            $response['message'] = $e->getMessage();
            return $this->response->setJSON($response);
        }
    }
}
