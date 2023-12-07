<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['cntCategory'] = Category::all()->count();
        return view('admin.index', compact('data'));
    }
}
