<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Stock Reports
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card shadow-sm border-0">

    <div class="card-body">

        <h4 class="card-title">
            Stock Reports
        </h4>

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Stock Code</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Stock In</th>
                        <th>Stock Out</th>
                        <th>Avalible</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach ($reports as $row): ?>

                    <?php
                        $stockIn  = (int) $row['stock_in'];
                        $stockOut = (int) $row['stock_out'];
                        $balance  = $stockIn - $stockOut;
                    ?>

                    <tr>

                        <td>
                            <?= esc($row['stock_code']) ?>
                        </td>

                        <td>
                            <?= esc($row['item_name']) ?>
                        </td>

                        <td>
                            <?= esc($row['category']) ?>
                        </td>

                        <td>
                            <?= esc($row['manufacturer']) ?>
                        </td>

                        <td>
                            <?= esc($row['model']) ?>
                        </td>

                        <td class="text-success">
                            <?= $stockIn ?>
                        </td>

                        <td class="text-danger">
                            <?= $stockOut ?>
                        </td>

                        <td>
                            <?php if ($balance <= $row['minimum_stock']): ?>

                                <span class="badge badge-danger">
                                    <?= $balance ?>
                                </span>

                            <?php else: ?>

                                <span class="badge badge-success">
                                    <?= $balance ?>
                                </span>

                            <?php endif; ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
