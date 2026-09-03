<?= $this->extend('layouts/staff') ?>

<?= $this->section('title') ?>
Edit Task
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">Edit Task</h4>
        </div>

        <div class="card-body">

            <form action="<?= site_url('staff/task/update/' . $task['id']) ?>"
                  method="post">

                <?= csrf_field() ?>

                <!-- Task Title -->
                <div class="mb-3">
                    <label class="form-label">
                        Task Title
                    </label>

                    <input type="text"
                           name="task_title"
                           class="form-control"
                           value="<?= esc($task['task_title']) ?>"
                           required>
                </div>


                <!-- Problem Category -->
                <div class="mb-3">
                    <label class="form-label">
                        Problem Category
                    </label>

                    <input type="text"
                           name="problem_category"
                           class="form-control"
                           value="<?= esc($task['problem_category']) ?>">
                </div>


                <!-- Problem Description -->
                <div class="mb-3">
                    <label class="form-label">
                        Problem Description
                    </label>

                    <textarea name="problem_description"
                              class="form-control"
                              rows="4"><?= esc($task['problem_description']) ?></textarea>
                </div>


                <!-- Action Taken -->
                <div class="mb-3">
                    <label class="form-label">
                        Action Taken
                    </label>

                    <textarea name="action_taken"
                              class="form-control"
                              rows="4"><?= esc($task['action_taken']) ?></textarea>
                </div>


                <!-- Software Name -->
                <div class="mb-3">
                    <label class="form-label">
                        Software Name
                    </label>

                    <input type="text"
                           name="software_name"
                           class="form-control"
                           value="<?= esc($task['software_name']) ?>">
                </div>


                <!-- Software Version -->
                <div class="mb-3">
                    <label class="form-label">
                        Software Version
                    </label>

                    <input type="text"
                           name="software_version"
                           class="form-control"
                           value="<?= esc($task['software_version']) ?>">
                </div>


                <!-- License Status -->
                <div class="mb-3">
                    <label class="form-label">
                        License Status
                    </label>

                    <input type="text"
                           name="license_status"
                           class="form-control"
                           value="<?= esc($task['license_status']) ?>">
                </div>


                <!-- License Key -->
                <div class="mb-3">
                    <label class="form-label">
                        License Key
                    </label>

                    <input type="text"
                           name="license_key"
                           class="form-control"
                           value="<?= esc($task['license_key']) ?>">
                </div>


                <!-- Result -->
                <div class="mb-3">
                    <label class="form-label">
                        Result
                    </label>

                    <textarea name="result"
                              class="form-control"
                              rows="3"><?= esc($task['result']) ?></textarea>
                </div>


                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">
                        Status
                    </label>

                    <select name="status" class="form-control">

                        <option value="Pending"
                            <?= ($task['status'] == 'Pending') ? 'selected' : '' ?>>
                            Pending
                        </option>

                        <option value="In Progress"
                            <?= ($task['status'] == 'In Progress') ? 'selected' : '' ?>>
                            In Progress
                        </option>

                        <option value="Completed"
                            <?= ($task['status'] == 'Completed') ? 'selected' : '' ?>>
                            Completed
                        </option>

                    </select>
                </div>


                <!-- Priority -->
                <div class="mb-3">
                    <label class="form-label">
                        Priority
                    </label>

                    <select name="priority" class="form-control">

                        <option value="Low"
                            <?= ($task['priority'] == 'Low') ? 'selected' : '' ?>>
                            Low
                        </option>

                        <option value="Normal"
                            <?= ($task['priority'] == 'Normal') ? 'selected' : '' ?>>
                            Normal
                        </option>

                        <option value="High"
                            <?= ($task['priority'] == 'High') ? 'selected' : '' ?>>
                            High
                        </option>

                        <option value="Critical"
                            <?= ($task['priority'] == 'Critical') ? 'selected' : '' ?>>
                            Critical
                        </option>

                    </select>
                </div>


                <!-- Reported By -->
                <div class="mb-3">
                    <label class="form-label">
                        Reported By
                    </label>

                    <input type="text"
                           name="reported_by"
                           class="form-control"
                           value="<?= esc($task['reported_by']) ?>">
                </div>


                <!-- Assigned To -->
                <div class="mb-3">
                    <label class="form-label">
                        Assigned To
                    </label>

                    <input type="text"
                           name="assigned_to"
                           class="form-control"
                           value="<?= esc($task['assigned_to']) ?>">
                </div>


                <!-- Task Date -->
                <div class="mb-3">
                    <label class="form-label">
                        Task Date
                    </label>

                    <input type="date"
                           name="task_date"
                           class="form-control"
                           value="<?= esc($task['task_date']) ?>">
                </div>


                <!-- Resolved Date -->
                <div class="mb-3">
                    <label class="form-label">
                        Resolved Date
                    </label>

                    <input type="date"
                           name="resolved_date"
                           class="form-control"
                           value="<?= esc($task['resolved_date']) ?>">
                </div>


                <!-- Notes -->
                <div class="mb-3">
                    <label class="form-label">
                        Notes
                    </label>

                    <textarea name="notes"
                              class="form-control"
                              rows="3"><?= esc($task['notes']) ?></textarea>
                </div>


                <!-- Buttons -->
                <div class="mt-4 d-flex" style="gap: 4px;">
                    <button type="submit" class="btn btn-primary font-weight-semibold">Update Task</button>
                    <a href="<?= site_url('staff/task') ?>" class="btn btn-secondary font-weight-semibold">Cancel</a>
                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
