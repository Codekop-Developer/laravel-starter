<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title'     => 'My Profile',
            'sidebar'   => 'profile',
            'icon'      => 'fas fa-user',
            'users'     => User::where("id",auth()->user()->id)->first(),
        ];

        return view('contents.admin.users.index', $data);
    }

    public function management(Request $request)
    {
        $data = [
            'title'     => 'Users Management',
            'sidebar'   => 'user_management',
            'request'   => $request,
            'icon'      => 'fas fa-users',
        ];

        return view('contents.admin.users.management', $data);
    }

    public function role(Request $request)
    {
        $data = [
            'title'     => 'Role Management',
            'sidebar'   => 'role_management',
            'request'   => $request,
            'icon'      => 'fas fa-ban',
        ];

        return view('contents.admin.users.role', $data);
    }

}
