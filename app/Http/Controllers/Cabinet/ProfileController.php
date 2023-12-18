<?php

namespace App\Http\Controllers\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Service\User\UserService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct(protected UserService $userService){}

    public function info(User $user)
    {
        $roles = User::getRoles();
        $data['cntTopics'] = $user->topics()->count();
        $gender = ['male' => 'Мужской', 'female' => 'Женский'];
        return view('cabinet.info', compact('user', 'roles', 'gender', 'data'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('cabinet.edit', compact('user'));
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
