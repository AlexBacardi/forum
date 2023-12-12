<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->controller(AdminController::class)->group(function() {

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

        Route::get('/create', 'create')->name('admin.users.create');

        Route::post('/', 'store')->name('admin.users.store');

        Route::get('/{user}', 'show')->name('admin.users.show');

        Route::get('/{user}/edit', 'edit')->name('admin.users.edit');

        Route::patch('/{user}', 'update')->name('admin.users.update');

    });
});
