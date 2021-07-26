<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\User;
use App\http\Controllers\AdminController;
use App\http\Controllers\AuditorController;
use App\http\Controllers\CustomerRelationOfficer;
use App\http\Controllers\CustomerServiceOfficer;

use Illuminate\Support\Facades\Auth;


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

//To protect logout and back to the loged in page
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

// Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('register');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
});

Route::group(['prefix'=>'auditor', 'middleware'=>['isAuditor','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AuditorController::class,'index'])->name('auditor.dashboard');
    Route::get('profile',[AuditorController::class,'profile'])->name('auditor.profile');
    Route::get('settings',[AuditorController::class,'settings'])->name('auditor.settings');
});

Route::group(['prefix'=>'customerRelationOfficer', 'middleware'=>['isCustomerRelationOfficer','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[CustomerRelationOfficer::class,'index'])->name('customerRelationOfficer.dashboard');
    Route::get('profile',[CustomerRelationOfficer::class,'profile'])->name('customerRelationOfficer.profile');
    Route::get('settings',[CustomerRelationOfficer::class,'settings'])->name('customerRelationOfficer.settings');
});

Route::group(['prefix'=>'customerServiceOfficer', 'middleware'=>['isCustomerServiceOfficer','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[CustomerServiceOfficer::class,'index'])->name('customerServiceOfficer.dashboard');
    Route::get('profile',[CustomerServiceOfficer::class,'profile'])->name('customerServiceOfficer.profile');
    Route::get('settings',[CustomerServiceOfficer::class,'settings'])->name('customerServiceOfficer.settings');
});
