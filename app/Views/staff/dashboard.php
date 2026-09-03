<?= $this->extend('layouts/staff') ?>

<?= $this->section('title') ?>
Staff Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Welcome, <?= esc(session()->get('fullname')) ?></h4>
        <p class="card-description">Staff Portal Dashboard</p>
        <div class="row mt-4">
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card text-white bg-info">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="card-title text-white">My Role</h6>
                  <h3 class="font-weight-bold mb-0"><?= esc(session()->get('role')) ?></h3>
                </div>
                <i class="menu-icon typcn typcn-user-outline icon-lg"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card text-white bg-success">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="card-title text-white">Quick Access</h6>
                  <a href="<?= site_url('admin/task') ?>" class="btn btn-light btn-sm mt-2">View My Tasks</a>
                </div>
                <i class="menu-icon typcn typcn-document-add icon-lg"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 grid-margin stretch-card">
            <div class="card text-white bg-warning">
              <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="card-title text-white">Inventory</h6>
                  <a href="<?= site_url('staff/inventory') ?>" class="btn btn-light btn-sm mt-2">Lookup Inventory</a>
                </div>
                <i class="menu-icon typcn typcn-bell icon-lg"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
