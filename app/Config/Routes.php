<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('admin/login', 'Login::index');
$routes->get('/', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');
$routes->get('admin/logout', 'Login::logout');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('manager/dashboard', 'Manager\Dashboard::index');
$routes->get('staff/dashboard', 'Staff\Dashboard::index');
$routes->get('user/dashboard', 'Staff\Dashboard::index');

$routes->group('admin/user', function($routes) {
    $routes->get('/', 'User\User::index');
    $routes->get('create', 'User\User::create');
    $routes->post('store', 'User\User::store');
    $routes->get('edit/(:num)', 'User\User::edit/$1');
    $routes->post('update/(:num)', 'User\User::update/$1');
    $routes->get('delete/(:num)', 'User\User::delete/$1');
});

$routes->group('admin/inventory', function ($routes) {
    $routes->get('/', 'Inventory\Inventory::index');
    $routes->get('create', 'Inventory\Inventory::create');
    $routes->post('store', 'Inventory\Inventory::store');
    $routes->get('edit/(:num)', 'Inventory\Inventory::edit/$1');
    $routes->post('update/(:num)', 'Inventory\Inventory::update/$1');
    $routes->get('delete/(:num)', 'Inventory\Inventory::delete/$1');
    $routes->get('view/(:num)', 'Inventory\Inventory::view/$1');
    $routes->get('ajaxFilter', 'Inventory\Inventory::ajaxFilter');
    $routes->get('export', 'Inventory\Inventory::exportExcel');
});

$routes->group('staff/inventory', function ($routes) {
    $routes->get('/', 'Staff\Inventory::index');
    $routes->get('view/(:num)', 'Staff\Inventory::view/$1');
    $routes->get('ajaxFilter', 'Staff\Inventory::ajaxFilter');
    $routes->get('export', 'Staff\Inventory::exportExcel');
});

$routes->group('admin/stock', function($routes) {
    $routes->get('/', 'Stock\Stock::index');
    $routes->get('dashboard', 'Stock\Stock::dashboard');
    $routes->get('create', 'Stock\Stock::create');
    $routes->post('store', 'Stock\Stock::store');
    $routes->get('edit/(:num)', 'Stock\Stock::edit/$1');
    $routes->post('update/(:num)', 'Stock\Stock::update/$1');
    $routes->get('delete/(:num)', 'Stock\Stock::delete/$1');
    $routes->get('ajaxFilter', 'Stock\Stock::ajaxFilter');
    $routes->get('stock-in', 'Stock\Stock::stockIn');
    $routes->post('stock-in/store', 'Stock\Stock::saveStockIn');
    $routes->get('stock-out', 'Stock\Stock::stockOut');
    $routes->post('stock-out/store', 'Stock\Stock::saveStockOut');
    $routes->get('history', 'Stock\Stock::history');
    $routes->get('low-stock', 'Stock\Stock::lowStock');
    $routes->get('serial-numbers', 'Stock\Stock::serialNumbers');
    $routes->get('reports', 'Stock\Stock::reports');
});

$routes->group('admin/task', function ($routes) {
    $routes->get('/', 'Task\Task::index');
    $routes->get('create', 'Task\Task::create');
    $routes->post('store', 'Task\Task::store');
    $routes->get('view/(:num)', 'Task\Task::view/$1');
    $routes->get('edit/(:num)', 'Task\Task::edit/$1');
    $routes->post('update/(:num)', 'Task\Task::update/$1');
    $routes->get('delete/(:num)', 'Task\Task::delete/$1');
    $routes->get('worklog/create/(:num)', 'Task\WorkLog::create/$1');
    $routes->post('worklog/store', 'Task\WorkLog::store');
    $routes->get('report', 'Task\Task::report');
    $routes->get('report/export', 'Task\Task::exportReport');
    $routes->get('dashboard-chart', 'Task\Task::dashboardChart');
});

$routes->group('staff/task', function ($routes) {
    $routes->get('/', 'Staff\Task::index');
    $routes->get('create', 'Staff\Task::create');
    $routes->post('store', 'Staff\Task::store');
    $routes->get('view/(:num)', 'Staff\Task::view/$1');
    $routes->get('edit/(:num)', 'Staff\Task::edit/$1');
    $routes->post('update/(:num)', 'Staff\Task::update/$1');
    $routes->get('delete/(:num)', 'Staff\Task::delete/$1');
    $routes->get('worklog/create/(:num)', 'Staff\WorkLog::create/$1');
    $routes->post('worklog/store', 'Staff\WorkLog::store');
    $routes->get('report', 'Staff\Task::report');
    $routes->get('report/export', 'Staff\Task::exportReport');
    $routes->get('dashboard-chart', 'Staff\Task::dashboardChart');
});

$routes->group('manager/inventory', function ($routes) {
    $routes->get('/', 'Manager\Inventory::index');
    $routes->get('create', 'Manager\Inventory::create');
    $routes->post('store', 'Manager\Inventory::store');
    $routes->get('edit/(:num)', 'Manager\Inventory::edit/$1');
    $routes->post('update/(:num)', 'Manager\Inventory::update/$1');
    $routes->get('delete/(:num)', 'Manager\Inventory::delete/$1');
    $routes->get('view/(:num)', 'Manager\Inventory::view/$1');
    $routes->get('ajaxFilter', 'Manager\Inventory::ajaxFilter');
    $routes->get('export', 'Manager\Inventory::exportExcel');
});

$routes->group('manager/stock', function($routes) {
    $routes->get('/', 'Manager\Stock::index');
    $routes->get('dashboard', 'Manager\Stock::dashboard');
    $routes->get('create', 'Manager\Stock::create');
    $routes->post('store', 'Manager\Stock::store');
    $routes->get('edit/(:num)', 'Manager\Stock::edit/$1');
    $routes->post('update/(:num)', 'Manager\Stock::update/$1');
    $routes->get('delete/(:num)', 'Manager\Stock::delete/$1');
    $routes->get('ajaxFilter', 'Manager\Stock::ajaxFilter');
    $routes->get('stock-in', 'Manager\Stock::stockIn');
    $routes->post('stock-in/store', 'Manager\Stock::saveStockIn');
    $routes->get('stock-out', 'Manager\Stock::stockOut');
    $routes->post('stock-out/store', 'Manager\Stock::saveStockOut');
    $routes->get('history', 'Manager\Stock::history');
    $routes->get('low-stock', 'Manager\Stock::lowStock');
    $routes->get('serial-numbers', 'Manager\Stock::serialNumbers');
    $routes->get('reports', 'Manager\Stock::reports');
});

$routes->group('manager/task', function ($routes) {
    $routes->get('/', 'Manager\Task::index');
    $routes->get('create', 'Manager\Task::create');
    $routes->post('store', 'Manager\Task::store');
    $routes->get('view/(:num)', 'Manager\Task::view/$1');
    $routes->get('edit/(:num)', 'Manager\Task::edit/$1');
    $routes->post('update/(:num)', 'Manager\Task::update/$1');
    $routes->get('delete/(:num)', 'Manager\Task::delete/$1');
    $routes->get('worklog/create/(:num)', 'Manager\WorkLog::create/$1');
    $routes->post('worklog/store', 'Manager\WorkLog::store');
    $routes->get('report', 'Manager\Task::report');
    $routes->get('report/export', 'Manager\Task::exportReport');
    $routes->get('dashboard-chart', 'Manager\Task::dashboardChart');
});
