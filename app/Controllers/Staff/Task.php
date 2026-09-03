<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use App\Models\TaskWorkLogModel;

class Task extends BaseController
{
    protected $taskModel;
    protected $workLogModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->workLogModel = new TaskWorkLogModel();
    }

    public function index()
    {
        $data['tasks'] = $this->taskModel
            ->orderBy('task_date', 'DESC')
            ->findAll();

        return view('staff/task/index', $data);
    }

    public function create()
    {
        return view('staff/task/create');
    }

    public function store()
    {
        $this->taskModel->insert([
            'inventory_id'        => $this->request->getPost('inventory_id'),
            'task_title'          => $this->request->getPost('task_title'),
            'problem_category'    => $this->request->getPost('problem_category'),
            'problem_description' => $this->request->getPost('problem_description'),
            'action_taken'        => $this->request->getPost('action_taken'),
            'software_name'       => $this->request->getPost('software_name'),
            'software_version'    => $this->request->getPost('software_version'),
            'license_status'      => $this->request->getPost('license_status'),
            'license_key'         => $this->request->getPost('license_key'),
            'result'              => $this->request->getPost('result'),
            'status'              => $this->request->getPost('status'),
            'priority'            => $this->request->getPost('priority'),
            'reported_by'         => $this->request->getPost('reported_by'),
            'assigned_to'         => $this->request->getPost('assigned_to'),
            'created_by'          => $this->request->getPost('created_by'),
            'task_date'           => $this->request->getPost('task_date') ?: date('Y-m-d'),
            'resolved_date'       => $this->request->getPost('resolved_date'),
            'notes'               => $this->request->getPost('notes'),
            'created_at'          => date('Y-m-d H:i:s'),
            'updated_at'          => date('Y-m-d H:i:s')
        ]);

        $task_id = $this->taskModel->getInsertID();

        return redirect()->to(
            site_url('staff/task/view/' . $task_id)
        )->with('success', 'Task created successfully.');
    }

    public function update($id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            return redirect()->to(site_url('staff/task'))
                ->with('error', 'Task not found.');
        }

        $this->taskModel->update($id, [
            'inventory_id'        => $this->request->getPost('inventory_id'),
            'task_title'          => $this->request->getPost('task_title'),
            'problem_category'    => $this->request->getPost('problem_category'),
            'problem_description' => $this->request->getPost('problem_description'),
            'action_taken'        => $this->request->getPost('action_taken'),
            'software_name'       => $this->request->getPost('software_name'),
            'software_version'    => $this->request->getPost('software_version'),
            'license_status'      => $this->request->getPost('license_status'),
            'license_key'         => $this->request->getPost('license_key'),
            'result'              => $this->request->getPost('result'),
            'status'              => $this->request->getPost('status'),
            'priority'            => $this->request->getPost('priority'),
            'reported_by'         => $this->request->getPost('reported_by'),
            'assigned_to'         => $this->request->getPost('assigned_to'),
            'created_by'          => $this->request->getPost('created_by'),
            'task_date'           => $this->request->getPost('task_date'),
            'resolved_date'       => $this->request->getPost('resolved_date'),
            'notes'               => $this->request->getPost('notes')
        ]);

        return redirect()->to(
            site_url('staff/task/view/' . $id)
        )->with('success', 'Task updated successfully.');
    }

    public function edit($id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            return redirect()->to(site_url('staff/task'))
                ->with('error', 'Task not found.');
        }

        return view('staff/task/edit', [
            'task' => $task
        ]);
    }

    public function view($id)
    {
        $task = $this->taskModel->find($id);

        if (!$task) {
            return redirect()->to(site_url('staff/task'))
                ->with('error', 'Task not found.');
        }

        $workLogs = $this->workLogModel
            ->where('task_id', $id)
            ->orderBy('work_date', 'DESC')
            ->findAll();

        return view('staff/task/view', [
            'task'     => $task,
            'workLogs' => $workLogs
        ]);
    }

    public function report()
    {
        $db = \Config\Database::connect();

        $period = $this->request->getGet('period') ?? 'month';
        $date   = $this->request->getGet('date') ?? date('Y-m-d');
        $month  = $this->request->getGet('month') ?? date('Y-m');
        $year   = $this->request->getGet('year') ?? date('Y');

        $builder = $db->table('tasks');

        $builder->select('
            tasks.*,
            inventory.id AS inventory_id,
            inventory.device_name,
            inventory.serial_number,
            inventory.manufacturer,
            inventory.model
        ');

        $builder->join(
            'inventory',
            'inventory.id = tasks.inventory_id',
            'left'
        );

        switch ($period) {
            case 'day':
                $builder->where('DATE(tasks.task_date)', $date);
                break;

            case 'week':
                $startOfWeek = date(
                    'Y-m-d',
                    strtotime('monday this week', strtotime($date))
                );

                $endOfWeek = date(
                    'Y-m-d',
                    strtotime('sunday this week', strtotime($date))
                );

                $builder->where('tasks.task_date >=', $startOfWeek);
                $builder->where('tasks.task_date <=', $endOfWeek);
                break;

            case 'month':
                $builder->where(
                    "DATE_FORMAT(tasks.task_date, '%Y-%m') =",
                    $month
                );
                break;

            case 'year':
                $builder->where("YEAR(tasks.task_date) =", $year);
                break;
        }

        $builder->orderBy('tasks.task_date', 'DESC');

        $data['tasks'] = $builder->get()->getResultArray();

        $data['period'] = $period;
        $data['date']   = $date;
        $data['month']  = $month;
        $data['year']   = $year;

        $data['totalTasks'] = count($data['tasks']);
        $data['openTasks'] = 0;
        $data['progressTasks'] = 0;
        $data['completedTasks'] = 0;
        $data['cancelledTasks'] = 0;

        foreach ($data['tasks'] as $task) {
            $status = strtolower(trim($task['status'] ?? ''));

            if ($status === 'open') {
                $data['openTasks']++;
            }

            if ($status === 'in progress') {
                $data['progressTasks']++;
            }

            if ($status === 'completed') {
                $data['completedTasks']++;
            }

            if ($status === 'cancelled') {
                $data['cancelledTasks']++;
            }
        }

        return view('staff/task/report', $data);
    }

    public function exportReport()
    {
        $db = \Config\Database::connect();

        $period = $this->request->getGet('period') ?? 'month';
        $date   = $this->request->getGet('date') ?? date('Y-m-d');
        $month  = $this->request->getGet('month') ?? date('Y-m');
        $year   = $this->request->getGet('year') ?? date('Y');

        $builder = $db->table('tasks');

        $builder->select('
            tasks.id,
            tasks.inventory_id,
            tasks.task_date,
            tasks.task_title,
            tasks.problem_category,
            tasks.problem_description,
            tasks.action_taken,
            tasks.software_name,
            tasks.software_version,
            tasks.license_status,
            tasks.result,
            tasks.status,
            tasks.priority,
            tasks.reported_by,
            tasks.assigned_to,
            tasks.created_by,
            tasks.resolved_date,
            tasks.notes,
            tasks.created_at,
            tasks.updated_at
        ');

        switch ($period) {
            case 'day':
                $builder->where('DATE(tasks.task_date)', $date);
                break;

            case 'week':
                $startOfWeek = date(
                    'Y-m-d',
                    strtotime('monday this week', strtotime($date))
                );

                $endOfWeek = date(
                    'Y-m-d',
                    strtotime('sunday this week', strtotime($date))
                );

                $builder->where('tasks.task_date >=', $startOfWeek);
                $builder->where('tasks.task_date <=', $endOfWeek);
                break;

            case 'month':
                $builder->where(
                    "DATE_FORMAT(tasks.task_date, '%Y-%m') =",
                    $month
                );
                break;

            case 'year':
                $builder->where("YEAR(tasks.task_date) =", $year);
                break;
        }

        $builder->orderBy('tasks.task_date', 'ASC');

        $tasks = $builder->get()->getResultArray();

        $filename = 'IT_Task_Report_' . date('Ymd_His') . '.csv';

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');

        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        fputcsv($output, [
            'ID',
            'Inventory ID',
            'Task Date',
            'Task Title',
            'Problem Category',
            'Problem Description',
            'Action Taken',
            'Software Name',
            'Software Version',
            'License Status',
            'Result',
            'Status',
            'Priority',
            'Reported By',
            'Assigned To',
            'Created By',
            'Resolved Date',
            'Notes',
            'Created At',
            'Updated At'
        ]);

        foreach ($tasks as $task) {
            fputcsv($output, [
                $task['id'],
                $task['inventory_id'],
                $task['task_date'],
                $task['task_title'],
                $task['problem_category'],
                $task['problem_description'],
                $task['action_taken'],
                $task['software_name'],
                $task['software_version'],
                $task['license_status'],
                $task['result'],
                $task['status'],
                $task['priority'],
                $task['reported_by'],
                $task['assigned_to'],
                $task['created_by'],
                $task['resolved_date'],
                $task['notes'],
                $task['created_at'],
                $task['updated_at']
            ]);
        }

        fclose($output);
        exit;
    }

    public function dashboardChart()
    {
        $db = \Config\Database::connect();

        $period = $this->request->getGet('period') ?? 'day';

        $builder = $db->table('tasks');

        switch ($period) {
            case 'week':
                $builder->select("
                    YEARWEEK(task_date, 1) AS period_key,
                    CONCAT(
                        'Week ',
                        WEEK(task_date, 1),
                        ' - ',
                        YEAR(task_date)
                    ) AS period_label,
                    SUM(CASE WHEN status = 'Open' THEN 1 ELSE 0 END) AS open_count,
                    SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) AS in_progress_count,
                    SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_count,
                    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count
                ");
                $builder->groupBy('YEARWEEK(task_date, 1)');
                $builder->orderBy('period_key', 'ASC');
                break;

            case 'month':
                $builder->select("
                    DATE_FORMAT(task_date, '%Y-%m') AS period_key,
                    DATE_FORMAT(task_date, '%b %Y') AS period_label,
                    SUM(CASE WHEN status = 'Open' THEN 1 ELSE 0 END) AS open_count,
                    SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) AS in_progress_count,
                    SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_count,
                    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count
                ");
                $builder->groupBy("DATE_FORMAT(task_date, '%Y-%m')");
                $builder->orderBy('period_key', 'ASC');
                break;

            case 'year':
                $builder->select("
                    YEAR(task_date) AS period_key,
                    YEAR(task_date) AS period_label,
                    SUM(CASE WHEN status = 'Open' THEN 1 ELSE 0 END) AS open_count,
                    SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) AS in_progress_count,
                    SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_count,
                    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count
                ");
                $builder->groupBy('YEAR(task_date)');
                $builder->orderBy('period_key', 'ASC');
                break;

            case 'day':
            default:
                $builder->select("
                    DATE(task_date) AS period_key,
                    DATE_FORMAT(task_date, '%d %b') AS period_label,
                    SUM(CASE WHEN status = 'Open' THEN 1 ELSE 0 END) AS open_count,
                    SUM(CASE WHEN status = 'In Progress' THEN 1 ELSE 0 END) AS in_progress_count,
                    SUM(CASE WHEN status = 'Completed' THEN 1 ELSE 0 END) AS completed_count,
                    SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_count
                ");
                $builder->groupBy('DATE(task_date)');
                $builder->orderBy('period_key', 'ASC');
                break;
        }

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON([
            'period' => $period,
            'data'   => $data
        ]);
    }
}
