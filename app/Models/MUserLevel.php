<?php

namespace App\Models;

use CodeIgniter\Model;

class MUserLevel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'user_levels';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = false;
    protected $protectFields = false;
}
