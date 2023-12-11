<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\User\UserController;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends UserController
{
    public function index()
    {
        $users = User::all();
        $roles = User::getRoles();
        return view('admin.user.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = User::getRoles();
        return view('admin.user.create', compact('roles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        if(!$this->userService->create($data)) {
            session(['error' => 'Ошибка пользователь не создан']);
            return back();
        }
        session(['message' => 'Пользователь успешно создан']);
        return redirect()->route('admin.index');
    }

    public function show(User $user)
    {
        $roles = User::getRoles();
        $gender = ['male' => 'Мужской', 'female' => 'Женский'];
        return view('admin.user.show', compact('user', 'gender', 'roles'));
    }

    public function edit(User $user)
    {
        $roles = User::getRoles();
        return view('admin.user.edit', compact('user', 'roles'));
    }


}
