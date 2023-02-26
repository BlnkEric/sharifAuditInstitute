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

Route::get('/industries', [App\Http\Controllers\IndustryController::class, 'index'])->name('industries.index');
Route::resource('services', App\Http\Controllers\ServiceController::class)->only(['index', 'show']);
Route::resource('articles', App\Http\Controllers\ArticleController::class)->only(['index', 'show']);
Route::resource('staffs', App\Http\Controllers\StaffController::class)->only(['index', 'show']);
Route::resource('proposals', App\Http\Controllers\UserProposalController::class)->middleware('auth');

Route::prefix('admin')->middleware('auth', 'is_admin')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('industries', App\Http\Controllers\Admin\IndustryController::class, [
        'as' => 'admin'
    ]);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, [
        'as' => 'admin'
    ]);
    Route::resource('clients', App\Http\Controllers\Admin\ClientsController::class, [
        'as' => 'admin'
    ]);
    Route::resource('proposals', App\Http\Controllers\Admin\ProposalController::class, [
        'as' => 'admin'
    ])->only(['index', 'show', 'destroy']);
    Route::resource('articles', App\Http\Controllers\Admin\ArticleController::class, [
        'as' => 'admin'
    ]);
    Route::resource('staffs', App\Http\Controllers\Admin\StaffController::class, [
        'as' => 'admin'
    ]);
    Route::post('/service-image-create', [App\Http\Controllers\Admin\ServiceController::class, 'uploadImageOnCreate'])
        ->name("upload.service.image.create");
    Route::post('/service-image-update/{service}', [App\Http\Controllers\Admin\ServiceController::class, 'uploadImageOnUpdate'])
        ->name("upload.service.image.update");
    Route::get('/service-image-delete', [App\Http\Controllers\Admin\ServiceController::class, 'deleteImage'])
        ->name('delete.service.description.photo');


    Route::post('/article-image-create', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImageOnCreate'])
    ->name("upload.article.image.create");
    Route::post('/article-image-update/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImageOnUpdate'])
        ->name("upload.article.image.update");
    Route::get('/article-image-delete', [App\Http\Controllers\Admin\ArticleController::class, 'deleteImage'])
        ->name('delete.article.description.photo');
});




