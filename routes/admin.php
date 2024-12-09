<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\ContactMailController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PageController;


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
    Route::get('/contact-mail/{id}/edit', [ContactMailController::class, 'edit']);
    Route::post('/contact-mail-update', [ContactMailController::class, 'update']);
    Route::get('/contact-all-message', [ContactMailController::class, 'getAllMessage'])->name('admin.contactMessage');

    // menu
    Route::get('/menu', [MenuController::class, 'index'])->name('admin.menu');
    Route::post('/menu', [MenuController::class, 'store']);
    Route::get('/menu/{id}/edit', [MenuController::class, 'edit']);
    Route::post('/menu-update', [MenuController::class, 'update']);
    Route::get('/menu/{id}', [MenuController::class, 'delete']);

        
    // category
    Route::get('/category', [GalleryController::class, 'category'])->name('admin.category');
    Route::post('/category', [GalleryController::class, 'categorystore']);
    Route::get('/category/{id}/edit', [GalleryController::class, 'categoryedit']);
    Route::post('/category-update', [GalleryController::class, 'categoryupdate']);
    Route::get('/category/{id}', [GalleryController::class, 'categorydelete']);

    
    Route::get('/gallery', [GalleryController::class, 'index'])->name('admin.gallery');
    Route::post('/gallery', [GalleryController::class, 'store']);
    Route::get('/gallery/{id}/edit', [GalleryController::class, 'edit']);
    Route::post('/gallery-update', [GalleryController::class, 'update']);
    Route::get('/gallery/{id}', [GalleryController::class, 'delete']);

    
    // about
    Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
    Route::get('/project-statement', [AboutController::class, 'projectStatement'])->name('admin.projectStatement');
    Route::post('/about', [AboutController::class, 'store']);
    Route::get('/about/{id}/edit', [AboutController::class, 'edit']);
    Route::post('/about-update', [AboutController::class, 'update']);

    
    Route::get('/pages', [PageController::class, 'index'])->name('admin.pages');
    Route::post('/pages', [PageController::class, 'store']);
    Route::get('/pages/{id}/edit', [PageController::class, 'edit']);
    Route::post('/pages-update', [PageController::class, 'update']);
    Route::get('/pages/{id}', [PageController::class, 'delete']);

});
  