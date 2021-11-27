<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddCompanyProfile extends Seeder
{
    public function run()
    {
        $data =
            [
                [
                    'name'                  => 'PT. Trusur Unggul Teknusa',
                    'description'           => 'About Your Company',
                    'logo'                  => 'trusur.png',
                    'is_deleted'            => 0,
                    'created_at'            => date('Y-m-d H:i:s'),
                    'created_by'            => 'admin@trusur.com',
                    'created_ip'            => '127.0.0.1',
                    'updated_at'            => date('Y-m-d H:i:s'),
                    'updated_by'            => 'admin@trusur.com',
                    'updated_ip'            => '127.0.0.1'
                ]
            ];
        $this->db->table('company_profile')->insertBatch($data);
    }
}
