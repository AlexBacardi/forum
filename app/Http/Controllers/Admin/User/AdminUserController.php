<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\User\UserController;
use App\Models\User;

class AdminUserController extends UserController
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
