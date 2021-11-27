<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAqmIspu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'station_id'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'date_time'                 => ['type' => 'DATE', 'null' => false],
            'pm10'                      => ['type' => 'DOUBLE', 'null' => true],
            'pm25'                      => ['type' => 'DOUBLE', 'null' => true],
            'so2'                      => ['type' => 'DOUBLE', 'null' => true],
            'co'                      => ['type' => 'DOUBLE', 'null' => true],
            'o3'                      => ['type' => 'DOUBLE', 'null' => true],
            'no2'                      => ['type' => 'DOUBLE', 'null' => true],
            'hc'                      => ['type' => 'DOUBLE', 'null' => true],
            'created_at'                => ['type' => 'DATETIME'],
            'created_by'                => ['type' => 'VARCHAR', 'constraint' => '50'],
            'created_ip'                => ['type' => 'VARCHAR', 'constraint' => '16'],
            'updated_at'                => ['type' => 'DATETIME', 'null' => true],
            'updated_by'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'updated_ip'                => ['type' => 'VARCHAR', 'constraint' => '16', 'null' => true],
            'is_deleted'                => ['type' => 'SMALLINT', 'default' => 0, 'null' => false],
            'deleted_at'                => ['type' => 'DATETIME', 'null' => true],
            'deleted_by'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => true],
            'deleted_ip'                => ['type' => 'VARCHAR', 'constraint' => '16', 'null' => true],
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
        $this->forge->createTable('aqm_ispu');
    }

    public function down()
    {
        $this->forge->dropTable('aqm_ispu');
    }
}
