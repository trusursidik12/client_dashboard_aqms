<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddUnit extends Seeder
{
    public function run()
    {
        $data =
            [
                [
                    'name'                  => 'ppm',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'μg/m3',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'mg/m3',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'l/min',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'm3/min',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'minutes',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'ton',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => '%',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'm/sec',
                    'description'           => '-',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
            ];
        $this->db->table('aqm_units')->insertBatch($data);
    }
}
