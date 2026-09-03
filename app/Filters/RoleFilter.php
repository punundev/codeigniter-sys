<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $params = null)
    {
        $path = ltrim($request->getUri()->getPath(), '/');

        if (in_array($path, ['', 'admin/login', 'login/auth', 'logout', 'admin/logout'])) {
            return;
        }

        if (!session()->get('logged_in')) {
            return redirect()->to('/admin/login');
        }

        $role = session()->get('role');

        if ($role === 'Admin') {
            return;
        }

        if (strpos($path, 'admin') === 0) {
            if ($role === 'Manager') {
                return redirect()->to('/manager/dashboard');
            }
            if ($role === 'Staff') {
                return redirect()->to('/staff/dashboard');
            }
        }

        if (strpos($path, 'manager') === 0) {
            if ($role === 'Staff') {
                return redirect()->to('/staff/dashboard');
            }
            if ($role === 'Manager') {
                return;
            }
        }

        if (strpos($path, 'staff') === 0) {
            if ($role === 'Manager' || $role === 'Staff') {
                return;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $params = null)
    {
    }
}
