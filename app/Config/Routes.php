<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('admin/login', 'Login::index');
$routes->get('/', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');
$routes->get('admin/logout', 'Login::logout');
$routes->get('admin/dashboard', 'Admin\Dashboard::index');
$routes->get('user/dashboard', 'User\Dashboard::index');

$routes->group('admin/user', function($routes) {
    $routes->get('/', 'User\User::index');
    $routes->get('create', 'User\User::create');
    $routes->post('store', 'User\User::store');
    $routes->get('edit/(:num)', 'User\User::edit/$1');
    $routes->post('update/(:num)', 'User\User::update/$1');
    $routes->get('delete/(:num)', 'User\User::delete/$1');
});

$routes->group('inventory', function ($routes) {

    // Inventory list
    $routes->get('/', 'Inventory\Inventory::index');

    // Create
    $routes->get('create', 'Inventory\Inventory::create');

    // Store
    $routes->post('store', 'Inventory\Inventory::store');

    // Edit
    $routes->get('edit/(:num)', 'Inventory\Inventory::edit/$1');

    // Update
    $routes->post('update/(:num)', 'Inventory\Inventory::update/$1');

    // Delete
    $routes->get('delete/(:num)', 'Inventory\Inventory::delete/$1');

    // View inventory as JSON
    $routes->get('view/(:num)', 'Inventory\Inventory::view/$1');

    // AJAX filter
    $routes->get('ajaxFilter', 'Inventory\Inventory::ajaxFilter');

    // Excel export
    $routes->get('export', 'Inventory\Inventory::exportExcel');

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

$routes->group('task', function ($routes) {

    // Task
    $routes->get('/', 'Task\Task::index');
    $routes->get('create', 'Task\Task::create');
    $routes->post('store', 'Task\Task::store');

    // View
    $routes->get('view/(:num)', 'Task\Task::view/$1');

    // Edit
    $routes->get('edit/(:num)', 'Task\Task::edit/$1');

    // Update
    $routes->post('update/(:num)', 'Task\Task::update/$1');

    // Delete
    $routes->get('delete/(:num)', 'Task\Task::delete/$1');

    // Work Log
    $routes->get('worklog/create/(:num)', 'Task\WorkLog::create/$1');
    $routes->post('worklog/store', 'Task\WorkLog::store');
     // Task Report
    $routes->get('report', 'Task\Task::report');
    $routes->get('report/export', 'Task\Task::exportReport');
   // Task Dashboard Chart
    $routes->get('dashboard-chart', 'Task\Task::dashboardChart');
});
