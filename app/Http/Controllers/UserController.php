<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    /**
     * @return Factory|View|\Illuminate\View\View
     * get all users who have a role id that is an admin
     * 1 - Super Admin
     * 2 - Admin
     * 5 - System Administrator
     * Bring in trashed to see historic users as well
     */
    public function admin_users()
    {
        $admin_users = User::whereIn('role_id', [1,2,5])->withTrashed()->get();


        return view('user.admin_users', compact('admin_users'));
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
