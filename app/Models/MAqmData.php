<?php

namespace App\Models;

use CodeIgniter\Model;

class MAqmData extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'aqm_data';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
