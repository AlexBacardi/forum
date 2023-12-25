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
        $cntCommetns = $this->getCntComment($categories);
        $lstCmmtCtg = $this->getLastCommentByCategory($categories);
        return view('main.index', compact('categories', 'cntCommetns', 'lstCmmtCtg'));
    }

    public function show(Category $category)
    {
        $topics = $category->topicsOrderDesc()->paginate(10);
        $lstCmt = $this->getLastComment($category->topics);
        return view('category.show', compact('category', 'topics', 'lstCmt'));
    }

    private function getCntComment($categories)
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

    private function getLastComment($categories)
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
