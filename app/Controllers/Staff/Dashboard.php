<?php

namespace App\Controllers\Staff;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');

        $user = $this->userModel
            ->where('id', $userId)
            ->first();

        return view('staff/dashboard', [
            'user' => $user
        ]);
    }
}
