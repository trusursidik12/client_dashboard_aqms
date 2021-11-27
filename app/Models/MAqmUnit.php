<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmUnit extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_units';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
