<?php

use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->controller(UserController::class)->middleware('auth')->group(function () {

    Route::get('/{user}', 'info')->name('users.info');

    Route::get('/{user}/edit', 'edit')->name('users.edit');

    Route::patch('/{user}', 'update')->name('users.update');
});
