<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ans 1
Route::post('/register', [RegisterController::class,'register']);

// ans 2
Route::get('/home', function () {
    return redirect('/dashboard');
});

//  ans 4
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        // Profile route logic
    })->name('profile');

    Route::get('/settings', function () {
        // Settings route logic
    })->name('settings');
});
Route::resource('ProductController', ProductController::class);
