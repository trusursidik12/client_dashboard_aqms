<?php

namespace App\Models;

use CodeIgniter\Model;

class MCompanyProfile extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'company_profile';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
