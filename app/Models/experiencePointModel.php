<?php

namespace App\Models;

use CodeIgniter\Model;

class experiencePointModel extends Model
{
    protected $table            = 'experience_points';
    protected $primaryKey       = 'experience_point_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['from','to','level','account_id','date_created'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}