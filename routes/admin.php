<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->controller(AdminController::class)->group(function (){

    Route::get('/', 'index')->name('admin.index');

    Route::prefix('categories')->controller(CategoryController::class)->group(function(){

        Route::get('/', 'index')->name('admin.categories.index');

        Route::get('/create', 'create')->name('admin.categoies.create');

        Route::post('/', 'store')->name('admin.categories.store');
        
    });
});
