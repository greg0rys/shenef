<?php
use App\Models\User;
use App\Models\Company;
use App\Models\CompanyLocations;
use App\Models\Item;


// test user and company location link

$users = User::with(['company', 'items'])->get(); // angsty load for fun

$users->each(function ($user) {
    echo "$user->username total items => ".  $user->items()->count() . PHP_EOL;
});
