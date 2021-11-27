<?php

namespace App\Models;

use CodeIgniter\Model;

class MUserStation extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'user_stations';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
