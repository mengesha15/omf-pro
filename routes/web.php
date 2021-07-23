<?php

use Illuminate\Support\Facades\Route;

use App\http\Controllers\AdminController;
use App\http\Controllers\AuditorController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
});

Route::group(['prefix'=>'auditor', 'middleware'=>['isAuditor','auth']], function(){
    Route::get('dashboard',[AuditorController::class,'index'])->name('auditor.dashboard');
    Route::get('profile',[AuditorController::class,'profile'])->name('auditor.profile');
    Route::get('settings',[AuditorController::class,'settings'])->name('auditor.settings');
});