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
use Illuminate\Support\Facades\Hash;

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

    public function change_password_form(){
        return view('dashboards/auditors/change_password');
    }

    public function reset_password(Request $request){
            $request->validate([
                'new_password' => ['required', 'string', 'min:8',],
                'confirm_password' => ['required','string', 'min:8','same:new_password'],
                ],
                [
                    'confirm_password.same' => 'The two password are not the same. Please recorrect and try again.',
                ]
                );
            $username = Auth::user()->username;
            $new_password = Hash::make($request->new_password);
            $password_changed = User::where('username',$username)->update([
                'password' => $new_password,
            ]);
            if ($password_changed) {
                return redirect()->route('auditor.change_password_form')->with('message','Your  password has been changed successfully.');
            }else {
                return redirect()->route('auditor.change_password_form')->with('error_message','Your  password has not been changed successfully.. Please try again.');
            }

        }
}
