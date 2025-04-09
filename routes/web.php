<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
  
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

// cache clear
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
 });
//  cache clear
  
// Route::get('/', function () {
//     return view('welcome');
// });
  
Auth::routes();
Route::get('/', [FrontendController::class, 'index'])->name('homepage');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/project-statement', [FrontendController::class, 'projectStatement'])->name('projectStatement');
Route::get('/reporting', [FrontendController::class, 'reporting'])->name('reporting');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/gallery/{catid}/{mid}', [FrontendController::class, 'gallery'])->name('gallery');


Route::get('/gallery-details/{id}', [FrontendController::class, 'galleryDetails'])->name('galleryDetails');
Route::get('/pages/{id}', [FrontendController::class, 'newPages'])->name('frontend.pages');
  
Route::post('/contact-submit', [FrontendController::class, 'visitorContact'])->name('contact.submit');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'user/', 'middleware' => ['auth', 'is_user']], function(){
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'manager/', 'middleware' => ['auth', 'is_manager']], function(){
  
    Route::get('/dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
});
 