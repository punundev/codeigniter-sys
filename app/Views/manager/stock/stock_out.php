php
<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Stock Out
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Stock Out
                </h4>

                   <form action="<?= site_url('manager/stock/stock-out/store') ?>"
      method="post">

    <?= csrf_field() ?>

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Stock Item
            </label>

            <select name="stock_item_id"
                    class="form-control"
                    required>

                <option value="">
                    -- Select Stock --
                </option>

                <?php if (!empty($items)): ?>

                    <?php foreach ($items as $item): ?>

                        <option value="<?= $item['id'] ?>">

                            <?= esc($item['item_name']) ?>

                            - Available:
                            <?= esc($item['quantity']) ?>

                        </option>

                    <?php endforeach; ?>

                <?php endif; ?>

            </select>

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Quantity
            </label>

            <input type="number"
                   name="quantity"
                   class="form-control"
                   min="1"
                   required>

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Issued To
            </label>

            <input type="text"
                   name="issued_to"
                   class="form-control">

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Department / Section
            </label>

            <input type="text"
                   name="section"
                   class="form-control">

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                Reference Number
            </label>

            <input type="text"
                   name="reference_no"
                   class="form-control">

        </div>

        <div class="col-md-12 mb-3">

            <label class="form-label">
                Notes
            </label>

            <textarea name="notes"
                      class="form-control"
                      rows="4"></textarea>

        </div>

    </div>

    <div class="d-flex" style="gap: 4px;">
        <button type="submit"
                class="btn btn-warning">
            Save Stock Out
        </button>

        <a href="<?= site_url('manager/stock') ?>"
           class="btn btn-secondary">
            Cancel
        </a>
    </div>

</form>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>

