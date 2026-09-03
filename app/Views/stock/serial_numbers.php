```php
<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Serial Numbers
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Serial Numbers
                </h4>

                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Item Name</th>
                                <th>Serial Number</th>
                                <th>Manufacturer</th>
                                <th>Model</th>
                                <th>Status</th>
                                <th>Assigned To</th>
                                <th>Location</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($serialNumbers)): ?>

                                <?php foreach ($serialNumbers as $item): ?>

                                    <tr>

                                        <td>
                                            <?= esc($item['id']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['item_name']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['serial_number']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['manufacturer']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['model']) ?>
                                        </td>

                                        <td>

                                            <?php if ($item['status'] === 'Available'): ?>

                                                <span class="badge bg-success">
                                                    Available
                                                </span>

                                            <?php elseif ($item['status'] === 'Assigned'): ?>

                                                <span class="badge bg-primary">
                                                    Assigned
                                                </span>

                                            <?php else: ?>

                                                <span class="badge bg-secondary">
                                                    <?= esc($item['status']) ?>
                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td>
                                            <?= esc($item['assigned_to']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['location']) ?>
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="8"
                                        class="text-center">

                                        No serial numbers found.

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
