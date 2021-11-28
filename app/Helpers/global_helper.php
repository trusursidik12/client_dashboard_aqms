<?php

function getCompanyProfile()
{
    $db = \Config\Database::connect();
    $query = $db->table('company_profile')->where('is_deleted', 0)->get()->getFirstRow();
    return $query;
}

function getAqmDataStation()
{
    $db = \Config\Database::connect();
    $query = $db->table('user_stations')->where(['is_deleted' => 0, 'user_id' => session('session_id')])->get()->getResultObject();
    return $query;
}

function getAqmIspuStation()
{
    $db = \Config\Database::connect();
    $query = $db->table('user_stations')
        ->select('user_stations.station_id as stationid')
        ->where(['user_stations.is_deleted' => 0, 'user_stations.user_id' => session('session_id'), 'aqm_stations.is_ispu' => 1])
        ->join('aqm_stations', 'aqm_stations.station_id = user_stations.station_id', 'left')
        ->get()->getResultObject();
    return $query;
}
