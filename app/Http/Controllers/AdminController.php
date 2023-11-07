<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $lastSevenDays = now()->subDays(7)->startOfDay();
        $endOfToday = now()->endOfDay();
        $today = now()->toDateString();
        $user = auth()->user();

        $totalUsers = User::count();
        $newUsers = User::whereBetween('created_at', [$lastSevenDays, $endOfToday])->count();
        $totalPosts = Post::count();
        $todaysPosts = Post::whereDate('created_at', $today)->count();

        return view('admin.admin')->with([
            'posts' => $user->posts,
            'totalUsers' => $totalUsers,
            'newUsers'=> $newUsers,
            'totalPosts' => $totalPosts,
            'todaysPosts'=> $todaysPosts
        ]);
    }

    public function showUsers(){
        $users = User::where('is_admin', false)->orderBy('created_at','desc')->paginate(10);

        return view('admin.users',['users'=> $users]);
    }
    public function showAdmins(){
        $admins = User::where('is_admin', true)->orderBy('created_at','desc')->paginate(10);

        return view('admin.show-admins',['users'=> $admins]);
    }
}
