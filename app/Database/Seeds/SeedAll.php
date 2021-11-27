<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeedAll extends Seeder
{
    public function run()
    {
        $this->call('AddLevel');
        $this->call('AddUnit');
        $this->call('AddUser');
        $this->call('AddParamList');
        $this->call('AddCompanyProfile');
    }
}
