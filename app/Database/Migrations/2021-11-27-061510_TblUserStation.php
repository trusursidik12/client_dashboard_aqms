<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUserStation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'user_id'                   => ['type' => 'INT', 'null' => false],
            'station_id'                => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'created_at'                => ['type' => 'DATETIME'],
            'created_by'                => ['type' => 'VARCHAR', 'constraint' => '50'],
            'created_ip'                => ['type' => 'VARCHAR', 'constraint' => '16'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->addKey('station_id');
        $this->forge->createTable('user_stations');
    }

    public function down()
    {
        $this->forge->dropTable('user_stations');
    }
}
