<?php

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

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mark-all-read/{user}', function (User $user) {
    $user->unreadNotifications->markAsRead();
    return response(['message'=>'done', 'notifications'=>$user->notifications]);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::any('/admin/{any?}', [AdminController::class, 'index'])->where('any','.*')->middleware('auth');

// Route::post('/broadcasting/auth', function () {
//     return Auth::user();
//  });
