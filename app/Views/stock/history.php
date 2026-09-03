```php
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Stock History
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Stock History
                </h4>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Item</th>
                                <th>Type</th>
                                <th>Quantity</th>
                                <th>User</th>
                                <th>Reference</th>
                                <th>Notes</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($history)): ?>

                                <?php foreach ($history as $row): ?>

                                    <tr>

                                        <td>
                                            <?= esc($row['id']) ?>
                                        </td>

                                        <td>
                                            <?= esc($row['created_at']) ?>
                                        </td>

                                        <td>
                                            <?= esc($row['item_name']) ?>
                                        </td>

                                        <td>

                                            <?php if ($row['transaction_type'] === 'IN'): ?>

                                                <span class="badge bg-success">
                                                    STOCK IN
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-danger">
                                                    STOCK OUT
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td>
                                            <?= esc($row['quantity']) ?>
                                        </td>

                                        <td>
                                            <?= esc($row['created_by']) ?>
                                        </td>

                                        <td>
                                            <?= esc($row['reference_number']) ?>
                                        </td>

                                        <td>
                                            <?= esc($row['notes']) ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="8"
                                        class="text-center">
                                        No history found
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
```
