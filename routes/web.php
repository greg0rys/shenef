<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('item.index');
});

Route::get('/users/{user}/items', [ItemController::class,'getUserItems'])->name('users.items');

Route::resource('items', ItemController::class);


Route::resource('users', UserController::class);

