<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Add User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add User</h4>
        <form class="forms-sample" action="<?= site_url('admin/user/store') ?>" method="post">
          <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
          </div>
          <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
             <select name="role" id="role" class="form-control">
             <option value="Admin">Admin</option>
             <option value="Manager">Manager</option>
             <option value="User">User</option>
             </select>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
           </select>
          </div>
          <button type="submit" class="btn btn-success mr-2 font-weight-semibold">Save</button>
          <a href="<?= site_url('admin/user') ?>" class="btn btn-light font-weight-semibold">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

