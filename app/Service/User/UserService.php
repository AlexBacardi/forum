<?php

namespace App\Service\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function create($data)
    {
        try{
            DB::beginTransaction();
            User::firstOrCreate($data);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return false;
        }
        return true;
    }

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
