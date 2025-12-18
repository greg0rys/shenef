<?php

<<<<<<< Updated upstream
use App\Http\Controllers\ItemController;
=======
use App\Http\Controllers\CompanyLocationsController;
>>>>>>> Stashed changes
use App\Http\Controllers\UserController;
use App\Models\CompanyLocations;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('item.index');
    });

<<<<<<< Updated upstream
Route::get(
    '/users/{user}/items',
    [ItemController::class, 'getUserItems'])
     ->name('users.items')
;
=======
// get all items for a user
Route::get('/users/{user}/items', [ItemController::class,'getUserItems'])->name('users.items');

Route::resource('items', ItemController::class);
Route::resource('locations', CompanyLocationsController::class);

>>>>>>> Stashed changes


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

