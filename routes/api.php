<?php

use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\MateriController;
use App\Http\Controllers\User\PercakapanHarianController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\VocabularyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [UserController::class, 'store']);

// Route::group(['middleware' => 'auth:sanctum'], function () {
Route::get('/user', [UserController::class, 'get']);

Route::get('/materi', [MateriController::class, 'get']);
Route::get('/kosakata', [VocabularyController::class, 'get']);
Route::get('/percakapan-harian', [PercakapanHarianController::class, 'get']);

Route::patch('/user', [UserController::class, 'update']);

// Route::post('/logout', [AuthController::class, 'logout']);
// });
