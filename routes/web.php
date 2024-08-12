<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MateriController;
use App\Http\Controllers\Admin\PercakapanHarianController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VocabularyController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'materi', 'as' => 'materi.'], function () {
        Route::get('/', [MateriController::class, 'index'])->name('index');
        Route::get('/add', [MateriController::class, 'create'])->name('add');
        Route::post('/store', [MateriController::class, 'store'])->name('store');
        Route::get('/{materi:id}', [MateriController::class, 'show'])->name('show');
        Route::get('/{materi:id}/edit', [MateriController::class, 'edit'])->name('edit');
        Route::patch('/{materi:id}/update', [MateriController::class, 'update'])->name('update');
        Route::delete('/{materi:id}', [MateriController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'kosakata', 'as' => 'kosakata.'], function () {
        Route::get('/', [VocabularyController::class, 'index'])->name('index');
        Route::get('/add', [VocabularyController::class, 'create'])->name('add');
        Route::post('/store', [VocabularyController::class, 'store'])->name('store');
        Route::get('/{vocabulary:id}', [VocabularyController::class, 'show'])->name('show');
        Route::get('/{vocabulary:id}/edit', [VocabularyController::class, 'edit'])->name('edit');
        Route::patch('/{vocabulary:id}/update', [VocabularyController::class, 'update'])->name('update');
        Route::delete('/{vocabulary:id}', [VocabularyController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'percakapan-harian', 'as' => 'percakapan-harian.'], function () {
        Route::get('/', [PercakapanHarianController::class, 'index'])->name('index');
        Route::post('/store', [PercakapanHarianController::class, 'store'])->name('store');
        Route::get('/{percakapanHarian:id}', [PercakapanHarianController::class, 'show'])->name('show');
        Route::get('/{percakapanHarian:id}/edit', [PercakapanHarianController::class, 'edit'])->name('edit');
        Route::patch('/{percakapanHarian:id}/update', [PercakapanHarianController::class, 'update'])->name('update');
        Route::delete('/{percakapanHarian:id}', [PercakapanHarianController::class, 'delete'])->name('delete');
    });

    Route::get('/profile', [AccountController::class, 'index'])->name('profile');
    Route::patch('/profile', [AccountController::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
