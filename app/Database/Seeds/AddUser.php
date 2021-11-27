<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddUser extends Seeder
{
    public function run()
    {
        $data =
            [
                [
                    'level_id'              => 1,
                    'nip'                   => '1111111111111111',
                    'full_name'             => 'Admin Aqms Dashboard',
                    'phone'                 => '02129627005',
                    'email'                 => 'admin@trusur.com',
                    'password'              => '$argon2id$v=19$m=65536,t=4,p=1$OXkuZEdTcXVIeUR1dDRBYg$T9xfr3m1hiSrOx8fOrSJ1IUzgemOEBmvLoLyxrrhzI8',
                    'status_id'             => 1,
                    'is_deleted'            => 0,
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1',
                    'updated_at'            => date('Y-m-d H:i:s'),
                    'updated_by'            => 'admin@trusur.com',
                    'updated_ip'            => '127.0.0.1'
                ]
            ];
        $this->db->table('users')->insertBatch($data);
    }
}
