<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
       return view('admin/login');
    }

    public function auth()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)
                      ->where('status', 'Active')
                      ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username not found.');
        }

        if (!password_verify($password, $user['password'])) { 
            return redirect()->back()->with('error', 'Incorrect password.');
        }

        session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'fullname'  => $user['fullname'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        if ($user['role'] == 'Admin') {
            return redirect()->to('/admin/dashboard');
        }

        return redirect()->to('/user/dashboard');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('admin/login');
    }
}

