<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddParamList extends Seeder
{
    public function run()
    {
        $data =
            [
                [
                    'param'                 => 'pm10',
                    'name'                  => 'PM 10',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'pm25',
                    'name'                  => 'PM 2.5',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'so2',
                    'name'                  => 'SO2',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'co',
                    'name'                  => 'CO',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'o3',
                    'name'                  => 'O3',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'no2',
                    'name'                  => 'NO2',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'hc',
                    'name'                  => 'HC',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'h2s',
                    'name'                  => 'H2S',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'cs2',
                    'name'                  => 'CS2',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'voc',
                    'name'                  => 'VOC',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'nh3',
                    'name'                  => 'NH3',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'no',
                    'name'                  => 'NO',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'ws',
                    'name'                  => 'Wind Speed',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'wd',
                    'name'                  => 'Wind Direction',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'humidity',
                    'name'                  => 'Humidity',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'temperature',
                    'name'                  => 'Temperature',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'pressure',
                    'name'                  => 'Pressure',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'sr',
                    'name'                  => 'Solar Radiation',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'param'                 => 'uv',
                    'name'                  => 'Ultra Violet',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
            ];
        $this->db->table('aqm_param_lists')->insertBatch($data);
    }
}
