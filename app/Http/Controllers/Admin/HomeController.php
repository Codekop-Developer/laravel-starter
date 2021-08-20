<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        deleteFolder(storage_path('app/livewire-tmp'));
        $data = [
            'title'     => 'Dashboard',
            'sidebar'   => 'dashboard',
            'icon'      => 'fas fa-fire',
        ];

        return view('contents.admin.dashboard.index', $data);
    }

    public function log_login()
    {
        $data = [
            'title'     => 'Log Login',
            'sidebar'   => 'log_login',
            'icon'      => 'fas fa-history',
        ];

        return view('contents.admin.users.log', $data);
    }

}
