<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $cntCommetns = $this->cntComment($categories);
        $lstCmmtCtg = $this->getLastCommentByCategory($categories);
        return view('main.index', compact('categories', 'cntCommetns', 'lstCmmtCtg'));
    }

    public function show(Category $category)
    {
        $topics = $category->topicsOrderDesc;
        $lstCmt = $this->lastComment($category->topics);
        return view('category.show', compact('category', 'topics', 'lstCmt'));
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

    private function lastComment($categories)
    {
        $data = [];
        foreach($categories as $topic){
            $data[$topic->id] = $topic->latestComment();
        }
        return $data;
    }

    private function getLastCommentByCategory($categories)
    {
        $data = [];
        foreach($categories as $category){
            $data[$category->id] = Comment::getLastComment($category);
        }

        return $data;
    }
}
