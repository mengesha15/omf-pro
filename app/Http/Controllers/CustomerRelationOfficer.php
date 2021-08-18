<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\customer;
use App\Models\SavingService;
use App\Models\SavingTransaction;
use App\Models\User;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerRelationOfficer extends Controller
{
    public function index(){
        $user = Auth::user(); // specific data for the autherized person
        $total_customers = DB::table('customers')->get()->count();
        $saving_services = DB::table('saving_services')->get()->count();
        $total_transactions = DB::table('saving_transactions')->get()->count();
        return view('dashboards/customerRelationOfficers/index', compact('total_customers','saving_services','total_transactions'));
    }

    public function add_new_customer_form(){
        $branches = Branch::all();
        $saving_services = SavingService::all();

        return view('dashboards.customerRelationOfficers.customer_management.add_new_customer',compact(['branches','saving_services']));
    }

    public function add_new_customer(Request $request){
        DB::transaction(function () use($request) {
            $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'customer_status' => 'required|regex:/[a-zA-Z\s]+/|min:5|max:50',
            'birth_date' => 'required|date',
            'phone_number' => 'required|regex:/(09)[0-9]{8}/',
            'account_balance' => 'required|numeric|min:25',
            'customer_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'customer_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required|exists:branches,id',
            'saving_service_id' => 'required|exists:saving_services,id',
            ],
            [
                'branch_id.exists' => 'Branch not found',
                'saving_service_id.exists' => 'Saving service not found',
            ]);

            $profile_photo = $request->file('customer_photo');
            $extension = $profile_photo->getClientOriginalExtension();
            $photo_name = time() . "." . $extension;

            $new_customer = new Customer([
                /** Generate account_number */
                'account_number' => Helper::account_number_generator(),
                'first_name' => $request->get('first_name'),
                'middle_name' => $request->get('middle_name'),
                'last_name' => $request->get('last_name'),
                'birth_date' => $request->get('birth_date'),
                'phone_number' => $request->get('phone_number'),
                'account_balance' => $request->get('account_balance'),
                'customer_address' => $request->get('customer_address'),
                'customer_gender' => $request->get('customer_gender'),
                'customer_status' => $request->get('customer_status'),
                'branch_id' => $request->get('branch_id'),
                'saving_service_id' =>$request->get('saving_service_id') ,
                'customer_photo' => $photo_name,
            ]);

            $new_customer->save();

            $profile_photo->move('uploads/customer_photo', $photo_name);
            });
            return redirect()->route('customerRelationOfficer.customers_list');
    }

    public function view_customers(){
        $customers = DB::table('customers')->get();
        return view('dashboards.customerRelationOfficers.customer_management.view_customers', compact('customers'))->with('message','Customer registered successfuly.');
    }

    public function view_customer_detail($account_number){
        Customer::where('account_number',$account_number)->firstOrFail();
        $customer = Customer::join('branches','branches.id','=','customers.branch_id')->join('saving_services','saving_services.id','=','customers.saving_service_id')->find($account_number);
        $saving_transactions = SavingTransaction::join('customers','saving_transactions.customer_account_number','=','customers.account_number')->join('branches','branches.id','=','saving_transactions.branch_id')->where('customer_account_number',$account_number)->select('transaction_type','saving_transactions.created_at','transaction_amount','branch_name')->orderBy('saving_transactions.created_at','desc')->get();
        return view('dashboards.customerRelationOfficers.customer_management.view_customer_detail', compact('customer','saving_transactions'));
    }

    public function search_customer(Request $request){
        $request->validate([
            'account_number' => 'required|regex:/[0-9]/|min:10|max:10',
            'account_number' => 'exists:customers,account_number',
        ],
        [
            'account_number.required' => 'Roll number is required. Please try again.',
            'account_number.regex' => 'Roll number must be number only. Please try again.',
            'account_number.max' => 'Roll number must be 10 character. Please try again.',
            'account_number.min' => 'Roll number must be 10 character. Please try again.',
            'account_number.exists' => 'Accunt number does not exist. Please try again.',

        ]
     );
        $account_number = $request->account_number;
        $customer = Customer::join('branches','branches.id','=','customers.branch_id')->join('saving_services','saving_services.id','=','customers.saving_service_id')->find($account_number);
        $saving_transactions = Customer::join('saving_transactions','saving_transactions.customer_account_number','=','customers.account_number')->where('account_number',$account_number);
        return view('dashboards.customerRelationOfficers.customer_management.view_customer_detail',compact('customer','saving_transactions'));
    }

    public function view_saving_transaction(){
        $saving_transactions = DB::table('saving_transactions')->join('branches','branches.id','=','saving_transactions.branch_id')->join('customers','customers.account_number','=','saving_transactions.customer_account_number')->orderBy('saving_transactions.created_at','desc')->get();
        return view('dashboards.customerRelationOfficers.transaction_management.view_saving_transactions', compact('saving_transactions'));
    }

    public function view_saving_servises(){
            $saving_services = DB::table('saving_services')->get();
        return view('dashboards.customerRelationOfficers.saving_services.view_saving_services', compact('saving_services'));
    }


    public function deposit_money(Request $request){
        $request->validate([
            'account_number' => 'required|regex:/[0-9]/|min:10|max:10|exists:customers,account_number',
            'deposit_amount' => 'required|numeric|min:50|max:1000000',
        ],
        [
            'account_number.exists' => 'Accunt number does not exist. Please try again.',

        ]
        );
        $deposit_amount = $request->deposit_amount;

        $account_number = $request->account_number;

        if ($deposit_amount <= 1000000 && $deposit_amount >= 50) {

            DB::transaction(function () use($deposit_amount,$account_number,$request){
                $customer = Customer::sharedLock()->find($account_number);
                $current_balance = $customer->account_balance;
                $new_balance = $current_balance+$deposit_amount;
                $deposited_money = Customer::where('account_number',$account_number)->sharedLock()->update([
                    'account_balance' => $new_balance,
                ]);

                $username = Auth::user()->username;
                $user = User::join('employees','employees.id','=','users.employee_id')->find($username);
                $new_saving_transaction = new SavingTransaction([
                    'transaction_type' => 'Deposit',
                    'transaction_amount' => $deposit_amount,
                    'customer_account_number' => $account_number,
                    'branch_id' => $user->branch_id,
                    'user_username' => $username,
                ]);
                $new_saving_transaction->save();
            });
            return redirect()->route('customerRelationOfficer.saving_transactions_list')->with('message','Deposit completed successfully!');
        }else {
            return redirect()->route('customerRelationOfficer.customers_list')->with('error','Insufficient balance');
        }
    }

    public function withdraw_money(Request $request){
        $request->validate([
            'account_number' => 'required|regex:/[0-9]/|min:10|max:10|exists:customers,account_number',
            'withdraw_amount' => 'required|numeric|min:50|max:10000',
        ],
        [
            'account_number.exists' => 'Accunt number does not exist. Please try again.',

        ]
        );

        $withdraw_amount = $request->withdraw_amount;
        $account_number = $request->account_number;

        $customer = Customer::sharedLock()->find($account_number);
        $current_balance = $customer->account_balance;

        if ($current_balance >= $withdraw_amount) {

            DB::transaction(function () use($current_balance,$withdraw_amount,$account_number,$request){

                $remaining_balance = $current_balance - $withdraw_amount;

                $deposited_money = Customer::where('account_number',$account_number)->sharedLock()->update([
                    'account_balance' => $remaining_balance,
                ]);

                $username = Auth::user()->username;
                $user = User::join('employees','employees.id','=','users.employee_id')->find($username);
                $new_saving_transaction = new SavingTransaction([
                    'transaction_type' => 'Withdrawal',
                    'transaction_amount' => $withdraw_amount,
                    'customer_account_number' => $account_number,
                    'branch_id' => $user->branch_id,
                    'user_username' => $username,
                ]);
                $new_saving_transaction->save();
            });
            return redirect()->route('customerRelationOfficer.saving_transactions_list')->with('message','Withdrawal completed successfully!');
            }else {
            return redirect()->route('customerRelationOfficer.customers_list')->with('error','Insufficient balance');
            }

    }

    public function profile(){
        return view('dashboards/customerRelationOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerRelationOfficers/settings');
    }
}
