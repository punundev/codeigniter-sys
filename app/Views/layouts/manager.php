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
  <style>
    .btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      padding: 0.45rem 0.9rem !important;
      font-size: 0.875rem !important;
      font-weight: 600 !important;
      line-height: 1.4 !important;
      border-radius: 4px !important;
      border: 1px solid transparent !important;
      text-decoration: none !important;
      cursor: pointer !important;
      outline: none !important;
      box-shadow: none !important;
    }
    .btn-sm {
      padding: 0.3rem 0.65rem !important;
      font-size: 0.8125rem !important;
    }
    .btn-primary {
      color: #ffffff !important;
      background-color: #2196f3 !important;
      border-color: #2196f3 !important;
    }
    .btn-primary:hover {
      background-color: #1e88e5 !important;
      border-color: #1e88e5 !important;
      color: #ffffff !important;
    }
    .btn-secondary {
      color: #212529 !important;
      background-color: #e4e8f0 !important;
      border-color: #e4e8f0 !important;
    }
    .btn-secondary:hover {
      background-color: #d8dce6 !important;
      border-color: #d8dce6 !important;
      color: #212529 !important;
    }
    .btn-success {
      color: #ffffff !important;
      background-color: #00c689 !important;
      border-color: #00c689 !important;
    }
    .btn-success:hover {
      background-color: #00b37c !important;
      border-color: #00b37c !important;
      color: #ffffff !important;
    }
    .btn-danger {
      color: #ffffff !important;
      background-color: #ff5252 !important;
      border-color: #ff5252 !important;
    }
    .btn-danger:hover {
      background-color: #f44336 !important;
      border-color: #f44336 !important;
      color: #ffffff !important;
    }
    .btn-warning {
      color: #ffffff !important;
      background-color: #ffaf00 !important;
      border-color: #ffaf00 !important;
    }
    .btn-warning:hover {
      background-color: #e69d00 !important;
      border-color: #e69d00 !important;
      color: #ffffff !important;
    }
    .btn-info {
      color: #ffffff !important;
      background-color: #00bcd4 !important;
      border-color: #00bcd4 !important;
    }
    .btn-info:hover {
      background-color: #00acc1 !important;
      border-color: #00acc1 !important;
      color: #ffffff !important;
    }
    .btn + .btn, .btn + .btn-group, .btn-group + .btn, .btn-group + .btn-group, a.btn + a.btn, button.btn + a.btn, a.btn + button.btn, button.btn + button.btn {
      margin-left: 4px !important;
    }
    td > .btn, td > a.btn, td > button.btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      margin-right: 4px !important;
      margin-bottom: 2px !important;
      margin-top: 2px !important;
      vertical-align: middle !important;
    }
    td > .btn:last-child, td > a.btn:last-child, td > button.btn:last-child {
      margin-right: 0 !important;
    }
    td > .d-flex {
      display: flex !important;
      align-items: center !important;
      gap: 4px !important;
    }
    td {
      vertical-align: middle !important;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?= site_url('staff/dashboard') ?>">
          <img src="<?= base_url('assets/images/logo.svg') ?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= site_url('staff/dashboard') ?>">
          <img src="<?= base_url('assets/images/logo-mini.svg') ?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block">Help : +015 951 866</li>
          <li class="nav-item dropdown language-dropdown">
            <a class="nav-link dropdown-toggle px-2 d-flex align-items-center" id="LanguageDropdown" href="#"
              data-toggle="dropdown" aria-expanded="false">
              <div class="d-inline-flex mr-0 mr-md-3">
                <div class="flag-icon-holder">
                  <i class="flag-icon flag-icon-us"></i>
                </div>
              </div>
              <span class="profile-text font-weight-medium d-none d-md-block">English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
              <a class="dropdown-item">
                <div class="flag-icon-holder">
                  <i class="flag-icon flag-icon-us"></i>
                </div>English
              </a>
              <a class="dropdown-item">
                <div class="flag-icon-holder">
                  <i class="flag-icon flag-icon-fr"></i>
                </div>French
              </a>
              <a class="dropdown-item">
                <div class="flag-icon-holder">
                  <i class="flag-icon flag-icon-ae"></i>
                </div>Arabic
              </a>
              <a class="dropdown-item">
                <div class="flag-icon-holder">
                  <i class="flag-icon flag-icon-ru"></i>
                </div>Russian
              </a>
            </div>
          </li>
        </ul>
        <form class="ml-auto search-form d-none d-md-block" action="#">
          <div class="form-group">
            <input type="search" class="form-control" placeholder="Search Here">
          </div>
        </form>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown"
              aria-expanded="false">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
              aria-labelledby="messageDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url('assets/images/faces/face10.jpg') ?>" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url('assets/images/faces/face12.jpg') ?>" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url('assets/images/faces/face1.jpg') ?>" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-email-outline"></i>
              <span class="count bg-success">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
              aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom">
                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-alert m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                  <p class="font-weight-light small-text mb-0"> Just now </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-settings m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                  <p class="font-weight-light small-text mb-0"> Private message </p>
                </div>
              </a>
              <a class="dropdown-item preview-item py-3">
                <div class="preview-thumbnail">
                  <i class="mdi mdi-airballoon m-auto text-primary"></i>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                  <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>"
                alt="Profile image"> </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>"
                  alt="Profile image">
                <p class="mb-1 mt-3 font-weight-semibold">
                <h6><?= esc(session()->get('fullname')) ?></h6>
                </p>
                <p class="font-weight-light text-muted mb-0"><span class="badge badge-warning">Manager</span></p>
              </div>
              <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i
                  class="dropdown-item-icon ti-dashboard"></i></a>
              <a class="dropdown-item">Message<i class="dropdown-item-icon ti-comment-alt"></i></a>
              <a class="dropdown-item">Log<i class="dropdown-item-icon ti-location-arrow"></i></a>
              <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>
              <a class="dropdown-item" href="<?= site_url('logout') ?>">Sign Out<i
                  class="dropdown-item-icon ti-power-off"></i></a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
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
                <img class="img-xs rounded-circle" src="<?= base_url('assets/images/faces/face8.jpg') ?>"
                  alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="designation"><?= esc(session()->get('role')) ?></p>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">Manager Menu</li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/dashboard') ?>">
              <i class="menu-icon typcn typcn-document-text"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/inventory') ?>">
              <i class="menu-icon typcn typcn-bell"></i>
              <span class="menu-title">Inventory</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/stock') ?>">
              <i class="menu-icon typcn typcn-th-large-outline"></i>
              <span class="menu-title">Stock Overview</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/stock/stock-in') ?>">
              <i class="menu-icon typcn typcn-arrow-down-thick"></i>
              <span class="menu-title">Stock In</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/stock/stock-out') ?>">
              <i class="menu-icon typcn typcn-arrow-up-thick"></i>
              <span class="menu-title">Stock Out</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/task') ?>">
              <i class="menu-icon typcn typcn-document-add"></i>
              <span class="menu-title">Tasks</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('manager/task/report') ?>">
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
