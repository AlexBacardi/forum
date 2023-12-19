<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $topics = $category->topicsOrderDesc;
        return view('category.show', compact('category', 'topics'));
    }
}
