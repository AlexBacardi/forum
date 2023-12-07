<?php

namespace App\Service\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function update($data, $user)
    {
        try{
            DB::beginTransaction();
            if (isset($data['avatar'])) {
                $data['avatar'] = Storage::disk('public')->put("/avatars/" . $user->name, $data['avatar']);
            }
            $user->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return False;
        }
        return $user;
    }
}
