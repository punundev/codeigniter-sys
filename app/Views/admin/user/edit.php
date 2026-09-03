<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit User
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">

                <h4 class="card-title">Edit User</h4>

                <form class="forms-sample"
                      action="<?= site_url('admin/user/update/' . $user['id']) ?>"
                      method="post">

                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="text"
                               name="username"
                               id="username"
                               class="form-control"
                               value="<?= esc($user['username']) ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control"
                               placeholder="Leave blank to keep current password">
                    </div>

                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text"
                               name="fullname"
                               id="fullname"
                               class="form-control"
                               value="<?= esc($user['fullname']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               value="<?= esc($user['email']) ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text"
                               name="phone"
                               id="phone"
                               class="form-control"
                               value="<?= esc($user['phone']) ?>">
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="role">Role</label>

                        <select name="role" id="role" class="form-control">

                            <option value="Admin"
                                <?= ($user['role'] == 'Admin') ? 'selected' : '' ?>>
                                Admin
                            </option>

                            <option value="Manager"
                                <?= ($user['role'] == 'Manager') ? 'selected' : '' ?>>
                                Manager
                            </option>

                            <option value="User"
                                <?= ($user['role'] == 'User') ? 'selected' : '' ?>>
                                User
                            </option>

                        </select>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>

                        <select name="status" id="status" class="form-control">

                            <option value="Active"
                                <?= ($user['status'] == 'Active') ? 'selected' : '' ?>>
                                Active
                            </option>

                            <option value="Inactive"
                                <?= ($user['status'] == 'Inactive') ? 'selected' : '' ?>>
                                Inactive
                            </option>

                        </select>
                    </div>

                    <button type="submit"
                            class="btn btn-primary mr-2 font-weight-semibold">
                        Update
                    </button>

                    <a href="<?= site_url('admin/user') ?>"
                       class="btn btn-light font-weight-semibold">
                        Back
                    </a>

                </form>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
