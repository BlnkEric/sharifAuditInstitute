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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('front.main');

// Route::get('/account', function () {
//     return view('account');
// });

// Route::get('/industry', function () {
//     return view('industry');
// });

Route::get('/article', function () {
    return view('article');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/work', function () {
    return view('workwithus');
});

Route::get('/adamha', function () {
    return view('people');
});

Auth::routes();

Route::get('/industries', [App\Http\Controllers\IndustryController::class, 'index'])->name('industries.index');
Route::resource('services', App\Http\Controllers\ServiceController::class)->only(['index', 'show']);
Route::resource('articles', App\Http\Controllers\ArticleController::class)->only(['index', 'show']);
Route::resource('staffs', App\Http\Controllers\StaffController::class)->only(['index', 'show']);
Route::resource('proposals', App\Http\Controllers\UserProposalController::class)->middleware('auth');

Route::resource('jobRequests', App\Http\Controllers\JobRequestController::class)->except(['store']);
Route::post('/job-offer/{jobOffer}/job-request', [App\Http\Controllers\JobRequestController::class, 'store'])
->name("jobRequests.store");

Route::resource('jobOffers', App\Http\Controllers\JobOfferController::class)->only(['index', 'show']);
Route::get('/download-resume-form', [ App\Http\Controllers\JobOfferController::class, 'downloadForm'])->name('resumeForm.download');


Route::prefix('admin')->middleware('auth', 'is_admin')->group(function() {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('industries', App\Http\Controllers\Admin\IndustryController::class, [
        'as' => 'admin'
    ]);
    Route::resource('services', App\Http\Controllers\Admin\ServiceController::class, [
        'as' => 'admin'
    ]);
    Route::resource('jobOffers', App\Http\Controllers\Admin\JobOfferController::class, [
        'as' => 'admin'
    ]);
    Route::get('job-request/{uuid}/download/', [ App\Http\Controllers\Admin\JobOfferController::class, 'download'])->name('admin.jobRequests.download');

    Route::resource('special-services', App\Http\Controllers\Admin\SpecialServiceController::class, [
        'as' => 'admin',
        'names' => [
            'index' => 'admin.specialServices.index',
            'destroy' => 'admin.specialServices.destroy',
        ]
    ])->only(['index', 'destroy']);;

    Route::get('/service/{service}/special-services/create', [App\Http\Controllers\Admin\SpecialServiceController::class, 'create'])
    ->name("admin.specialServices.create");

    Route::post('/service/{service}/special-services', [App\Http\Controllers\Admin\SpecialServiceController::class, 'store'])
    ->name("admin.specialServices.store");

    Route::get('/service/{service}/special-services/edit/{specialService}', [App\Http\Controllers\Admin\SpecialServiceController::class, 'edit'])
    ->name("admin.specialServices.edit");

    Route::put('/service/{service}/special-services/{specialService}', [App\Http\Controllers\Admin\SpecialServiceController::class, 'update'])
    ->name("admin.specialServices.update");


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

    Route::post('/special-service-image-create', [App\Http\Controllers\Admin\SpecialServiceController::class, 'uploadImageOnCreate'])
        ->name("upload.specialService.image.create");
    Route::post('/special-service-image-update/{specialService}', [App\Http\Controllers\Admin\SpecialServiceController::class, 'uploadImageOnUpdate'])
        ->name("upload.specialService.image.update");
    Route::get('/special-service-image-delete', [App\Http\Controllers\Admin\SpecialServiceController::class, 'deleteImage'])
        ->name('delete.specialService.description.photo');

    Route::post('/article-image-create', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImageOnCreate'])
    ->name("upload.article.image.create");
    Route::post('/article-image-update/{article}', [App\Http\Controllers\Admin\ArticleController::class, 'uploadImageOnUpdate'])
        ->name("upload.article.image.update");
    Route::get('/article-image-delete', [App\Http\Controllers\Admin\ArticleController::class, 'deleteImage'])
        ->name('delete.article.description.photo');
});




