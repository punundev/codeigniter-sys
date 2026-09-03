<?php

namespace App\Controllers\Manager;

use App\Controllers\BaseController;
use App\Models\TaskWorkLogModel;

class WorkLog extends BaseController
{
    protected $workLogModel;

    public function __construct()
    {
        $this->workLogModel = new TaskWorkLogModel();
    }

    public function create($taskId)
    {
        return view('manager/task/worklog/create', [
            'task_id' => $taskId
        ]);
    }

    public function store()
    {
        $this->workLogModel->insert([
            'task_id'          => $this->request->getPost('task_id'),
            'inventory_id'     => $this->request->getPost('inventory_id'),
            'work_date'        => $this->request->getPost('work_date'),
            'work_title'       => $this->request->getPost('work_title'),
            'work_description' => $this->request->getPost('work_description'),
            'action_taken'     => $this->request->getPost('action_taken'),
            'result'           => $this->request->getPost('result'),
            'status'           => $this->request->getPost('status'),
            'worked_by'        => $this->request->getPost('worked_by'),
            'start_time'       => $this->request->getPost('start_time'),
            'end_time'         => $this->request->getPost('end_time'),
            'notes'            => $this->request->getPost('notes')
        ]);

        return redirect()->to(
            '/manager/task/view/' . $this->request->getPost('task_id')
        );
    }
}
