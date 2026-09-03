<div class="container mt-4">

<h3>Edit User</h3>

<form action="<?= site_url('admin/update/'.$user['id']) ?>" method="post">

    <?= csrf_field() ?>

    <div class="mb-3">
        <label>Username</label>

        <input type="text"
               name="username"
               value="<?= esc($user['username']) ?>"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Full Name</label>

        <input type="text"
               name="fullname"
               value="<?= esc($user['fullname']) ?>"
               class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>

        <input type="email"
               name="email"
               value="<?= esc($user['email']) ?>"
               class="form-control">
    </div>

    <div class="mb-3">

        <label>Role</label>

        <select name="role" class="form-select">

            <option value="Admin"
                <?= $user['role']=='Admin'?'selected':'' ?>>
                Admin
            </option>

            <option value="User"
                <?= $user['role']=='User'?'selected':'' ?>>
                User
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label>Status</label>

        <select name="status" class="form-select">

            <option value="Active"
                <?= $user['status']=='Active'?'selected':'' ?>>
                Active
            </option>

            <option value="Inactive"
                <?= $user['status']=='Inactive'?'selected':'' ?>>
                Inactive
            </option>

        </select>

    </div>

    <button type="submit"
            class="btn btn-primary">
        Update
    </button>

    <a href="<?= site_url('admin/users') ?>"
        class="btn btn-secondary">
        Cancel
    </a>

</form>

</div>
