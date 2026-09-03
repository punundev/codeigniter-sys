<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'inventory_id',
        'task_title',
        'problem_category',
        'problem_description',
        'action_taken',
        'software_name',
        'software_version',
        'license_status',
        'license_key',
        'result',
        'status',
        'priority',
        'reported_by',
        'assigned_to',
        'created_by',
        'task_date',
        'resolved_date',
        'notes'
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
