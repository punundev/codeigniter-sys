<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
IT Task Reports
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>


        </div>

        <!---<a href="<?= site_url('task') ?>"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>--!>

    </div>


    <!-- FILTER CARD -->

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-primary text-white">

            <h5 class="mb-0">

                <i class="fas fa-filter"></i>

                Report Filter IT Task Management Reports

            </h5>

        </div>


        <div class="card-body">

            <form
                method="get"
                action="<?= site_url('task/report') ?>"
            >

                <div class="row">


                    <!-- PERIOD -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label">
                            Report Type
                        </label>

                        <select
                            name="period"
                            id="period"
                            class="form-control"
                            onchange="changePeriod()"
                        >

                            <option
                                value="day"
                                <?= $period === 'day' ? 'selected' : '' ?>
                            >
                                Daily
                            </option>

                            <option
                                value="week"
                                <?= $period === 'week' ? 'selected' : '' ?>
                            >
                                Weekly
                            </option>

                            <option
                                value="month"
                                <?= $period === 'month' ? 'selected' : '' ?>
                            >
                                Monthly
                            </option>

                            <option
                                value="year"
                                <?= $period === 'year' ? 'selected' : '' ?>
                            >
                                Yearly
                            </option>

                        </select>

                    </div>


                    <!-- DATE -->

                    <div
                        class="col-md-3 mb-3"
                        id="dateBox"
                    >

                        <label class="form-label">
                            Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="form-control"
                            value="<?= esc($date) ?>"
                        >

                    </div>


                    <!-- MONTH -->

                    <div
                        class="col-md-3 mb-3"
                        id="monthBox"
                    >

                        <label class="form-label">
                            Month
                        </label>

                        <input
                            type="month"
                            name="month"
                            class="form-control"
                            value="<?= esc($month) ?>"
                        >

                    </div>


                    <!-- YEAR -->

                    <div
                        class="col-md-3 mb-3"
                        id="yearBox"
                    >

                        <label class="form-label">
                            Year
                        </label>

                        <input
                            type="number"
                            name="year"
                            class="form-control"
                            value="<?= esc($year) ?>"
                            min="2000"
                            max="2100"
                        >

                    </div>
                     <div  class="col-md-6 mb-3">
                            <a href="<?= site_url('task') ?>"
                             class="btn btn-secondary">

                       <i class="fas fa-arrow-left"></i>
                     Back

                    </a>

                     </div>
                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="fas fa-search"></i>

                    Generate Report

                </button>


                <button
                    type="button"
                    class="btn btn-success"
                    onclick="exportReport()"
                >

                    <i class="fas fa-file-excel"></i>

                    Export Excel/CSV

                </button>

            </form>

        </div>

    </div>


    <!-- SUMMARY -->

    <div class="row mb-4">


        <!-- TOTAL -->

        <div class="col-md-3 mb-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        Total Tasks
                    </h6>

                    <h2>
                        <?= number_format($totalTasks) ?>
                    </h2>

                </div>

            </div>

        </div>


        <!-- OPEN -->

        <div class="col-md-3 mb-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        Open
                    </h6>

                    <h2 class="text-primary">
                        <?= number_format($openTasks) ?>
                    </h2>

                </div>

            </div>

        </div>


        <!-- PROGRESS -->

        <div class="col-md-3 mb-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        In Progress
                    </h6>

                    <h2 class="text-warning">
                        <?= number_format($progressTasks) ?>
                    </h2>

                </div>

            </div>

        </div>


        <!-- COMPLETED -->

        <div class="col-md-3 mb-3">

            <div class="card shadow-sm border-0">

                <div class="card-body">

                    <h6 class="text-muted">
                        Completed
                    </h6>

                    <h2 class="text-success">
                        <?= number_format($completedTasks) ?>
                    </h2>

                </div>

            </div>

        </div>

    </div>


    <!-- REPORT TABLE -->

    <div class="card shadow-sm border-0">

        <div class="card-header">

            <h5 class="mb-0">

                <i class="fas fa-table"></i>

                Task Report

            </h5>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-light">

                        <tr>

                            <th>#</th>

                            <th>Date</th>

                            <th>Inventory ID</th>

                            <th>Task Title</th>

                            <th>Problem</th>

                            <th>Priority</th>

                            <th>Status</th>

                            <th>Assigned To</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php if (!empty($tasks)): ?>

                        <?php foreach ($tasks as $index => $task): ?>

                            <tr>

                                <td>
                                    <?= $index + 1 ?>
                                </td>

                                <td>
                                    <?= esc($task['task_date'] ?? '-') ?>
                                </td>

                                <td>
                                    <?= esc($task['inventory_id'] ?? '-') ?>
                                </td>

                                <td>

                                    <strong>
                                        <?= esc($task['task_title'] ?? '-') ?>
                                    </strong>

                                </td>

                                <td>
                                    <?= esc($task['problem_category'] ?? '-') ?>
                                </td>

                                <td>

                                    <?php

                                    $priority =
                                        strtolower(
                                            trim(
                                                $task['priority'] ?? ''
                                            )
                                        );

                                    $priorityClass =
                                        'secondary';

                                    if ($priority === 'high') {
                                        $priorityClass = 'danger';
                                    }

                                    elseif ($priority === 'medium') {
                                        $priorityClass = 'warning';
                                    }

                                    elseif ($priority === 'low') {
                                        $priorityClass = 'success';
                                    }

                                    ?>

                                    <span
                                        class="badge badge-<?= $priorityClass ?>"
                                    >

                                        <?= esc(
                                            $task['priority'] ?? '-'
                                        ) ?>

                                    </span>

                                </td>

                                <td>

                                    <?php

                                    $status =
                                        strtolower(
                                            trim(
                                                $task['status'] ?? ''
                                            )
                                        );

                                    $statusClass =
                                        'secondary';

                                    if ($status === 'open') {
                                        $statusClass = 'primary';
                                    }

                                    elseif ($status === 'in progress') {
                                        $statusClass = 'warning';
                                    }

                                    elseif ($status === 'completed') {
                                        $statusClass = 'success';
                                    }

                                    elseif ($status === 'cancelled') {
                                        $statusClass = 'danger';
                                    }

                                    ?>

                                    <span
                                        class="badge badge-<?= $statusClass ?>"
                                    >

                                        <?= esc(
                                            $task['status'] ?? '-'
                                        ) ?>

                                    </span>

                                </td>

                                <td>
                                    <?= esc(
                                        $task['assigned_to'] ?? '-'
                                    ) ?>
                                </td>

                                <td>

                                    <a
                                        href="<?= site_url(
                                            'task/view/' .
                                            $task['id']
                                        ) ?>"
                                        class="btn btn-sm btn-info"
                                    >

                                        <i class="fas fa-eye">View</i>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="9"
                                class="text-center text-muted py-4"
                            >

                                <i class="fas fa-info-circle"></i>

                                No tasks found for this period.

                            </td>

                        </tr>

                    <?php endif; ?>


                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


<script>

// =====================================================
// SHOW CORRECT DATE INPUT
// =====================================================

function changePeriod()
{
    const period =
        document.getElementById('period').value;

    const dateBox =
        document.getElementById('dateBox');

    const monthBox =
        document.getElementById('monthBox');

    const yearBox =
        document.getElementById('yearBox');


    dateBox.style.display = 'none';

    monthBox.style.display = 'none';

    yearBox.style.display = 'none';


    if (
        period === 'day' ||
        period === 'week'
    ) {

        dateBox.style.display = 'block';

    }


    if (period === 'month') {

        monthBox.style.display = 'block';

    }


    if (period === 'year') {

        yearBox.style.display = 'block';

    }
}


// =====================================================
// EXPORT
// =====================================================

function exportReport()
{
    const period =
        document.getElementById('period').value;


    const date =
        document.querySelector(
            'input[name="date"]'
        ).value;


    const month =
        document.querySelector(
            'input[name="month"]'
        ).value;


    const year =
        document.querySelector(
            'input[name="year"]'
        ).value;


    const url =
        "<?= site_url('task/report/export') ?>" +

        "?period=" +
        encodeURIComponent(period) +

        "&date=" +
        encodeURIComponent(date) +

        "&month=" +
        encodeURIComponent(month) +

        "&year=" +
        encodeURIComponent(year);


    window.location.href = url;
}


// =====================================================
// PAGE LOAD
// =====================================================

changePeriod();

</script>


<?= $this->endSection() ?>
