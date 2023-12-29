<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\Topic\Comment\CommentController;
use App\Http\Controllers\Category\Topic\TopicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

Route::prefix('categories')->controller(CategoryController::class)->group(function(){

    Route::get('/{category}', 'show')->name('categorioes.show');

    Route::prefix('{category}/topics')->middleware('chekTopic')->controller(TopicController::class)->group(function() {

        Route::get('/{topic}', 'show')->name('categories.topics.show')->scopeBindings();

        Route::prefix('/{topic}')->controller(CommentController::class)->group(function(){

            Route::post('/', 'store')->name('categories.topics.comments.store')->scopeBindings();

        });
    });
});

Auth::routes();

