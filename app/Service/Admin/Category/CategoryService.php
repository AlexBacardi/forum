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

    public function update($data, $category)
    {
        try{
            DB::beginTransaction();
            if(isset($data['preview_img'])) {
                $data['preview_img'] = Storage::disk('public')->put("/category/icons/" . $data['title'], $data['preview_img']);
            }
            $category->update($data);
            DB::commit();
        } catch(\Exception $exception){
            DB::rollBack();
            return false;
        }
        return $category;
    }
}
