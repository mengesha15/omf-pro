<?php
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\AuditorController;
use App\http\Controllers\CustomerRelationOfficer;
use App\http\Controllers\CustomerServiceOfficer;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/',[AdminController::class,'guest_page'])->name('guest.dashboard');

Auth::routes();
Route::get('logout',[LoginController::class, 'logout']);
//To protect back history after logout
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});

/*----<Admin's tasks>---*/             //                    (1)

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');

    //Employee registeration
    Route::get('employee_registration',[AdminController::class,'employee_registration_form'])->name('admin.employee_registration_form');
    Route::post('employee_registration',[AdminController::class,'add_new_employee'])->name('admin.add_new_employee');

    //Employee updation
    Route::get('edit_employee/{id}',[AdminController::class,'edit_employee_form'])->name('admin.edit_employee_form');
    Route::post('edit_employee/{id}',[AdminController::class,'update_employee'])->name('admin.edit_employee');

    //viewing employee
    Route::get('view_employee/',[AdminController::class,'view_employee'])->name('admin.view_employee');

    Route::get('borrowers_list',[AdminController::class,'view_borrowers'])->name('admin.borrowers_list');

    Route::get('customers_list', [AdminController::class,'view_customers'])->name('admin.customers_list');

    Route::get('users_list/',[AdminController::class,'users_list'])->name('admin.users_list');

    //Employee details
    Route::get('employee_detail/{id}',[AdminController::class, 'employee_detail'])->name('admin.employee_detail');

    //Delete employee
    Route::delete('delete_employee/{id}',[AdminController::class,'delete_employee'])->name('admin.delete_employee');

    Route::get('requested_list', [AdminController::class, 'requested_loans_list'])->name('admin.requested_list');

    Route::get('loan_request_approvement/{roll_number}', [AdminController::class, 'approve_request'])->name('admin.approve_requested_loan');

    Route::delete('reject_loan_request/{roll_number}',[AdminController::class,'reject_loan_request'])->name('admin.reject_loan_request');

    Route::get('approved_loans_list',[AdminController::class,'approved_loans_list'])->name('admin.approved_loans_list');

    //Registration of role, branch, loan service and saving srvice
    Route::get('loan_service_registration',[AdminController::class,'loan_service_registration_form'])->name('admin.loan_service_registration_form');
    Route::post('loan_service_registration',[AdminController::class,'add_new_loan_service'])->name('admin.add_new_loan_service');

    Route::get('saving_service_registration',[AdminController::class,'saving_service_registration_form'])->name('admin.saving_service_registration_form');
    Route::post('saving_service_registration',[AdminController::class,'add_new_saving_service'])->name('admin.add_new_saving_service');

    Route::get('branch_registration',[AdminController::class,'branch_registration_form'])->name('admin.branch_registration_form');
    Route::post('branch_registration',[AdminController::class,'branch_registration'])->name('admin.branch_registration');

    Route::get('role_registration',[AdminController::class,'role_registration_form'])->name('admin.role_registration_form');
    Route::post('role_registration',[AdminController::class,'role_registration'])->name('admin.role_registration');

    // View role, branch, loan service and saving srvice
    Route::get('loan_services_list',[AdminController::class,'view_loan_service'])->name('admin.view_loan_service');
    Route::get('saving_services_list',[AdminController::class,'view_saving_service'])->name('admin.view_saving_service');

    Route::get('branches_list',[AdminController::class,'view_branch'])->name('admin.view_branch');

    Route::get('role_list',[AdminController::class,'view_role'])->name('admin.view_role');

    Route::get('all_services_list',[AdminController::class,'all_services_list'])->name('admin.all_services_list');

    //delete role, branch, loan service and saving service
    Route::delete('delete_loan_service/{id}',[AdminController::class,'delete_loan_service'])->name('admin.delete_loan_service');
    Route::delete('delete_saving_service/{id}',[AdminController::class,'delete_saving_service'])->name('admin.delete_saving_service');
    Route::delete('delete_branch/{id}',[AdminController::class,'delete_branch'])->name('admin.delete_branch');
    Route::delete('delete_role/{id}',[AdminController::class,'delete_role'])->name('admin.delete_role');

    //edit role, branch, loan service and saving service
    Route::get('edit_branch/{id}',[AdminController::class,'edit_branch_form'])->name('admin.edit_branch_form');
    Route::post('edit_branch/{id}',[AdminController::class,'update_branch'])->name('admin.update_branch');

    Route::get('edit_role/{id}',[AdminController::class,'edit_role_form'])->name('admin.edit_role_form');
    Route::post('edit_role/{id}',[AdminController::class,'update_role'])->name('admin.update_role');

    Route::get('edit_loan_service/{id}',[AdminController::class,'edit_loan_service_form'])->name('admin.edit_loan_service_form');
    Route::post('edit_loan_service/{id}',[AdminController::class,'update_loan_service'])->name('admin.update_loan_service');

    Route::get('edit_saving_service/{id}',[AdminController::class,'edit_saving_service_form'])->name('admin.edit_saving_service_form');
    Route::post('edit_saving_service/{id}',[AdminController::class,'update_saving_service'])->name('admin.update_saving_service');


    Route::get('event_photo_uploading',[AdminController::class,'upload_event_photo_form'])->name('admin.event_photo_uploading_form');
    Route::post('event_photo_uploading',[AdminController::class,'upload_event_photo'])->name('admin.event_photo_uploading');
    Route::delete('delete_event_photo/{id}',[AdminController::class,'delete_event_photo'])->name('admin.delete_event_photo');

    Route::get('change_password',[AdminController::class,'change_password_form'])->name('admin.change_password_form');
    Route::post('reset_password',[AdminController::class,'reset_password'])->name('admin.reset_password');

    // users password reset
    Route::get('change_user_password',[AdminController::class, 'change_user_password_form'])->name('admin.change_user_password_form');
    Route::post('reset_user_password',[AdminController::class, 'reset_user_password'])->name('admin.reset_user_password');
    Route::delete('reset_user_password/{employee_id}',[AdminController::class, 'reset_user_password_from_view'])->name('admin.reset_user_password_from_view');


});
/*----</Admin's tasks>---*/

/*----<Auditor's tasks>---*/                //                    (2)

Route::group(['prefix'=>'auditor', 'middleware'=>['isAuditor','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AuditorController::class,'index'])->name('auditor.dashboard');


    Route::post('add_new_taken_money',[AuditorController::class,'add_new_taken_money'])->name('auditor.add_new_taken_money');

    Route::get('saving_transaction_audit',[AuditorController::class,'view_saving_transaction_audit'])->name('auditor.view_saving_transaction_audit');

    Route::get('loan_transaction_audit',[AuditorController::class,'view_loan_transaction_audit'])->name('auditor.view_loan_transaction_audit');

    //Saving service
    Route::get('saving_services_list', [AuditorController::class,'view_saving_servises'])->name('auditor.saving_services_list');

    Route::get('loan_services_list',[AuditorController::class,'view_loan_services'])->name('auditor.view_loan_services');


    Route::get('change_password',[AuditorController::class,'change_password_form'])->name('auditor.change_password_form');
    Route::post('reset_password',[AuditorController::class,'reset_password'])->name('auditor.reset_password');
});

/*----</Auditor's tasks>---*/

/*----<Customer relation officers's tasks>---*/  //                    (3)

Route::group(['prefix'=>'customerRelationOfficer', 'middleware'=>['isCustomerRelationOfficer','auth','PreventBackHistory']], function(){

    Route::get('dashboard',[CustomerRelationOfficer::class,'index'])->name('customerRelationOfficer.dashboard');

    //Customer management
    Route::get('customers_list', [CustomerRelationOfficer::class,'view_customers'])->name('customerRelationOfficer.customers_list');

    Route::get('customer_registration',[CustomerRelationOfficer::class, 'add_new_customer_form'])->name('customerRelationOfficer.customer_registration_form');
    Route::post('customer_registration',[CustomerRelationOfficer::class, 'add_new_customer'])->name('customerRelationOfficer.customer_registration');
   //Customer detail and searching
    Route::get('search_customer', [CustomerRelationOfficer::class, 'search_customer'])->name('customerRelationOfficer.search_customer');
    Route::get('customer_detail/{account_number}', [CustomerRelationOfficer::class, 'view_customer_detail'])->name('customerRelationOfficer.view_customer_detail');

    //Transaction management
    Route::get('saving_transactions_list', [CustomerRelationOfficer::class,'view_saving_transaction'])->name('customerRelationOfficer.saving_transactions_list');

    Route::post('deposit_money', [CustomerRelationOfficer::class, 'deposit_money'])->name('customerRelationOfficer.deposit_money');
    Route::post('withdraw_money', [CustomerRelationOfficer::class, 'withdraw_money'])->name('customerRelationOfficer.withdraw_money');
    Route::post('transfer_money', [CustomerRelationOfficer::class, 'transfer_money'])->name('customerRelationOfficer.transfer_money');


    //Saving service
    Route::get('saving_services_list', [CustomerRelationOfficer::class,'view_saving_servises'])->name('customerRelationOfficer.saving_services_list');


    Route::get('change_password',[CustomerRelationOfficer::class,'change_password_form'])->name('customerRelationOfficer.change_password_form');
    Route::post('reset_password',[CustomerRelationOfficer::class,'reset_password'])->name('customerRelationOfficer.reset_password');
});

/*----</Customer relation officers's tasks>---*/

/*----<Customer service officers's tasks>---*/    //                        (4)

Route::group(['prefix'=>'customerServiceOfficer', 'middleware'=>['isCustomerServiceOfficer','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[CustomerServiceOfficer::class,'index'])->name('customerServiceOfficer.dashboard');

    Route::get('add_new_request',[CustomerServiceOfficer::class,'add_new_request_form'])->name('customerServiceOfficer.add_new_request_form');

   Route::post('add_new_request',[CustomerServiceOfficer::class,'add_new_request'])->name('customerServiceOfficer.add_new_request');

   Route::get('borrowers_list',[CustomerServiceOfficer::class,'view_borrowers'])->name('customerServiceOfficer.borrowers_list');

   Route::get('update_borrower/{roll_number}',[CustomerServiceOfficer::class,'edit_employee_form'])->name('customerServiceOfficer.edit_employee_form');
   Route::post('update_borrower/{roll_number}',[CustomerServiceOfficer::class,'update_borrower'])->name('customerServiceOfficer.update_borrower');

   Route::get('requested_loan_list', [CustomerServiceOfficer::class, 'view_requested_loans'])->name('customerServiceOfficer.requested_loan_list');

   Route::get('approved_loans_list',[CustomerServiceOfficer::class,'view_approved_loans'])->name('customerServiceOfficer.approved_loans_list');

   Route::get('loan_payment/{roll_number}', [CustomerServiceOfficer::class,'loan_payment_form'])->name('customerServiceOfficer.loan_payment_form');

   Route::get('search_borrower', [CustomerServiceOfficer::class, 'search_borrower'])->name('customerServiceOfficer.search_borrower');
   Route::post('loan_payment/{roll_number}', [CustomerServiceOfficer::class,'apply_loan_payment'])->name('customerServiceOfficer.loan_payment');

   Route::get('loan_disbursemet_lists', [CustomerServiceOfficer::class,'view_loan_disbursemet'])->name('customerServiceOfficer.loan_disbursemet_lists');

   Route::get('loan_disbursemet_detail/{roll_number}', [CustomerServiceOfficer::class,'view_loan_disbursemet_detail'])->name('customerServiceOfficer.loan_disbursemet_detail');


    Route::post('new_loan_disbursement', [CustomerServiceOfficer::class,'new_loan_disbursement'])->name('customerServiceOfficer.new_loan_disbursement');

    Route::get('loan_services_list',[CustomerServiceOfficer::class,'view_loan_services'])->name('customerServiceOfficer.view_loan_services');

    Route::get('change_password',[CustomerServiceOfficer::class,'change_password_form'])->name('customerServiceOfficer.change_password_form');
    Route::post('reset_password',[CustomerServiceOfficer::class,'reset_password'])->name('customerServiceOfficer.reset_password');
});

/*----</Customer service officers's tasks>---*/

