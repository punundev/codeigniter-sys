<div class="container mt-4">

<h3>Add User</h3>

<form action="<?= site_url('admin/user') ?>" method="post">

    <?= csrf_field() ?>

    <div class="mb-3">
        <label>Username</label>
        <input type="text"
               name="username"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password"
               name="password"
               class="form-control"
               required>
    </div>

    <div class="mb-3">
        <label>Full Name</label>
        <input type="text"
               name="fullname"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email"
               name="email"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Role</label>

        <select name="role" class="form-select">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>

    </div>

    <div class="mb-3">
        <label>Status</label>

        <select name="status" class="form-select">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

    </div>

    <button type="submit"
            class="btn btn-success">
        Save
    </button>

    <a href="<?= site_url('admin/users') ?>"
        class="btn btn-secondary">
        Cancel
    </a>

</form>

</div>
