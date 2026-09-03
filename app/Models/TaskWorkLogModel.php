<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskWorkLogModel extends Model
{
    protected $table = 'task_work_logs';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'task_id',
        'inventory_id',
        'work_date',
        'work_title',
        'work_description',
        'action_taken',
        'result',
        'status',
        'worked_by',
        'start_time',
        'end_time',
        'notes'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
