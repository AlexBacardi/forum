<?php

namespace App\Service\Admin\Category;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public function create($data)
    {
        try{
            DB::beginTransaction();
            $data['preview_img'] = Storage::disk('public')->put("/category/icons/" . $data['title'], $data['preview_img']);
            Category::firstOrCreate(['title' => $data['title']], $data);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return false;
        }
        return true;
    }
}
