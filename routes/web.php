<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);
Route::get('/services', [PagesController::class, 'services']);

Route::resource('posts', PostsController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});

Route::post('login', 'LoginController@login')->name('login');

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');
Route::view('/admin', 'admin/admin');
Route::get('/admin', [AdminController::class, 'index'])->name('admin'); // Admin page
Route::get('/home', [HomeController::class, 'index'])->name('home'); // Home page
