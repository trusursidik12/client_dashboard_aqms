<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmParamList extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_param_lists';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
