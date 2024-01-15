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

    public function update(Topic $topic, Request $request)
    {
        if($request->is_published and is_null($topic->published_at)) {
            $data['is_published'] = $request->is_published;
            $data['published_at'] = now();
        } else {
            $data['is_published'] = $request->is_published;
        }
        $topic->update($data);
        return redirect()->route('admin.topics.index');
    }
}
