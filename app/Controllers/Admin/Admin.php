<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data['users'] = $model->findAll();

        return view('admin/index', $data);
    }
 public function create()
    {
        return view('admin/users/create');
    }

    // Save new user
    public function store()
    {
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'fullname' => $this->request->getPost('fullname'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => $this->request->getPost('role'),
            'status'   => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/users')
                         ->with('success', 'User added successfully.');
    }

    // Show Edit User form
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);

        return view('admin/users/edit', $data);
    }

    // Update user
    public function update($id)
    {
        $this->userModel->update($id, [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => $this->request->getPost('role'),
            'status'   => $this->request->getPost('status'),
        ]);

        return redirect()->to('/admin/users')
                         ->with('success', 'User updated successfully.');
    }

    // Delete user
    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/admin/users')
                         ->with('success', 'User deleted successfully.');
    }
}
