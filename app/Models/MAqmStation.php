<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmStation extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_stations';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
