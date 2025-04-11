<?php

namespace App\Models;

use CodeIgniter\Model;

class courseModel extends Model
{
    protected $table            = 'courses';
    protected $primaryKey       = 'course_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['education_name','education_code','date_created','account_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}