<?php

use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\Topoc\TopicController;
use App\Http\Controllers\Main\IndexController;
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

// Route::get('/', function () {
//     return view('layouts.main');
// });

Route::get('/', IndexController::class)->name('main.index');

Route::prefix('categories')->controller(CategoryController::class)->group(function(){

    Route::get('/{category}', 'show')->name('categorioes.show');

    Route::prefix('{category}/topics')->controller(TopicController::class)->group(function() {

        Route::get('/{topic}', 'show')->name('categories.topics.show')->scopeBindings();

    });
});

Auth::routes();

