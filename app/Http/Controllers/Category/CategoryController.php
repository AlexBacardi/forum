<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cntCommetns = $this->cntComment($categories);
        return view('main.index', compact('categories', 'cntCommetns'));
    }

    public function show(Category $category)
    {
        $topics = $category->topicsOrderDesc;
        return view('category.show', compact('category', 'topics'));
    }

    private function cntComment($categories)
    {
        $data = [];
        foreach($categories as $category){
            $data[$category->id] = 0;
            foreach($category->topics as $topic) {
                $data[$category->id] += $topic->comments->count();
            }
        }
        return $data;
    }
}
