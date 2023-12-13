<?php

use App\Http\Controllers\User\Topic\TopicController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->controller(UserController::class)->middleware('auth')->group(function () {

    Route::get('/{user}', 'info')->name('users.info');

    Route::get('/{user}/edit', 'edit')->name('users.edit');

    Route::patch('/{user}', 'update')->name('users.update');

    Route::prefix('{user}/topics')->controller(TopicController::class)->group(function () {

        Route::get('/', 'index')->name('users.topics.index');

        Route::get('/create', 'create')->name('users.topics.create');

        Route::post('/', 'store')->name('users.topics.store');
    });
});
