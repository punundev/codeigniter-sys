<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Add Work Log
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card shadow-sm">

        <div class="card-header">
            <h4 class="mb-0">Add Work Log</h4>
        </div>

        <div class="card-body">

            <form action="<?= site_url('manager/task/worklog/store') ?>"
                  method="post">

                <?= csrf_field() ?>

                <!-- Task ID -->
                <input type="hidden"
                       name="task_id"
                       value="<?= esc($task_id) ?>">

                <!-- Inventory ID -->
                <div class="mb-3">
                    <label class="form-label">Inventory ID</label>

                    <input type="number"
                           name="inventory_id"
                           class="form-control">
                </div>

                <!-- Work Date -->
                <div class="mb-3">
                    <label class="form-label">Work Date</label>

                    <input type="date"
                           name="work_date"
                           class="form-control"
                           value="<?= date('Y-m-d') ?>"
                           required>
                </div>

                <!-- Work Title -->
                <div class="mb-3">
                    <label class="form-label">Work Title</label>

                    <input type="text"
                           name="work_title"
                           class="form-control"
                           required>
                </div>

                <!-- Work Description -->
                <div class="mb-3">
                    <label class="form-label">Work Description</label>

                    <textarea name="work_description"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <!-- Action Taken -->
                <div class="mb-3">
                    <label class="form-label">Action Taken</label>

                    <textarea name="action_taken"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <!-- Result -->
                <div class="mb-3">
                    <label class="form-label">Result</label>

                    <textarea name="result"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status"
                            class="form-control"
                            required>

                        <option value="Open">Open</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>

                    </select>
                </div>

                <!-- Worked By -->
                <div class="mb-3">
                    <label class="form-label">Worked By</label>

                    <input type="text"
                           name="worked_by"
                           class="form-control">
                </div>

                <!-- Start Time -->
                <div class="mb-3">
                    <label class="form-label">Start Time</label>

                    <input type="time"
                           name="start_time"
                           class="form-control">
                </div>

                <!-- End Time -->
                <div class="mb-3">
                    <label class="form-label">End Time</label>

                    <input type="time"
                           name="end_time"
                           class="form-control">
                </div>

                <!-- Notes -->
                <div class="mb-3">
                    <label class="form-label">Notes</label>

                    <textarea name="notes"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                <div class="d-flex" style="gap: 4px;">
                    <button type="submit" class="btn btn-primary font-weight-semibold">Save Work Log</button>
                    <a href="<?= site_url('manager/task/view/' . $task_id) ?>" class="btn btn-secondary font-weight-semibold">Cancel</a>
                </div>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
