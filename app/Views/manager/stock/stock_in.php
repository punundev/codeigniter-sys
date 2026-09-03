php
<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Stock In
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Stock In
                </h4>

<form action="<?= site_url('manager/stock/stock-in/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Stock Item
                            </label>
  

<select name="stock_item_id" class="form-control" required>
    <option value="">-- Select Item --</option>

    <?php foreach ($stockItems as $item): ?>
        <option value="<?= $item['id'] ?>">
            <?= esc($item['item_name']) ?>
        </option>
    <?php endforeach; ?>
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
                                Supplier
                            </label>

                            <input type="text"
                                   name="supplier"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Reference Number
                            </label>

                            <input type="text"
                                   name="reference_number"
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

                    <button type="submit"
                            class="btn btn-primary">
                        Save Stock In
                    </button>

                    <a href="<?= site_url('manager/stock') ?>"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?php if (session()->getFlashdata('error')): ?>

<script>
    alert("<?= esc(session()->getFlashdata('error')) ?>");
</script>

<?php endif; ?>


<?= $this->endSection() ?>

