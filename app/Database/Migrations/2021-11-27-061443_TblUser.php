<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                        => ['type' => 'BIGINT', 'unsigned' => true, 'auto_increment' => true],
            'level_id'                  => ['type' => 'INT', 'null' => false],
            'nip'                       => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'full_name'                 => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => false],
            'phone'                     => ['type' => 'VARCHAR', 'constraint' => '14', 'null' => true],
            'email'                     => ['type' => 'VARCHAR', 'constraint' => '50', 'null' => false],
            'password'                  => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => false],
            'status_id'                 => ['type' => 'SMALLINT', 'default' => 0, 'null' => false],
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
        $this->forge->addKey('level_id');
        $this->forge->addKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
