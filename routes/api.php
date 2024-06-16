<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterEventController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/registerEvent', [RegisterEventController::class, 'register']);

Route::get('/user/{id}', function ($id) {
    $user = User::findOrFail($id);

    return response()->json($user);
});

Route::apiResource('/posts', PostController::class);

Route::get('/verified-users', function () {
    $activeUsers = User::emailVerified()->get();

    return response()->json($activeUsers);
});
