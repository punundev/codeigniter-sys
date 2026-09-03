php
<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Inventory List
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">

            <div class="card-body">

                <!-- =========================================
                     TITLE
                ========================================== -->

                <h4 class="card-title">
                    Inventory List
                </h4>


                <!-- =========================================
                     TOP BUTTONS + SEARCH
                ========================================== -->

                <div class="d-flex justify-content-between align-items-center mb-3">

                    <!-- Left -->
                    <div>

                        <a href="<?= site_url('manager/inventory/create') ?>"
                           class="btn btn-success font-weight-semibold">
                            Add Inventory
                        </a>

                        <a href="<?= site_url('manager/inventory/export') ?>"
                           class="btn btn-success font-weight-semibold">
                            Export Excel
                        </a>

                    </div>
                    <div class="">
                                 <h2 class="font-weight-bold">
                                 <?= number_format($totalComputers ?? 0) ?>
                                </h2>
                    </div>

                    <!-- Right - Search -->
                    <div>

                        <form method="get"
                              action="<?= site_url('manager/inventory') ?>"
                              class="d-flex">

                            <input type="text"
                                   name="search"
                                   class="form-control me-2"
                                   placeholder="Search..."
                                   value="<?= esc($search ?? '') ?>">

                            <button type="submit"
                                    class="btn btn-primary">
                                Search
                            </button>

                        </form>

                    </div>

                </div>


                <!-- =========================================
                     FILTERS
                ========================================== -->

                <div class="row g-2 mb-3">

                 <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                 <select name="manufacturer" id="manufacturerFilter" class="form-select filterSelect">

        <option value="">
            All Model
        </option>

        <?php foreach ($manufacturers as $m): ?>

            <option value="<?= esc($m['manufacturer']) ?>"
                <?= ($manufacturer ?? '') == $m['manufacturer'] ? 'selected' : '' ?>>

                <?= esc($m['manufacturer']) ?>

            </option>

        <?php endforeach; ?>

    </select>
   </div>





                    <!-- RAM -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-1">

                        <select name="ram"
                                id="ramFilter"
                                class="form-select filterSelect">

                            <option value="">
                                All RAM
                            </option>

                            <?php foreach ($rams as $r): ?>

                                <option value="<?= esc($r['ram']) ?>"
                                    <?= $ram == $r['ram'] ? 'selected' : '' ?>>

                                    <?= esc($r['ram']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>



                    <!-- Processor -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">

                        <select name="processor"
                                id="processorFilter"
                                class="form-select filterSelect">

                            <option value="">
                                All Processor
                            </option>

                            <?php foreach ($processors as $p): ?>

                                <option value="<?= esc($p['processor']) ?>"
                                    <?= $processor == $p['processor'] ? 'selected' : '' ?>>

                                    <?= esc($p['processor']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- Windows -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">

                        <select name="windows"
                                id="windowsFilter"
                                class="form-select filterSelect">

                            <option value="">
                                All Windows
                            </option>

                            <?php foreach ($windowsList as $w): ?>

                                <option value="<?= esc($w['operating_system']) ?>"
                                    <?= $windows == $w['operating_system'] ? 'selected' : '' ?>>

                                    <?= esc($w['operating_system']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- Section -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">

                        <select name="section"
                                id="sectionFilter"
                                class="form-select filterSelect">

                            <option value="">
                                All Sections
                            </option>

                            <?php foreach ($sections as $s): ?>

                                <option value="<?= esc($s['sections']) ?>"
                                    <?= $section == $s['sections'] ? 'selected' : '' ?>>

                                    <?= esc($s['sections']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- Type -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">

                        <select name="type"
                                id="typeFilter"
                                class="form-select filterSelect">

                            <option value="">
                                All Types
                            </option>

                            <?php foreach ($types as $t): ?>

                                <option value="<?= esc($t['type']) ?>"
                                    <?= $type == $t['type'] ? 'selected' : '' ?>>

                                    <?= esc($t['type']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- Clear -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-1">

                        <a href="<?= site_url('manager/inventory') ?>"
                           class="btn btn-secondary w-100">

                            Clear

                        </a>

                    </div>

                </div>


                <!-- =========================================
                     AJAX LOADING
                ========================================== -->

                <div id="filterLoading"
                     class="text-center mb-2"
                     style="display:none;">

                    <div class="spinner-border text-primary"
                         role="status">

                        <span class="visually-hidden">
                            Loading...
                        </span>

                    </div>

                    <div>
                        Loading...
                    </div>

                </div>


                <div id="filterResult"
                     class="mb-2">
                </div>


                <!-- =========================================
                     TABLE
                ========================================== -->

                <div class="table-responsive">

                    <table class="table table-striped table-hover">

                        <thead>

                            <tr>

                                <th>ID</th>
                                <th>Serial No.</th>
                                <th>Type</th>
                                <th>Manufacturer</th>
                                <th>Model</th>
                                <th>Processor</th>
                                <th>RAM</th>
                                <th>Storage</th>
                                <th>Monitor</th>
                                <th>OS</th>
                                <th>Sections</th>
                                <th>Assigned User</th>
                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody id="inventoryTableBody">

                            <?php foreach ($inventory as $item): ?>

                                <tr>

                                    <td>
                                        <?= esc($item['id']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['serial_number']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['type']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['manufacturer']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['model']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['processor']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['ram']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['storage']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['monitor']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['operating_system']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['sections']) ?>
                                    </td>

                                    <td>
                                        <?= esc($item['assigned_user']) ?>
                                    </td>

                                    <td>
                                  <button type="button" class="btn btn-info btn-sm btn-view" data-id="<?= $item['id'] ?>"> View </button>
                                  <a href="<?= site_url('manager/inventory/edit/' . $item['id']) ?>" class="btn btn-warning btn-xs">Edit</a>
                                  <a href="<?= site_url('manager/inventory/delete/' . $item['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete this record?')">Delete</a>
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
            <!-- END card-body -->

        </div>
        <!-- END card -->

    </div>
    <!-- END col-lg-12 -->

</div>
<!-- END row -->


<!-- =========================================
     VIEW MODAL
========================================== -->

<!-- =========================================
     AJAX FILTER SCRIPT
========================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const filters =
        document.querySelectorAll('.filterSelect');

    const tableBody =
        document.getElementById('inventoryTableBody');

    const loading =
        document.getElementById('filterLoading');

    const result =
        document.getElementById('filterResult');

    /*
    ========================================
    FILTER CHANGE
    ========================================
    */

    filters.forEach(function (filter) {

        filter.addEventListener('change', function () {

            loadInventory();

        });

    });


    /*
    ========================================
    AJAX FILTER
    ========================================
    */

    function loadInventory() {

        const ram =  document.getElementById('ramFilter').value;

        const processor =     document.getElementById('processorFilter').value;

        const windows =     document.getElementById('windowsFilter').value;

        const section =     document.getElementById('sectionFilter').value;

        const type =    document.getElementById('typeFilter').value;
       const manufacturer = document.getElementById('manufacturerFilter').value;

        loading.style.display = 'block';


        const url =
            "<?= site_url('manager/inventory/ajaxFilter') ?>" +

            "?ram=" + encodeURIComponent(ram) +

            "&processor=" + encodeURIComponent(processor) +

            "&windows=" + encodeURIComponent(windows) +

            "&section=" + encodeURIComponent(section) +

            "&type=" + encodeURIComponent(type) +
            "&manufacturer=" + encodeURIComponent(manufacturer); 

        fetch(url, {

            method: 'GET',

            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }

        })

        .then(response => {

            if (!response.ok) {

                throw new Error(
                    'Network response was not OK'
                );

            }

            return response.json();

        })

        .then(response => {

            tableBody.innerHTML = '';


            /*
            No results
            */

            if (
                !response.data ||
                response.data.length === 0
            ) {

                tableBody.innerHTML = `

                    <tr>

                        <td colspan="14"
                            class="text-center text-danger">

                            No inventory found

                        </td>

                    </tr>

                `;

                result.innerHTML = '';

                return;

            }


            /*
            Create rows
            */

            response.data.forEach(function (item) {

                tableBody.innerHTML += `

                    <tr>

                        <td>
                            ${escapeHtml(item.id)}
                        </td>

                        <td>
                            ${escapeHtml(item.serial_number)}
                        </td>

                        <td>
                            ${escapeHtml(item.type)}
                        </td>

                        <td>
                            ${escapeHtml(item.manufacturer)}
                        </td>

                        <td>
                            ${escapeHtml(item.model)}
                        </td>

                        <td>
                            ${escapeHtml(item.processor)}
                        </td>

                        <td>
                            ${escapeHtml(item.ram)}
                        </td>

                        <td>
                            ${escapeHtml(item.storage)}
                        </td>

                        <td>
                            ${escapeHtml(item.monitor)}
                        </td>

                        <td>
                            ${escapeHtml(item.operating_system)}
                        </td>

                        <td>
                            ${escapeHtml(item.sections)}
                        </td>

                        <td>
                            ${escapeHtml(item.assigned_user)}
                        </td>

                        <td>
                          <button type="button" class="btn btn-info btn-sm btn-view" data-id="${item.id}"> View </button>
                            <a href="<?= site_url('manager/inventory/edit') ?>/${item.id}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('manager/inventory/delete/' . $item['id']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Delete this record?')">Delete</a>
                        </td>

                    </tr>

                `;

            });


            /*
            Number of results
            */

            result.innerHTML =
                '<span class="text-muted">' +
                response.count +
                ' record(s) found' +
                '</span>';

        })

        .catch(error => {

            console.error(
                'AJAX Error:',
                error
            );


            tableBody.innerHTML = `

                <tr>

                    <td colspan="14"
                        class="text-center text-danger">

                        Error loading inventory

                    </td>

                </tr>

            `;

        })

        .finally(function () {

            loading.style.display = 'none';

        });

    }


    /*
    ========================================
    ESCAPE HTML
    ========================================
    */

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


    /*
    ========================================
    VIEW INVENTORY
    ========================================
    */
});
</script>
<!-----------------------------------------------End combox--!>
<!-- VIEW INVENTORY MODAL -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header bg-primary text-white">

                <h5 class="modal-title">
                    Inventory Information
                </h5>
           <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close </button>
            </div>

            <div class="modal-body">

                <div id="popupBody">
                    Loading...
                </div>

            </div>

        </div>

    </div>

</div>
<!-- =========================================
     VIEW MODAL
========================================== -->
<script>

document.addEventListener('click', function (event) {

    const button = event.target.closest('.btn-view');

    if (!button) {
        return;
    }

    const id = button.dataset.id;

    // Show loading message
    document.getElementById('popupBody').innerHTML = `
        <div class="text-center p-4">
            <div class="spinner-border text-primary"></div>
            <p class="mt-2">Loading inventory...</p>
        </div>
    `;

    // Open modal
    const modalElement = document.getElementById('viewModal');
    const modal = new bootstrap.Modal(modalElement);
    modal.show();

    // Get inventory information
    fetch("<?= site_url('manager/inventory/view') ?>/" + id)

        .then(response => {

            if (!response.ok) {
                throw new Error('Inventory not found');
            }

            return response.json();

        })

        .then(data => {

            document.getElementById('popupBody').innerHTML = `

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <tr>
                            <th width="20%">ID</th>
                            <td width="30%">${escapeHtml(data.id)}</td>

                            <th width="20%">Device Name</th>
                            <td width="30%">${escapeHtml(data.device_name)}</td>
                        </tr>

                        <tr>
                            <th>Serial Number</th>
                            <td>${escapeHtml(data.serial_number)}</td>

                            <th>Type</th>
                            <td>${escapeHtml(data.type)}</td>
                        </tr>

                        <tr>
                            <th>Manufacturer</th>
                            <td>${escapeHtml(data.manufacturer)}</td>

                            <th>Model</th>
                            <td>${escapeHtml(data.model)}</td>
                        </tr>

                        <tr>
                            <th>Processor</th>
                            <td>${escapeHtml(data.processor)}</td>

                            <th>Processor Full Name</th>
                            <td>${escapeHtml(data.processor_full_name)}</td>
                        </tr>

                        <tr>
                            <th>RAM</th>
                            <td>${escapeHtml(data.ram)}</td>

                            <th>Storage</th>
                            <td>${escapeHtml(data.storage)}</td>
                        </tr>

                        <tr>
                            <th>Monitor</th>
                            <td>${escapeHtml(data.monitor)}</td>

                            <th>Operating System</th>
                            <td>${escapeHtml(data.operating_system)}</td>
                        </tr>

                        <tr>
                            <th>License Status</th>
                            <td>${escapeHtml(data.license_status)}</td>

                            <th>MAC Address</th>
                            <td>${escapeHtml(data.mac_address)}</td>
                        </tr>

                        <tr>
                            <th>Assigned User</th>
                            <td>${escapeHtml(data.assigned_user)}</td>

                            <th>Owner</th>
                            <td>${escapeHtml(data.owner)}</td>
                        </tr>

                        <tr>
                            <th>Internet Location</th>
                            <td>${escapeHtml(data.internet_location)}</td>

                            <th>Section</th>
                            <td>${escapeHtml(data.sections)}</td>
                        </tr>

                        <tr>
                            <th>Location</th>
                            <td>${escapeHtml(data.location)}</td>

                            <th>Warranty Information</th>
                            <td>${escapeHtml(data.warranty_information)}</td>
                        </tr>

                        <tr>
                            <th>Year of Manufacture</th>
                            <td>${escapeHtml(data.year_of_manufacture)}</td>

                            <th>Expired Year</th>
                            <td>${escapeHtml(data.expired_year)}</td>
                        </tr>

                        <tr>
                            <th>Expired Date</th>
                            <td>${escapeHtml(data.expired_date)}</td>

                            <th>Registered By</th>
                            <td>${escapeHtml(data.registered_by)}</td>
                        </tr>

                        <tr>
                            <th>Registered Date</th>
                            <td>${escapeHtml(data.registered_date)}</td>

                            <th>Checked By</th>
                            <td>${escapeHtml(data.checked_by)}</td>
                        </tr>

                        <tr>
                            <th>Checked Date</th>
                            <td>${escapeHtml(data.checked_date)}</td>

                            <th>Created At</th>
                            <td>${escapeHtml(data.created_at)}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>${escapeHtml(data.updated_at)}</td>

                            <th>Photo</th>
                            <td>
                                ${data.photo
                                    ? escapeHtml(data.photo)
                                    : 'No Photo'}
                            </td>
                        </tr>

                        <tr>
                            <th>Notes</th>
                            <td colspan="3">
                                ${escapeHtml(data.notes)}
                            </td>
                        </tr>

                    </table>

                </div>
            `;

        })

        .catch(error => {

            console.error(error);

            document.getElementById('popupBody').innerHTML = `

                <div class="alert alert-danger">
                    Error loading inventory information.
                </div>

            `;

        });

});


/*
========================================
ESCAPE HTML
========================================
*/

function escapeHtml(value) {

    if (value === null || value === undefined) {
        return '';
    }

    return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');

}

</script>
<!--
    ========================================
    VIEW Table
    ========================================
    --!>
<?= $this->endSection() ?>
