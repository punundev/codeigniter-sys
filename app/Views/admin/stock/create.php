```php
<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Add Stock
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12">

        <div class="card">

            <div class="card-body">

                <h4 class="card-title">
                    Add New Stock
                </h4>

                <form action="<?= site_url('admin/stock/store') ?>"
                      method="post">

                    <?= csrf_field() ?>

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Item Name
                            </label>

                            <input type="text"
                                   name="item_name"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <input type="text"
                                   name="category"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Manufacturer
                            </label>

                            <input type="text"
                                   name="manufacturer"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Model
                            </label>

                            <input type="text"
                                   name="model"
                                   class="form-control">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Quantity
                            </label>

                            <input type="number"
                                   name="quantity"
                                   class="form-control"
                                   min="0"
                                   value="0"
                                   required>

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Minimum Stock
                            </label>

                            <input type="number"
                                   name="minimum_stock"
                                   class="form-control"
                                   min="0"
                                   value="5">

                        </div>

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Unit
                            </label>

                            <input type="text"
                                   name="unit"
                                   class="form-control"
                                   placeholder="pcs">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Location
                            </label>

                            <input type="text"
                                   name="location"
                                   class="form-control">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Supplier
                            </label>

                            <input type="text"
                                   name="supplier"
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
                            class="btn btn-success">
                        Save Stock
                    </button>

                    <a href="<?= site_url('admin/stock') ?>"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>
```
