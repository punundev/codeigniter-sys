<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Edit Stock
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Edit Stock
                </h4>

                <form action="<?= site_url('manager/stock/update/' . $stock['id']) ?>"
                      method="post">

                    <?= csrf_field() ?>

                    <!-- Stock Code -->
                    <div class="form-group mb-3">
                        <label>Stock Code</label>

                        <input type="text"
                               name="stock_code"
                               class="form-control"
                               value="<?= esc($stock['stock_code'] ?? '') ?>"
                               required>
                    </div>

                    <!-- Item Name -->
                    <div class="form-group mb-3">
                        <label>Item Name</label>

                        <input type="text"
                               name="item_name"
                               class="form-control"
                               value="<?= esc($stock['item_name'] ?? '') ?>"
                               required>
                    </div>

                    <!-- Category -->
                    <div class="form-group mb-3">
                        <label>Category</label>

                        <input type="text"
                               name="category"
                               class="form-control"
                               value="<?= esc($stock['category'] ?? '') ?>">
                    </div>

                    <!-- Manufacturer -->
                    <div class="form-group mb-3">
                        <label>Manufacturer</label>

                        <input type="text"
                               name="manufacturer"
                               class="form-control"
                               value="<?= esc($stock['manufacturer'] ?? '') ?>">
                    </div>

                    <!-- Model -->
                    <div class="form-group mb-3">
                        <label>Model</label>

                        <input type="text"
                               name="model"
                               class="form-control"
                               value="<?= esc($stock['model'] ?? '') ?>">
                    </div>

                    <!-- Part Number -->
                    <div class="form-group mb-3">
                        <label>Part Number</label>

                        <input type="text"
                               name="part_number"
                               class="form-control"
                               value="<?= esc($stock['part_number'] ?? '') ?>">
                    </div>

                    <!-- Unit -->
                    <div class="form-group mb-3">
                        <label>Unit</label>

                        <input type="text"
                               name="unit"
                               class="form-control"
                               value="<?= esc($stock['unit'] ?? '') ?>">
                    </div>

                    <!-- Minimum Stock -->
                    <div class="form-group mb-3">
                        <label>Minimum Stock</label>

                        <input type="number"
                               name="minimum_stock"
                               class="form-control"
                               value="<?= esc($stock['minimum_stock'] ?? 0) ?>">
                    </div>

                    <!-- Location -->
                    <div class="form-group mb-3">
                        <label>Location</label>

                        <input type="text"
                               name="location"
                               class="form-control"
                               value="<?= esc($stock['location'] ?? '') ?>">
                    </div>

                    <!-- Shelf -->
                    <div class="form-group mb-3">
                        <label>Shelf</label>

                        <input type="text"
                               name="shelf"
                               class="form-control"
                               value="<?= esc($stock['shelf'] ?? '') ?>">
                    </div>

                    <!-- Notes -->
                    <div class="form-group mb-3">
                        <label>Notes</label>

                        <textarea name="notes"
                                  class="form-control"
                                  rows="4"><?= esc($stock['notes'] ?? '') ?></textarea>
                    </div>

                    <div class="d-flex" style="gap: 4px;">
                        <button type="submit"
                                class="btn btn-primary">
                            Update Stock
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
