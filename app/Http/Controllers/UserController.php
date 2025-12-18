<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    public function admin_users()
    {
        $super_admins = User::where('role_id', 1)->get();

        $users = User::where('role_id', '=', 1)->withTrashed()->get();

        return view('user.admin_users', compact('users'));
    }

    public function updateFirstName(User $u, string $name)
    {
        $u->first_name = $name;
        $u->save();
    }

    public function updateLastName(User $u, string $name)
    {
        $u->last_name = $name;
        $u->save();
    }

    public function updateCompanyLocation(User $u, int $location_id)
    {
        $u->company_location_id  = $location_id;
        $u->save();
    }
}
