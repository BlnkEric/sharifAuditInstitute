<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard')->middleware('is_admin');

Route::get('/industries', [App\Http\Controllers\IndustryController::class, 'index'])->name('front.industries');
Route::prefix('admin')->group(function() {
    Route::resource('industries', App\Http\Controllers\Admin\IndustryController::class, [
        'as' => 'admin'
    ])->middleware('auth', 'is_admin');
});
