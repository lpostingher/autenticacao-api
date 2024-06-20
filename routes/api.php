<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return UserResource::make($request->user());
    // return UserResource::collection(User::all());
    // return UserResource::collection(User::paginate());
    // return UserCollection::make(User::all());
    // return UserCollection::make(User::paginate());
})->middleware('auth:sanctum');

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);