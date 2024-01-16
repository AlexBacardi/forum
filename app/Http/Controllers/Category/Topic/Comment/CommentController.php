<?php

namespace App\Http\Controllers\Category\Topic\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\Topic\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Topic;
use App\Service\Category\Topic\Comment\CommentService;

class CommentController extends Controller
{

    public function __construct(private CommentService $commentService){}

    public function store(StoreRequest $request, Category $category, Topic $topic)
    {
        if(!auth()->check()) {
            return redirect()->route('login');
        }

        $data = $request->validated();

        if(!$this->commentService->create($data, $topic)){
            session(['error' => 'Ошибка отправки комментария']);
            return back();
        }

        return redirect()->route('categories.topics.show', ['category' => $category->id, 'topic' => $topic->id]);
    }

}
