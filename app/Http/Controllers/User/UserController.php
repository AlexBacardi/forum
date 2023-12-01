<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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
        if (isset($data['avatar'])) {
            $data['avatar'] = Storage::disk('public')->put("/avatars/" . $user->name, $data['avatar']);
        }
        $user->update($data);

        return redirect()->route('users.info', $user->id);
    }
}
