<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Stock List
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-body">

        <h4 class="card-title">
            Stock List
        </h4>

        <!-- ==========================
             BUTTONS
        =========================== -->

        <div class="mb-3 d-flex flex-wrap" style="gap: 4px;">
            <a href="<?= site_url('admin/stock/create') ?>"
              class="btn btn-primary btn-sm">
                Add Stock
            </a>

            <a href="<?= site_url('admin/stock/stock-in') ?>"
             class="btn btn-primary btn-sm">
                Stock In
            </a>

            <a href="<?= site_url('admin/stock/stock-out') ?>"
               class="btn btn-primary btn-sm">
                Stock Out
            </a>

            <a href="<?= site_url('admin/stock/reports') ?>"
               class="btn btn-primary btn-sm">
                View Reports
            </a>
        </div>

        <!-- ==========================
             FILTERS
        =========================== -->

        <div class="row g-2 mb-3">

            <!-- Search -->

            <div class="col-md-3">

                <input type="text"
                       id="stockSearch"
                       class="form-control"
                       placeholder="Search stock...">

            </div>


            <!-- Category -->

            <div class="col-md-3">

                <select id="categoryFilter"
                        class="form-select">

                    <option value="">
                        All Categories
                    </option>

                    <?php foreach ($categories as $c): ?>

                        <option value="<?= esc($c['category']) ?>">

                            <?= esc($c['category']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- Manufacturer -->

            <div class="col-md-3">

                <select id="manufacturerFilter"
                        class="form-select">

                    <option value="">
                        All Manufacturers
                    </option>

                    <?php foreach ($manufacturers as $m): ?>

                        <option value="<?= esc($m['manufacturer']) ?>">

                            <?= esc($m['manufacturer']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- Location -->

            <div class="col-md-3">

                <select id="locationFilter"
                        class="form-select">

                    <option value="">
                        All Locations
                    </option>

                    <?php foreach ($locations as $l): ?>

                        <option value="<?= esc($l['location']) ?>">

                            <?= esc($l['location']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

        </div>


        <!-- Loading -->

        <div id="loading"
             class="text-center"
             style="display:none;">

            Loading...

        </div>


        <!-- Result -->

        <div id="resultCount"
             class="mb-2">
        </div>


        <!-- ==========================
             TABLE
        =========================== -->

        <div class="table-responsive">

            <table class="table table-striped table-hover">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Stock Code</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Manufacturer</th>
                        <th>Model</th>
                        <th>Unit</th>
                        <th>Location</th>
                        <th>Shelf</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody id="stockTableBody">

                    <?php foreach ($stock as $item): ?>

                        <tr>

                            <td><?= esc($item['id']) ?></td>

                            <td><?= esc($item['stock_code']) ?></td>

                            <td><?= esc($item['item_name']) ?></td>

                            <td><?= esc($item['category']) ?></td>

                            <td><?= esc($item['manufacturer']) ?></td>

                            <td><?= esc($item['model']) ?></td>

                            <td><?= esc($item['unit']) ?></td>

                            <td><?= esc($item['location']) ?></td>

                            <td><?= esc($item['shelf']) ?></td>

                            <td>
                                <div class="d-flex" style="gap: 4px;">
                                    <a href="<?= site_url('admin/stock/edit/' . $item['id']) ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <a href="<?= site_url('admin/stock/delete/' . $item['id']) ?>"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this stock?')">
                                        Delete
                                    </a>
                                </div>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <small class="text-muted">
                    Showing Page <?= esc($pager->getCurrentPage()) ?> of <?= esc($pager->getPageCount()) ?>
                </small>
            </div>
            <div>
                <?= $pager->links('default', 'bootstrap_pagination') ?>
            </div>
        </div>

    </div>

</div>


<!-- ==========================
     AJAX
=========================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const search =
        document.getElementById('stockSearch');

    const category =
        document.getElementById('categoryFilter');

    const manufacturer =
        document.getElementById('manufacturerFilter');

    const location =
        document.getElementById('locationFilter');

    const tableBody =
        document.getElementById('stockTableBody');

    const loading =
        document.getElementById('loading');

    const resultCount =
        document.getElementById('resultCount');


    function loadStock() {

        const params = new URLSearchParams({

            search: search.value,

            category: category.value,

            manufacturer: manufacturer.value,

            location: location.value

        });


        loading.style.display = 'block';


        fetch(
            "<?= site_url('admin/stock/ajaxFilter') ?>?" +
            params.toString()
        )

        .then(response => response.json())

        .then(response => {

            tableBody.innerHTML = '';


            if (
                !response.data ||
                response.data.length === 0
            ) {

                tableBody.innerHTML = `

                    <tr>

                        <td colspan="10"
                            class="text-center text-danger">

                            No stock found

                        </td>

                    </tr>

                `;

                resultCount.innerHTML = '';

                return;

            }


            response.data.forEach(function(item) {

                tableBody.innerHTML += `

                    <tr>

                        <td>
                            ${escapeHtml(item.id)}
                        </td>

                        <td>
                            ${escapeHtml(item.stock_code)}
                        </td>

                        <td>
                            ${escapeHtml(item.item_name)}
                        </td>

                        <td>
                            ${escapeHtml(item.category)}
                        </td>

                        <td>
                            ${escapeHtml(item.manufacturer)}
                        </td>

                        <td>
                            ${escapeHtml(item.model)}
                        </td>

                        <td>
                            ${escapeHtml(item.unit)}
                        </td>

                        <td>
                            ${escapeHtml(item.location)}
                        </td>

                        <td>
                            ${escapeHtml(item.shelf)}
                        </td>

                        <td>
                            <div class="d-flex" style="gap: 4px;">
                                <a href="<?= site_url('admin/stock/edit') ?>/${item.id}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="<?= site_url('admin/stock/delete') ?>/${item.id}"
                                   class="btn btn-danger btn-sm">
                                    Delete
                                </a>
                            </div>
                        </td>

                    </tr>

                `;

            });


            resultCount.innerHTML =
                response.count +
                ' record(s) found';

        })

        .catch(error => {

            console.error(error);

            tableBody.innerHTML = `

                <tr>

                    <td colspan="10"
                        class="text-center text-danger">

                        Error loading stock

                    </td>

                </tr>

            `;

        })

        .finally(function() {

            loading.style.display = 'none';

        });

    }


    // Select filters

    category.addEventListener(
        'change',
        loadStock
    );

    manufacturer.addEventListener(
        'change',
        loadStock
    );

    location.addEventListener(
        'change',
        loadStock
    );


    // Search

    search.addEventListener(
        'input',
        loadStock
    );


    function escapeHtml(value) {

        if (
            value === null ||
            value === undefined
        ) {

            return '';

        }

        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

});

</script>

<?= $this->endSection() ?>
