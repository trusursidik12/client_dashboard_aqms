<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAqmStation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'station_id'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'name'                      => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'city'                      => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'province'                  => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'address'                   => ['type' => 'TEXT', 'null' => true],
            'lat'                       => ['type' => 'VARCHAR', 'constraint' => '30', 'null' => false],
            'lon'                       => ['type' => 'VARCHAR', 'constraint' => '30', 'null' => false],
            'operator'                  => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
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
        $this->forge->addKey('lat');
        $this->forge->addKey('lon');
        $this->forge->createTable('aqm_stations');
    }

    public function down()
    {
        $this->forge->dropTable('aqm_stations');
    }
}
