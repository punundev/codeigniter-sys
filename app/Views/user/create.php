<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add user
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add user</h4>
        <form class="forms-sample" action="<?= site_url('user/store') ?>" method="post">
          <div class="form-group">
            <label for="device_name">User Name</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
          </div>
          <div class="form-group">
            <label for="fullname">fullname</label>
            <input type="text" name="fullname" id="manufacturer" class="form-control" placeholder="fullname">
          </div>
          <div class="form-group">
            <label for="email">Model</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="email">
          </div>
          <div class="form-group">
            <label for="phone">Assigned To</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="phone">
          </div>
          <div class="form-group">
            <label for="role">Role</label>

             <select name="role" id="role" class="form-control">
             <option value="Admin">Admin</option>
             <option value="Manager">Mamager</option>
             <option value="User">User</option>
             </select>
          </div>
          <div class="form-group">
            <label for="action">Action</label>
            <select name='status' class='form-control'>
            <option value='1'>Active</option>
            <option value='0'>Inactive</option>
           </select>
          </div>
          <button type="submit" class="btn btn-success mr-2 font-weight-semibold">Save</button>
          <a href="<?= site_url('user') ?>" class="btn btn-light font-weight-semibold">Back</a>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
