<?php

namespace App\Models;

use CodeIgniter\Model;

class hiringModel extends Model
{
    protected $table            = 'hirings';
    protected $primaryKey       = 'hiring_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['application_id','school_id','employment_type',
                                    'item_number','position','job_description','job_code',
                                    'job_level','job_grade','monthly_salary',
                                    'status','posting_date','closing_date',
                                    'date_created','account_id'
                                  ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}