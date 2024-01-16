<?php

use App\Http\Controllers\Cabinet\Comment\CommentController;
use App\Http\Controllers\Cabinet\ProfileController;
use App\Http\Controllers\Cabinet\Topic\TopicController;
use Illuminate\Support\Facades\Route;
use Psy\Command\EditCommand;

Route::prefix('cabinet')->controller(ProfileController::class)->middleware('auth')->group(function () {

    Route::get('/{user}', 'info')->name('users.info')->withoutMiddleware('auth');

    Route::get('/{user}/edit', 'edit')->name('users.edit');

    Route::patch('/{user}', 'update')->name('users.update');

    Route::prefix('{user}/topics')->controller(TopicController::class)->group(function () {

        Route::get('/', 'index')->name('users.topics.index')->withoutMiddleware('auth');

        Route::get('/create', 'create')->name('users.topics.create');

        Route::post('/', 'store')->name('users.topics.store');
    });

    Route::prefix('{user}/comments')->controller(CommentController::class)->group(function () {

        Route::get('/', 'index')->name('users.comments.index')->withoutMiddleware('auth');

        Route::get('/{comment}/edit', 'edit')->name('users.comments.edit');

        Route::patch('/{comment}', 'update')->name('users.comments.update');

        Route::delete('/{comment}', 'delete')->name('users.comments.delete')->scopeBindings();


    });
});
