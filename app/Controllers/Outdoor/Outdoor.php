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
        $api_key = '!qmzDaFwbqRtXx39q!@';
        $apiKey = $this->request->getGet('api_key');
        $stationID = $this->request->getGet('id_stasiun');
        try {
            if (!empty($stationID)) {
                if ($apiKey == $api_key) {
                    $checkStatiun = $this->aqmStation->where("station_id", $stationID)->countAllResults();
                    if ($checkStatiun < 1) {
                        return $this->response->setJSON([
                            'status' => 0,
                            'message' => 'Id stasiun tidak ditemukan!'
                        ]);
                    }
                    $ispu = $this->aqmIspu->select("aqm_stations.name as nama_stasiun, aqm_stations.city as city, aqm_stations.province as province, aqm_ispu.*")
                        ->where([
                            'aqm_ispu.station_id' => $stationID
                        ])
                        ->join("aqm_stations", "aqm_stations.station_id = aqm_ispu.station_id", "left")
                        ->orderBy('aqm_ispu.date_time', 'desc')->first();

                    $data = $this->aqmData->where(['station_id' => $stationID])->orderBy('date_time', 'desc')->first();
                    $response['status']             = true;
                    $response['request_id']         = @$_GET["request_id"] * 1;
                    $response['id_stasiun']         = @$ispu->nama_stasiun;
                    $response['waktu']              = @$data->date_time;
                    $response['datetime']           = date("Y-m-d H:i:s");
                    $response['stasiun_name']       = @$ispu->nama_stasiun;
                    $response['city']               = @$ispu->city;
                    $response['province']           = @$ispu->province;
                    $response['pm25']               = @$ispu->pm25;
                    $response['pm10']               = @$ispu->pm10;
                    $response['so2']                = @$ispu->so2;
                    $response['co']                 = @$ispu->co;
                    $response['o3']                 = @$ispu->o3;
                    $response['no2']                = @$ispu->no2;
                    $response['hc']                 = @$ispu->hc;
                    $response['pm25_val']           = @$data->pm25;
                    $response['pm10_val']           = @$data->pm10;
                    $response['so2_val']            = @$data->so2;
                    $response['co_val']             = @$data->co;
                    $response['o3_val']             = @$data->o3;
                    $response['no2_val']            = @$data->no2;
                    $response['hc_val']             = @$data->hc;
                    $response['pressure']           = round(@$data->pressure, 1);
                    $response['temperature']        = round(@$data->temperature, 1);
                    $response['wind_direction']     = round(@$data->wd, 0);
                    $response['wind_speed']         = round(@$data->ws, 0);
                    $response['humidity']           = round(@$data->humidity, 0);
                    $response['rain_rate']          = round(@$data->rain_intensity, 1);
                    $response['solar_radiation']    = round(@$data->sr, 0);
                    return $this->response->setJSON($response);
                } else {
                    $response['status'] = 0;
                    $response['message'] = 'API Key salah';
                    return $this->response->setJSON($response);
                }
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
