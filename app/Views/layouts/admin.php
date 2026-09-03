<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $this->renderSection('title') ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/shared/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/shared/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.base.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendors/css/vendor.bundle.addons.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/demo_1/style.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>">
</head>
<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= site_url('admin/dashboard') ?>">
          <img src="<?= base_url('assets/images/logo.svg') ?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= site_url('admin/dashboard') ?>">
          <img src="<?= base_url('assets/images/logo-mini.svg') ?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>" alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">
                  <h6><?= esc(session()->get('fullname')) ?></h6>
                </p>
                <p class="font-weight-light text-muted mb-0"><span class="badge badge-danger">Admin</span></p>
              </div>
              <a class="dropdown-item" href="<?= site_url('logout') ?>">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name"><?= esc(session()->get('fullname')) ?></p>
                <p class="designation"><span class="badge badge-danger">Admin</span></p>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">Admin Menu</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
              <i class="menu-icon typcn typcn-document-text"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('user') ?>">
              <i class="menu-icon typcn typcn-user-outline"></i>
              <span class="menu-title">User Management</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('inventory') ?>">
              <i class="menu-icon typcn typcn-bell"></i>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('stock') ?>">
              <i class="menu-icon typcn typcn-th-large-outline"></i>
              <span class="menu-title">Stocks</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('task') ?>">
              <i class="menu-icon typcn typcn-document-add"></i>
              <span class="menu-title">Tasks</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('task/report') ?>">
              <i class="menu-icon typcn typcn-chart-bar-outline"></i>
              <span class="menu-title">Task Reports</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $this->renderSection('content') ?>
        </div>
        <footer class="footer">
          <div class="container-fluid clearfix">
          </div>
        </footer>
      </div>
    </div>
  </div>
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('assets/vendors/js/vendor.bundle.addons.js') ?>"></script>
  <script src="<?= base_url('assets/js/shared/off-canvas.js') ?>"></script>
  <script src="<?= base_url('assets/js/shared/misc.js') ?>"></script>
  <script src="<?= base_url('assets/js/shared/jquery.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/js/demo_1/dashboard.js') ?>"></script>
  <script src="<?= base_url('assets/js/inventory.js') ?>"></script>
</body>
</html>
