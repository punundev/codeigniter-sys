<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Add Inventory
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Inventory</h4>
        <form class="forms-sample" action="<?= site_url('admin/inventory/store') ?>" method="post">
		
          <div class="form-group">
            <label for="device_name">Device Name</label>
            <input type="text" name="device_name" id="device_name" class="form-control" placeholder="Device Name" required>
          </div>
          <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number">
          </div>
		   <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" placeholder="type">
          </div>
          <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" placeholder="Manufacturer">
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" placeholder="Model">
          </div>
		   <div class="form-group">
            <label for="processor">processor</label>
            <input type="text" name="processor" id="processor" class="form-control" placeholder="processor">
          </div>
		   <div class="form-group">
            <label for="ram">Ram</label>
            <input type="text" name="ram" id="ram" class="form-control" placeholder="ram">
          </div>
		    <div class="form-group">
            <label for="storage">Storage</label>
            <input type="text" name="storage" id="storage" class="form-control" placeholder="storage">
          </div>
		    <div class="form-group">
            <label for="monitor">Monitor</label>
            <input type="text" name="monitor" id="monitor" class="form-control" placeholder="monitor">
          </div>
		  <div class="form-group">
            <label for="operating_system">OS</label>
            <input type="text" name="operating_system" id="operating_system" class="form-control" placeholder="operating_system">
          </div>
		  <div class="form-group">
            <label for="mac_address">Mac_address</label>
            <input type="text" name="mac_address" id="mac_address" class="form-control" placeholder="mac_address">
          </div>
          <div class="form-group">
            <label for="assigned_user">Assigned To</label>
            <input type="text" name="assigned_user" id="assigned_user" class="form-control" placeholder="Assigned User">
          </div>
		  <div class="form-group">
            <label for="owner">Owner</label>
            <input type="text" name="owner" id="owner" class="form-control" placeholder="owner">
          </div>
		   <div class="form-group">
            <label for="internet_location">Internet_location</label>
            <input type="text" name="internet_location" id="internet_location" class="form-control" placeholder="internet_location">
          </div>
          <div class="form-group">
            <label for="sections">sections</label>
            <input type="text" name="sections" id="sections" class="form-control" placeholder="sections">
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" placeholder="location">
          </div>
          <div class="form-group">
            <label for="warranty_information">Warranty_information</label>
            <input type="text" name="warranty_information" id="warranty_information" class="form-control" placeholder="warranty_information">
          </div>
		  <div class="form-group">
            <label for="year_of_manufacture">Year_of_manufacture</label>
            <input type="text" name="warranty_information" id="year_of_manufacture" class="form-control" placeholder="year_of_manufacture">
          </div>
		   <div class="form-group">
            <label for="expired_year">Expired_year</label>
            <input type="text" name="warranty_information" id="expired_year" class="form-control" placeholder="expired_year">
          </div>
		   <div class="form-group">
            <label for="expired_date">Expired_date</label>
            <input type="text" name="warranty_information" id="expired_date" class="form-control" placeholder="expired_date">
          </div>
		  <div class="form-group">
            <label for="notes">Notes</label>
            <input type="text" name="notes" id="notes" class="form-control" placeholder="notes">
          </div>
		  <div class="form-group">
            <label for="photo">Photo</label>
            <input type="text" name="photo" id="photo" class="form-control" placeholder="photo">
          </div>
		  <div class="form-group">
            <label for="registered_by">Registered_by</label>
            <input type="text" name="notes" id="registered_by" class="form-control" placeholder="registered_by">
          </div>
		  <div class="form-group">
            <label for="registered_date">Registered_date</label>
            <input type="text" name="registered_date" id="registered_date" class="form-control" placeholder="registered_date">
          </div>
		  <div class="form-group">
            <label for="checked_by">Checked_by</label>
            <input type="text" name="checked_by" id="checked_by" class="form-control" placeholder="checked_by">
          </div>
		  <div class="form-group">
            <label for="checked_date">Checked_date</label>
            <input type="text" name="checked_date" id="checked_date" class="form-control" placeholder="checked_date">
          </div>
		  <div class="form-group">
            <label for="created_at">Created_at</label>
            <input type="text" name="created_at" id="created_at" class="form-control" placeholder="created_at">
          </div>
		   <div class="form-group">
            <label for="updated_at">Updated_at</label>
            <input type="text" name="updated_at" id="updated_at" class="form-control" placeholder="updated_at">
          </div>
          <button type="submit" class="btn btn-success mr-2 font-weight-semibold">Save</button>
          <a href="<?= site_url('admin/inventory') ?>" class="btn btn-light font-weight-semibold">Back</a>
		  
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>



