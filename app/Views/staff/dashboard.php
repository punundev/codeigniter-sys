<?= $this->extend('layouts/staff') ?>

<?= $this->section('title') ?>
Staff Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">My Role</p>
                        <h2 class="text-info"><?= esc(session()->get('role')) ?></h2>
                    </div>
                    <div class="text-info">
                        <i class="mdi mdi-account-circle" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">My Tasks</p>
                        <a href="<?= site_url('staff/task') ?>" class="btn btn-success btn-sm font-weight-semibold mt-1">
                            View Tasks
                        </a>
                    </div>
                    <div class="text-success">
                        <i class="mdi mdi-clipboard-text" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0 stock-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="text-muted mb-1">Inventory</p>
                        <a href="<?= site_url('staff/inventory') ?>" class="btn btn-primary btn-sm font-weight-semibold mt-1">
                            Lookup Inventory
                        </a>
                    </div>
                    <div class="text-primary">
                        <i class="mdi mdi-warehouse" style="font-size:45px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
