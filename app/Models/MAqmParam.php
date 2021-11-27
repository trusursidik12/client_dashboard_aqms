<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmParam extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_params';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
