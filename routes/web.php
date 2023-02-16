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
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, [
        'as' => 'admin'
    ])->middleware('auth', 'is_admin');
    Route::post('/service-image-create', [App\Http\Controllers\Admin\ServiceController::class, 'uploadImageOnCreate'])
        ->name("upload.service.image.create");
    Route::post('/service-image-update/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'uploadImageOnUpdate'])
        ->name("upload.service.image.update");
    Route::get('/service-image-delete', [App\Http\Controllers\Admin\ServiceController::class, 'deleteImage'])
        ->name('delete.service.description.photo');
});
