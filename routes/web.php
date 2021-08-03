<?php
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\AuditorController;
use App\http\Controllers\CustomerRelationOfficer;
use App\http\Controllers\CustomerServiceOfficer;
use App\Http\Controllers\TestController;

use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where  web routes are registered for application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',[TestController::class,'test']);


//To protect back history after logout
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    //Employee registeration
    Route::get('employee_registration',[AdminController::class,'employee_registration_form'])->name('admin.employee_registration');
    Route::post('employee_registration',[AdminController::class,'add_new_employee'])->name('admin.add_new_employee');

    //Employee updation
    Route::get('edit_employee/{id}',[AdminController::class,'edit_employee_form'])->name('admin.edit_employee');
    Route::post('edit_employee/{id}',[AdminController::class,'update_employee'])->name('admin.edit_employee');

    //viewing employee
    Route::get('view_employee/',[AdminController::class,'view_employee'])->name('admin.view_employee');

    //Employee details
    Route::get('employee_detail/{id}',[AdminController::class, 'employee_detail'])->name('admin.employee_detail');

    Route::delete('delete_employee/{id}',[AdminController::class,'delete_employee'])->name('admin.delete_employee');


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
