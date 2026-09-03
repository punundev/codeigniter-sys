
<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Task Details
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-4">

        <h3>
            <i class="fas fa-tasks"></i>
            Task Details
        </h3>

        <div>

            <a href="<?= site_url('task/worklog/create/' . $task['id']) ?>"
               class="btn btn-success">

                <i class="fas fa-plus"></i>
                Add Daily Work

            </a>

            <a href="<?= site_url('task') ?>"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>


    <!-- TASK INFORMATION -->

    <div class="card shadow-sm mb-4">

        <div class="card-header">

            <strong>
                Task Information
            </strong>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">Task</th>
                            <td>
                                <?= esc($task['task_title']) ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Computer</th>
                            <td>
                                Inventory #<?= esc($task['inventory_id']) ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Category</th>
                            <td>
                                <?= esc($task['problem_category']) ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Priority</th>
                            <td>
                                <?= esc($task['priority']) ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <?= esc($task['status']) ?>
                            </td>
                        </tr>

                    </table>

                </div>


                <div class="col-md-6">

                    <table class="table table-bordered">

                        <tr>
                            <th width="35%">Reported By</th>
                            <td>
                                <?= esc($task['reported_by'] ?? '-') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Assigned To</th>
                            <td>
                                <?= esc($task['assigned_to'] ?? '-') ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Task Date</th>
                            <td>
                                <?= esc($task['task_date']) ?>
                            </td>
                        </tr>

                        <tr>
                            <th>Resolved Date</th>
                            <td>
                                <?= esc($task['resolved_date'] ?? '-') ?>
                            </td>
                        </tr>

                    </table>

                </div>

            </div>


            <h5>
                Problem Description
            </h5>

            <div class="alert alert-light border">

                <?= nl2br(
                    esc($task['problem_description'] ?? '-')
                ) ?>

            </div>


            <h5>
                Initial Action Taken
            </h5>

            <div class="alert alert-light border">

                <?= nl2br(
                    esc($task['action_taken'] ?? '-')
                ) ?>
                     
            </div>

        </div>

    </div>


    <!-- DAILY WORK HISTORY -->

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between">

            <strong>
                Daily Work History
            </strong>

            <span class="badge badge-primary">
                <?= count($workLogs) ?> Records
            </span>

        </div>


        <div class="card-body">

            <?php if (!empty($workLogs)): ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead class="thead-light">

                            <tr>

                                <th>Date</th>

                                <th>Work</th>

                                <th>Description</th>

                                <th>Action Taken</th>

                                <th>Result</th>

                                <th>Status</th>

                                <th>Worked By</th>

                            </tr>

                        </thead>


                        <tbody>

                        <?php foreach ($workLogs as $log): ?>

                            <tr>

                                <td>
                                    <?= esc($log['work_date']) ?>
                                </td>

                                <td>
                                    <strong>
                                        <?= esc($log['work_title']) ?>
                                    </strong>
                                </td>

                                <td>
                                    <?= nl2br(
                                        esc($log['work_description'])
                                    ) ?>
                                </td>

                                <td>
                                    <?= nl2br(
                                        esc($log['action_taken'] ?? '-')
                                    ) ?>
                                </td>

                                <td>
                                    <?= esc($log['result'] ?? '-') ?>
                                </td>

                                <td>
                                    <?= esc($log['status'] ?? '-') ?>
                                </td>

                                <td>
                                    <?= esc($log['worked_by'] ?? '-') ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="text-center text-muted py-5">

                    <i class="fas fa-history fa-2x"></i>

                    <p class="mt-2">
                        No daily work recorded yet.
                    </p>

                    <a href="<?= site_url('task/worklog/create/' . $task['id']) ?>"
                       class="btn btn-success">

                        Add First Work Log

                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
```

