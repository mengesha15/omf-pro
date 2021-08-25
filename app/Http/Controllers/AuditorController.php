<?php

namespace App\Http\Controllers;


use App\Models\SavingService;
use App\Models\LoanService;
use App\Models\SavingTransaction;
use App\Models\RequestedLoan;
use App\Models\LoanDisburseRecord;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\Customer;

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


    public function add_new_taken_money(Request $request){
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'taken_amount' => 'required|numeric|min:10000|max:100000',
         ],
         [
             'username.exists' => 'User name does not exist. Check and try again.',
         ]
        );
        return redirect()->route('auditor.add_new_taken_money');
    }

    public function view_saving_transaction_audit(){
        $saving_transaction_audits = SavingTransaction::select([
            'user_username',
            'transaction_type',
            \DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as transaction_date"),
            \DB::raw( 'COUNT(user_username) as worker_total_task'),
            \DB::raw('SUM(transaction_amount) as sum_of_each_transaction_type'),
        ])->groupBy('user_username')
          ->groupBy('transaction_type')
          ->groupBy('transaction_date')
          ->orderBy('transaction_date','desc')
          ->get();
        $saving_report = [];
        $saving_transaction_audits->each(function ($item) use(&$saving_report){
            $saving_report[$item->transaction_date][$item->transaction_type] = [
                'username' =>$item->user_username,
                'count' => $item->worker_total_task,
                'amount' => $item->sum_of_each_transaction_type,
            ];
        });
        $transaction_types = $saving_transaction_audits->pluck('transaction_type')->sortBy('transaction_type')->unique();
        // dd($saving_report,$transaction_types);
        return view('dashboards.auditors.saving_management.view_saving_transaction_audit',compact('saving_report','transaction_types'));
    }

    public function view_loan_transaction_audit(){
        $loan_transaction_audits = LoanDisburseRecord:: join('borrowers','borrowers.roll_number','=','loan_disburse_records.borrower_roll_number')->select([
            'disbursed_by',
            \DB::raw("DATE_FORMAT(loan_disburse_records.created_at,'%d-%m-%Y') as disburse_date"),
            \DB::raw( 'COUNT(disbursed_by) as worker_total_task'),
            \DB::raw('SUM(disburse_amount) as sum_of_didburse'),
            \DB::raw('SUM(borrowed_amount) as sum_of_borrowed'),
        ])->groupBy('disbursed_by')
          ->groupBy('disburse_date')
          ->orderBy('disburse_date','desc')
          ->get();

        return view('dashboards.auditors.loan_management.view_loan_transaction_audit',compact('loan_transaction_audits'));
    }

    public function view_saving_servises(){
        $saving_services = DB::table('saving_services')->get();
        return view('dashboards\auditors\saving_management\view_saving_services', compact('saving_services'));
    }

    public function view_loan_services(){
        $loan_services = LoanService::all();
        return view('dashboards\auditors\loan_management\view_loan_services',compact('loan_services'));
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
