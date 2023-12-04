<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Service\User\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $userService){}

    public function info(User $user)
    {
        $roles = User::getRoles();
        $gender = ['male' => 'Мужской', 'female' => 'Женский'];
        return view('user.info', compact('user', 'roles', 'gender'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $user = $this->userService->update($data, $user);
        if(!$user){
            session(['error' => 'Ошибка обновления данных']);
            return back();
        }
        session(['message' => 'Данные успешно обновлены']);
        return redirect()->route('users.info', $user->id);
    }
}
