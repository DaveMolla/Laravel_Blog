<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $user = auth()->user();

        $usersCount = User::count();

        return view('admin.admin')->with([
            'posts' => $user->posts,
            'usersCount' => $usersCount,
        ]);
    }
}
