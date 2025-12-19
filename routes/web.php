<?php

use App\Http\Controllers\CompanyLocationsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return view('item.index');
    });

// get all items for a user
Route::get(
    '/users/{user}/items',
    [ItemController::class, 'getUserItems'])
     ->name('users.items')
;

Route::resource(
    'items',
    ItemController::class);

// get items for a given company
Route::get(
    '/locations/{companyLocation}/items',
    [CompanyLocationsController::class, 'show'])
     ->name('locations.items')
;
Route::resource(
    'locations',
    CompanyLocationsController::class);


Route::resource(
    'users',
    UserController::class);

