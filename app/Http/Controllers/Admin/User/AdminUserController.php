<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Service\User\UserService;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }
    public function index()
    {
        $users = User::paginate(10);
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
        if (!$this->userService->create($data)) {
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

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.users.show', $user->id);
    }

    public function delete(User $user)
    {
        $user->delete();
        session(['message' => 'Пользователь успешно удален']);
        return redirect()->route('admin.users.index');
    }
}
