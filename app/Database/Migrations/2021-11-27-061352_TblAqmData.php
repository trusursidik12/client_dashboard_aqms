<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAqmData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'station_id'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'date_time'                 => ['type' => 'DATETIME', 'null' => false],
            'pm10'                      => ['type' => 'DOUBLE', 'null' => true],
            'pm25'                      => ['type' => 'DOUBLE', 'null' => true],
            'so2'                       => ['type' => 'DOUBLE', 'null' => true],
            'co'                        => ['type' => 'DOUBLE', 'null' => true],
            'o3'                        => ['type' => 'DOUBLE', 'null' => true],
            'no2'                       => ['type' => 'DOUBLE', 'null' => true],
            'hc'                        => ['type' => 'DOUBLE', 'null' => true],
            'h2s'                       => ['type' => 'DOUBLE', 'null' => true],
            'cs2'                       => ['type' => 'DOUBLE', 'null' => true],
            'voc'                       => ['type' => 'DOUBLE', 'null' => true],
            'nh3'                       => ['type' => 'DOUBLE', 'null' => true],
            'no'                        => ['type' => 'DOUBLE', 'null' => true],
            'ws'                        => ['type' => 'DOUBLE', 'null' => true],
            'wd'                        => ['type' => 'DOUBLE', 'null' => true],
            'humidity'                  => ['type' => 'DOUBLE', 'null' => true],
            'temperature'               => ['type' => 'DOUBLE', 'null' => true],
            'pressure'                  => ['type' => 'DOUBLE', 'null' => true],
            'sr'                        => ['type' => 'DOUBLE', 'null' => true],
            'uv'                        => ['type' => 'DOUBLE', 'null' => true],
            'sampler_operator_name'     => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'address'                   => ['type' => 'VARCHAR', 'constraint' => '200', 'null' => true],
            'lat_lon'                   => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'created_at'                => ['type' => 'TIMESTAMP'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('station_id');
        $this->forge->addKey('date_time');
        $this->forge->addKey('pm10');
        $this->forge->addKey('pm25');
        $this->forge->addKey('so2');
        $this->forge->addKey('co');
        $this->forge->addKey('o3');
        $this->forge->addKey('no2');
        $this->forge->addKey('hc');
        $this->forge->createTable('aqm_data');
    }

    public function down()
    {
        $this->forge->dropTable('aqm_data');
    }
}
