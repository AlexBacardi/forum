<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTopicPublishState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->topic->is_published and auth()->user() != null  and ($request->topic->user_id == auth()->user()->id or auth()->user()->isAdmin())) {
            return $next($request);
        } elseif($request->topic->is_published) {
            return $next($request);
        } else {
            return abort(404);
        }

    }
}
