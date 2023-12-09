<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->controller(AdminController::class)->group(function() {

    Route::get('/', 'index')->name('admin.index');

    Route::prefix('categories')->controller(CategoryController::class)->group(function(){

        Route::get('/', 'index')->name('admin.categories.index');

        Route::get('/create', 'create')->name('admin.categories.create');

        Route::post('/', 'store')->name('admin.categories.store');

        Route::get('/{category}', 'show')->name('admin.categories.show');

        Route::get('/{category}/edit', 'edit')->name('admin.categories.edit');

        Route::patch('/{category}', 'update')->name('admin.categories.update');

        Route::delete('/{category}', 'delete')->name('admin.categories.delete');

    });

    Route::prefix('users')->controller(AdminUserController::class)->group(function() {

        Route::get('/', 'index')->name('admin.users.index');
        
    });
});
