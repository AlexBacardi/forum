<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Service\Admin\Category\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryService $categoryService){}

    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(StoreRequest $request)
    {
        $data =  $request->validated();
        if (!$this->categoryService->create($data)){
            session(['error' => 'Ошибка добовления категории']);
            return back();
        }
        session(['message' => 'Категория успешно добавлена']);
        return redirect()->route('admin.categories.index');
    }
}
