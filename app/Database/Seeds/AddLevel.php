<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddLevel extends Seeder
{
    public function run()
    {
        $data =
            [
                [
                    'name'                  => 'Admin',
                    'description'           => 'Level admin. Level ini bisa menambah, mengubah, dan menghapus user.',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
                [
                    'name'                  => 'Operator',
                    'description'           => 'Level Operator. Level ini bisa melihat aqm data dan aqm ispu',
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1'
                ],
            ];
        $this->db->table('user_levels')->insertBatch($data);
    }
}
