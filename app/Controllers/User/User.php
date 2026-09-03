<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('search');

        $builder = $this->userModel;

        if ($keyword) {
            $builder = $builder
                ->like('username', $keyword)
                ->orLike('fullname', $keyword)
                ->orLike('email', $keyword)
                ->orLike('phone', $keyword);
        }

        $data = [
            'users'  => $builder->paginate(10),
            'pager'  => $this->userModel->pager,
            'search' => $keyword
        ];

        return view('admin/user/index', $data);
    }

    public function create()
    {
        return view('admin/user/create');
    }

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

        return redirect()->to('/admin/user')->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'role'     => $this->request->getPost('role'),
            'status'   => $this->request->getPost('status'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            );
        }

        $this->userModel->update($id, $data);

        return redirect()->to('/admin/user')->with('success', 'User updated successfully');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);

        return redirect()->to('/admin/user')->with('success', 'User deleted successfully');
    }
}


