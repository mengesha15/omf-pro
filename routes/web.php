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
Route::get('/regular_saving', function () {
return view('services/savingServices/regular_saving');

});


//To protect back history after logout
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

/*----<Admin's tasks>---*/             //                    (1)

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

    Route::get('requested_list', [AdminController::class, 'requested_list'])->name('admin.requested_list');

    Route::get('loan_request_approvement/{id}', [AdminController::class, 'approve_request'])->name('admin.approve_requested_loan');

    Route::delete('delete_employee/{id}',[AdminController::class,'delete_employee'])->name('admin.delete_employee');


    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');

});
/*----</Admin's tasks>---*/

/*----<Auditor's tasks>---*/                //                    (2)

Route::group(['prefix'=>'auditor', 'middleware'=>['isAuditor','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AuditorController::class,'index'])->name('auditor.dashboard');
    Route::get('profile',[AuditorController::class,'profile'])->name('auditor.profile');
    Route::get('settings',[AuditorController::class,'settings'])->name('auditor.settings');
});

/*----</Auditor's tasks>---*/

/*----<Customer relation officers's tasks>---*/  //                    (3)

Route::group(['prefix'=>'customerRelationOfficer', 'middleware'=>['isCustomerRelationOfficer','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[CustomerRelationOfficer::class,'index'])->name('customerRelationOfficer.dashboard');
    Route::get('profile',[CustomerRelationOfficer::class,'profile'])->name('customerRelationOfficer.profile');
    Route::get('settings',[CustomerRelationOfficer::class,'settings'])->name('customerRelationOfficer.settings');
});

/*----</Customer relation officers's tasks>---*/   //                    (4)

/*----<Customer service officers's tasks>---*/

Route::group(['prefix'=>'customerServiceOfficer', 'middleware'=>['isCustomerServiceOfficer','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[CustomerServiceOfficer::class,'index'])->name('customerServiceOfficer.dashboard');

    Route::get('add_new_request',[CustomerServiceOfficer::class,'add_new_request_form'])->name('customerServiceOfficer.add_new_request_form');

   Route::post('add_new_request',[CustomerServiceOfficer::class,'add_new_request'])->name('customerServiceOfficer.add_new_request');

   Route::get('borrowers_list',[CustomerServiceOfficer::class,'view_borrowers'])->name('customerServiceOfficer.borrowers_list');
   Route::get('approved_loans_list',[CustomerServiceOfficer::class,'view_approved_loans'])->name('customerServiceOfficer.approved_loans_list');

   Route::get('loan_payment/{id}', [CustomerServiceOfficer::class,'loan_payment_form'])->name('customerServiceOfficer.loan_payment_form');

   Route::get('search_borrower', [CustomerServiceOfficer::class, 'search_borrower'])->name('costomerServiceOfficer.search_borrower');
   Route::post('loan_payment/{id}', [CustomerServiceOfficer::class,'apply_loan_payment'])->name('customerServiceOfficer.loan_payment');

    Route::get('profile',[CustomerServiceOfficer::class,'profile'])->name('customerServiceOfficer.profile');
    Route::get('settings',[CustomerServiceOfficer::class,'settings'])->name('customerServiceOfficer.settings');
});

/*----</Customer service officers's tasks>---*/

