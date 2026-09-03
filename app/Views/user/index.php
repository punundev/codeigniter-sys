<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Inventory List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">User List</h4>
        <div class="d-flex justify-content-between mb-3">
          <div>
            <a href="<?= site_url('user/create') ?>" class="btn btn-success font-weight-semibold">Add Users</a>
            <a href="<?= site_url('user/export') ?>" class="btn btn-success font-weight-semibold">Export Users</a>
          </div>
          <form method="get" action="<?= site_url('user') ?>" class="form-inline">
            <input type="text" name="search" class="form-control mr-2" placeholder="Search..." value="<?= esc($search ?? '') ?>">
            <button class="btn btn-primary font-weight-semibold">Search</button>
          </form>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
               <?php foreach ($users as $u): ?>
              <tr>
                  <td><?= $u['id'] ?></td>
                  <td><?= esc($u['username']) ?></td>
                  <td><?= esc($u['fullname']) ?></td>
                  <td><?= esc($u['email']) ?></td>
                  <td><?= esc($u['phone']) ?></td>
                  <td><?= esc($u['role']) ?></td>
		  <td><?= esc($u['status']) ?></td>
                 <td>
                      <a href="<?= site_url('user/edit/' . $u['id']) ?>" class="btn btn-warning btn-xs">Edit</a>
                      <a href="<?= site_url('user/delete/' . $u['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete this record?')">Delete</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="mt-3">
          <?= $pager->links() ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
