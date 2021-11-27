<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblAqmParam extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'station_id'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'param'                     => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => false],
            'name'                      => ['type' => 'VARCHAR', 'constraint' => '30', 'null' => false],
            'unit_id'                   => ['type' => 'INT', 'null' => false],
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
        $this->forge->addKey('user_id');
        $this->forge->addKey('station_id');
        $this->forge->addKey('param');
        $this->forge->addKey('name');
        $this->forge->addKey('unit_id');
        $this->forge->createTable('aqm_params');
    }

    public function down()
    {
        $this->forge->dropTable('aqm_params');
    }
}
