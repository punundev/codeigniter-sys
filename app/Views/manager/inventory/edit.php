<?= $this->extend('layouts/manager') ?>

<?= $this->section('title') ?>
Edit Inventory
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Inventory</h4>
        <form class="forms-sample" action="<?= site_url('manager/inventory/update/' . $inventory['id']) ?>" method="post">
          <div class="form-group">
            <label for="device_name">device_name</label>
            <input type="text" name="device_name" id="device_name" class="form-control" value="<?= esc($inventory['device_name']) ?>" required>
          </div>
		  <div class="form-group">
            <label for="device_name">serial_number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="<?= esc($inventory['serial_number']) ?>" required>
          </div>
          <div class="form-group">
            <label for="serial_number">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="<?= esc($inventory['type']) ?>">
          </div>
          <div class="form-group">
            <label for="manufacturer">Manufacturer</label>
            <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="<?= esc($inventory['manufacturer']) ?>">
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="<?= esc($inventory['model']) ?>">
          </div>
          <div class="form-group">
            <label for="processor">Processor</label>
            <input type="text" name="processor" id="processor" class="form-control" value="<?= esc($inventory['processor']) ?>">
          </div>
		     <div class="form-group">
            <label for="processor_full_name">processor_full_name</label>
            <input type="text" name="processor_full_name" id="processor_full" class="form-control" value="<?= esc($inventory['processor_full_name']) ?>">
          </div>
          <div class="form-group">
            <label for="location">Ram</label>
            <input type="text" name="ram" id="ram" class="form-control" value="<?= esc($inventory['ram']) ?>">
          </div>
		   <div class="form-group">
            <label for="storage">Storage</label>
            <input type="text" name="storage" id="storage" class="form-control" value="<?= esc($inventory['storage']) ?>">
          </div>
		   <div class="form-group">
            <label for="monitor">Monitor</label>
            <input type="text" name="monitor" id="monitor" class="form-control" value="<?= esc($inventory['monitor']) ?>">
          </div>
		      <div class="form-group">
            <label for="operating_system">Operating_system</label>
            <input type="text" name="operating_system" id="operating_system" class="form-control" value="<?= esc($inventory['operating_system']) ?>">
          </div>
          <div class="form-group">
            <label for="license_status">Ram</label>
            <input type="text" name="license_status" id="license_status" class="form-control" value="<?= esc($inventory['license_status']) ?>">
          </div>
       
           <div class="form-group">
            <label for="mac_address">Mac_address</label>
            <input type="text" name="mac_address" id="mac_address" class="form-control" value="<?= esc($inventory['mac_address']) ?>">
          </div>
          <div class="form-group">
            <label for="assigned_user">Assigned_user</label>
            <input type="text" name="assigned_user" id="assigned_user" class="form-control" value="<?= esc($inventory['assigned_user']) ?>">
          </div>
          <div class="form-group">
            <label for="owner">Owner</label>
            <input type="text" name="owner" id="owner" class="form-control" value="<?= esc($inventory['owner']) ?>">
          </div>
		  <div class="form-group">
            <label for="internet_location">internet_location</label>
            <input type="text" name="internet_location" id="internet_location" class="form-control" value="<?= esc($inventory['internet_location']) ?>">
          </div>
		  <div class="form-group">
            <label for="sections">sections</label>
            <input type="text" name="sections" id="sections" class="form-control" value="<?= esc($inventory['sections']) ?>">
          </div>
		  <div class="form-group">
            <label for="location">internet_location</label>
            <input type="text" name="location" id="location" class="form-control" value="<?= esc($inventory['location']) ?>">
          </div>
		  <div class="form-group">
            <label for="warranty_information">warranty_information</label>
            <input type="text" name="warranty_information" id="warranty_information" class="form-control" value="<?= esc($inventory['warranty_information']) ?>">
          </div>
		  <div class="form-group">
            <label for="year_of_manufacture">year_of_manufacture</label>
            <input type="text" name="year_of_manufacture" id="year_of_manufacture" class="form-control" value="<?= esc($inventory['year_of_manufacture']) ?>">
          </div>
		  <div class="form-group">
            <label for="expired_year">internet_location</label>
            <input type="text" name="expired_year" id="expired_year" class="form-control" value="<?= esc($inventory['expired_year']) ?>">
          </div>
		  <div class="form-group">
            <label for="expired_date">expired_date</label>
            <input type="text" name="expired_date" id="expired_date" class="form-control" value="<?= esc($inventory['expired_date']) ?>">
          </div>
		  <div class="form-group">
            <label for="notes">internet_location</label>
            <input type="text" name="notes" id="notes" class="form-control" value="<?= esc($inventory['notes']) ?>">
          </div>
		  <div class="form-group">
            <label for="photo">photo</label>
            <input type="text" name="photo" id="photo" class="form-control" value="<?= esc($inventory['photo']) ?>">
          </div>
		  <div class="form-group">
            <label for="registered_by">registered_by</label>
            <input type="text" name="registered_by" id="registered_by" class="form-control" value="<?= esc($inventory['registered_by']) ?>">
          </div>
		  <div class="form-group">
            <label for="registered_date">registered_date</label>
            <input type="text" name="registered_date" id="registered_date" class="form-control" value="<?= esc($inventory['registered_date']) ?>">
          </div>
		  <div class="form-group">
            <label for="checked_by">checked_by</label>
            <input type="text" name="checked_by" id="checked_by" class="form-control" value="<?= esc($inventory['checked_by']) ?>">
          </div>
		  <div class="form-group">
            <label for="checked_date">checked_date</label>
            <input type="text" name="checked_date" id="checked_date" class="form-control" value="<?= esc($inventory['checked_date']) ?>">
          </div>
		  <div class="form-group">
            <label for="created_at">created_at</label>
            <input type="text" name="created_at" id="created_at" class="form-control" value="<?= esc($inventory['created_at']) ?>">
          </div>
		  <div class="form-group">
            <label for="updated_at">updated_at</label>
            <input type="text" name="updated_at" id="internet_location" class="form-control" value="<?= esc($inventory['updated_at']) ?>">
          </div>
		  
          <div class="d-flex" style="gap: 4px;">
            <button type="submit" class="btn btn-primary font-weight-semibold">Update</button>
            <a href="<?= site_url('manager/inventory') ?>" class="btn btn-secondary font-weight-semibold">Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

