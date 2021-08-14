<?php

namespace App\Http\Controllers;


use App\Models\SavingService;
use App\Models\LoanService;
use App\Models\SavingTransaction;
use App\Models\RequestedLoan;
use App\Models\LoanDisburseRecord;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class AuditorController extends Controller
{
    public function index(){
        $user = User::all();
        $total_loan_services = DB::table('loan_services')->count();
        $total_saving_services = DB::table('saving_services')->count();
        return view('dashboards/auditors/index', compact('total_loan_services','total_saving_services'));
    }

    public function view_saving_servises(){
        $saving_services = DB::table('saving_services')->get();
        return view('dashboards\auditors\saving_management\view_saving_services', compact('saving_services'));
    }

    public function view_loan_services(){
        $loan_services = LoanService::all();
        return view('dashboards\auditors\loan_management\view_loan_services',compact('loan_services'));
    }

     public function profile(){
        return view('dashboards/auditors/profile');
    }

     public function settings(){
        return view('dashboards/auditors/settings');
    }
}
