```php
<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Low Stock
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title text-danger">
                    Low Stock
                </h4>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                        <thead>

                            <tr>
                                <th>ID</th>
                                <th>Item Name</th>
                                <th>Category</th>
                                <th>Manufacturer</th>
                                <th>Model</th>
                                <th>Current Quantity</th>
                                <th>Minimum Stock</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($stock)): ?>

                                <?php foreach ($stock as $item): ?>

                                    <tr>

                                        <td>
                                            <?= esc($item['id']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['item_name']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['category']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['manufacturer']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['model']) ?>
                                        </td>

                                        <td class="text-danger font-weight-bold">

                                            <?= esc($item['quantity']) ?>

                                        </td>

                                        <td>
                                            <?= esc($item['minimum_stock']) ?>
                                        </td>

                                        <td>
                                            <?= esc($item['location']) ?>
                                        </td>

                                        <td>

                                            <a href="<?= site_url('stock/stock-in') ?>"
                                               class="btn btn-primary btn-sm">
                                                Stock In
                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td colspan="9"
                                        class="text-center text-success">

                                        No low stock items.

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
