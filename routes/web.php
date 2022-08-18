<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => ['guest']], function() {
    Route::get('/', [App\Http\Controllers\LoginController::class, 'front'])
        ->name('kuinfo.front');

    Route::post('/login/register', [App\Http\Controllers\LoginController::class, 'register'])
        ->name('kuinfo.register');

    Route::post('/login/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])
        ->name('kuinfo.login');

});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\LoginController::class, 'home'])
        ->name('kuinfo.home');

    Route::get('/classes/index', [App\Http\Controllers\PostController::class, 'classes'])
        ->name('kuinfo.classes');

    Route::post('/classes/create', [App\Http\Controllers\PostController::class, 'create'])
        ->name('kuinfo.create');

    Route::get('/classes/{post}', [App\Http\Controllers\PostController::class, 'detail'])
        ->name('kuinfo.detail')
        ->where('post', '[0-9]+');

    Route::get('/mypage/index', [App\Http\Controllers\MypageController::class, 'mypage'])
        ->name('kuinfo.mypage');

    Route::post('/mypage/update', [App\Http\Controllers\MypageController::class, 'proUpdate'])
        ->name('kuinfo.update');

    Route::get('/contact/index', [App\Http\Controllers\ContactController::class, 'contact'])
        ->name('kuinfo.contact');

    Route::post('/contact/confirm', [App\Http\Controllers\ContactController::class, 'confirm'])
        ->name('kuinfo.confirm');

    Route::post('/contact/thanks', [App\Http\Controllers\ContactController::class, 'send'])
        ->name('kuinfo.thanks');

    Route::post('logout', [AuthController::class, 'logout'])
        ->name('logout');
});

Route::get('/error', [App\Http\Controllers\Controller::class, 'error'])
        ->name('kuinfo.error');

