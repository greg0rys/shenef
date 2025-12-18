<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('item.index');
    });

Route::get(
    '/users/{user}/items',
    [ItemController::class, 'getUserItems'])
     ->name('users.items')
;


Route::get(
    '/admin/items/{item}/delete',
    [ItemController::class, 'deleteItem'])
     ->name('admin.item.delete')
;

Route::resource(
    'items',
    ItemController::class);

Route::get('users/admins', [UserController::class, 'admin_users'] )->name('users.admins');
Route::resource(
    'users',
    UserController::class);

