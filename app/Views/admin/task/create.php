<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Create Task
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <h4>Create New Task</h4>
        </div>

        <div class="card-body">

            <form action="<?= site_url('admin/task/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Task Title</label>

                    <input type="text"
                           name="task_title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Problem Description</label>

                    <textarea name="problem_description"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-control">

                        <option value="Open">Open</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Priority</label>

                    <select name="priority" class="form-control">

                        <option value="Low">Low</option>
                        <option value="Normal">Normal</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>

                    </select>
                </div>

                <div class="d-flex" style="gap: 4px;">
                    <button type="submit" class="btn btn-primary font-weight-semibold">Save Task</button>
                    <a href="<?= site_url('admin/task') ?>" class="btn btn-secondary font-weight-semibold">Cancel</a>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
