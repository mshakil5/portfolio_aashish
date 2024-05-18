<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\ContactMailController;


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
  
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end

    Route::get('/new-admin', [AdminController::class, 'getAdmin'])->name('alladmin');
    Route::post('/new-admin', [AdminController::class, 'adminStore']);
    Route::get('/new-admin/{id}/edit', [AdminController::class, 'adminEdit']);
    Route::post('/new-admin-update', [AdminController::class, 'adminUpdate']);
    Route::get('/new-admin/{id}', [AdminController::class, 'adminDelete']);
    

    Route::get('/country', [CountryController::class, 'index'])->name('admin.country');
    Route::post('/country', [CountryController::class, 'store']);
    Route::get('/country/{id}/edit', [CountryController::class, 'edit']);
    Route::post('/country-update', [CountryController::class, 'update']);
    Route::get('/country/{id}', [CountryController::class, 'delete']);

    
    Route::get('/slider', [SliderController::class, 'index'])->name('admin.slider');
    Route::post('/slider', [SliderController::class, 'store']);
    Route::get('/slider/{id}/edit', [SliderController::class, 'edit']);
    Route::post('/slider-update', [SliderController::class, 'update']);
    Route::get('/slider/{id}', [SliderController::class, 'delete']);

    // company information
    Route::get('/company-detail', [CompanyDetailController::class, 'index'])->name('admin.companyDetail');
    Route::post('/company-detail', [CompanyDetailController::class, 'update'])->name('admin.companyDetails');

    
    // contact-mail
    Route::get('/contact-mail', [ContactMailController::class, 'index'])->name('admin.contactMail');
    // Route::post('/contact-mail', [CountryController::class, 'store']);
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::post('/contact-mail-update', [ContactMailController::class, 'update']);
    // Route::get('/contact-mail/{id}', [CountryController::class, 'delete']);




});
  