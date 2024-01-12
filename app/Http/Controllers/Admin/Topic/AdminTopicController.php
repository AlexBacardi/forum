<?php

namespace App\Http\Controllers\Admin\Topic;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class AdminTopicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $statusPublish = Topic::getStatusPublished();
        return view('admin.topic.index', compact('categories', 'statusPublish'));
    }
}
