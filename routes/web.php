<?php

use App\Models\Comment;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use App\Http\Livewire\Logout;
use App\Http\Livewire\Register;
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

// Route::get('/', function () {
//     // $data['comments'] = Comment::all();
//     return view('welcome');
// });

Route::group(['middleware' =>'auth'], function ()
{
    Route::get('/', Home::class)->name('home');
    Route::get('/logout', Logout::class)->name('logout');
});
Route::group(['middleware'=>'guest'], function()
{
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');    
});
