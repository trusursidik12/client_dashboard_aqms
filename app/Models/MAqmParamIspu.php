<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmParamIspu extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_param_ispu';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
