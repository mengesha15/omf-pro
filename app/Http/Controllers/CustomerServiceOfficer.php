<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;

use App\Models\User;
use App\Models\Borrower;
use App\Models\Branch;
use App\Models\LoanService;
use App\Models\ApprovedLoan;
use App\Models\RequestedLoan;
use App\Models\LoanDisburseRecord;

use Gate;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomerServiceOfficer extends Controller
{
    public function index(){
          $user = Auth::user(); // specific data for the autherized person
          $total_requested_loans = DB::table('requested_loans')->get()->count();
          $total_borrowers = DB::table('borrowers')->get()->count();
          $total_approved_loan = DB::table('approved_loans')->get()->count();
          $total_loan_service = DB::table('loan_services')->get()->count();

          return view('dashboards/customerServiceOfficers/index', compact(['total_borrowers','total_loan_service', 'total_approved_loan','total_requested_loans']));
    }

    public function add_new_request_form(){
        $users = User::all();
        $branches = Branch::all();
        $loan_services = LoanService::all();

        return view('dashboards/customerServiceOfficers/manage_loan/add_new_request',compact(['branches','users','loan_services']));
    }

    public function add_new_request(Request $request){
        $user_username = Auth::user()->username;
        $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'borrower_status' => 'required|regex:/[a-zA-Z\s]+/|min:5|max:50',
            'birth_date' => 'required|date',
            'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
            'borrowed_amount' => 'required|numeric|min:10000|max:200000',
            'borrower_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'borrower_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required|exists:branches,id',
            'loan_service_id' => 'required|exists:loan_services,id',
            ],
            [
                'branch_id.exists' => 'Branch not found',
                'loan_service_id.exists' => 'Loan service not found',
            ]);

        $profile_photo = $request->file('borrower_photo');
        $extension = $profile_photo->getClientOriginalExtension();
        $photo_name = time() . "." . $extension;
        $profile_photo->move('uploads/borrower_photo', $photo_name);

        $new_borrower = new Borrower([
            /** Generate id */
            'roll_number' => Helper::roll_number_generator(new Borrower, 'roll_number', 8, 10),
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'birth_date' => $request->get('birth_date'),
            'phone_number' => $request->get('phone_number'),
            'borrowed_amount' => $request->get('borrowed_amount'),
            'borrower_address' => $request->get('borrower_address'),
            'borrower_gender' => $request->get('borrower_gender'),
            'borrower_status' => $request->get('borrower_status'),
            'branch_id' => $request->get('branch_id'),
            'loan_service_id' =>$request->get('loan_service_id') ,
            'user_username' => $user_username,
            'borrower_photo' => $photo_name,
            'status' => "Pending",
        ]);
        $new_request = new RequestedLoan([
            'requested_amount' => $request->get('borrowed_amount'),
            'borrower_roll_number' => $new_borrower->roll_number,
            'requested_by' => $user_username,
            'status' => "Pending",
            'seen_unseen' => "unseen",
        ]);
        // dd($new_request->requested_by);
        $new_borrower->save();
        $new_request->save();

        return redirect('customerServiceOfficer/borrowers_list')->with('message', 'Request sent successfully!');
    }

    public function view_borrowers(){
        $borrowers = Borrower::select('*')->orderBy('updated_at','desc')->get();
        return view('dashboards.customerServiceOfficers.manage_loan.view_borrower',compact('borrowers'));
    }

    public function edit_employee_form($roll_number){
        $borrower = Borrower::findOrFail($roll_number);
        $branches = Branch::all();
        $loan_services = LoanService::all();
        return view('dashboards.customerServiceOfficers.manage_loan.edit_borrower', compact('borrower','branches','loan_services'));
    }

    public function update_borrower(Request $request, $roll_number){
        $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'borrower_status' => 'required|regex:/[a-zA-Z\s]+/|min:5|max:50',
            'birth_date' => 'required|date',
            'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
            'borrowed_amount' => 'required|numeric|min:10000|max:200000',
            'borrower_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'borrower_photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required|exists:branches,id',
            'loan_service_id' => 'required|exists:loan_services,id',
        ]);
        DB::transaction(function () use($request,$roll_number){
            $user_username = Auth::user()->username;
            $borrower = Borrower::findOrFail($roll_number);
            $borrower_photo = $borrower->borrower_photo;

            if ($request->hasFile('borrower_photo')) {
                $profile_photo = $request->file('borrower_photo');
                $extension = $profile_photo->getClientOriginalExtension();
                $photo_name = time() . "." . $extension;
                Borrower::where('roll_number',$roll_number)->lockForUpdate()->update([
                    'first_name' => $request->get('first_name'),
                    'middle_name' => $request->get('middle_name'),
                    'last_name' => $request->get('last_name'),
                    'birth_date' => $request->get('birth_date'),
                    'phone_number' => $request->get('phone_number'),
                    'borrowed_amount' => $request->get('borrowed_amount'),
                    'borrower_address' => $request->get('borrower_address'),
                    'borrower_gender' => $request->get('borrower_gender'),
                    'borrower_status' => $request->get('borrower_status'),
                    'branch_id' => $request->get('branch_id'),
                    'loan_service_id' =>$request->get('loan_service_id') ,
                    'user_username' => $user_username,
                    'borrower_photo' => $photo_name,
                    'status' => "Pending",
                ]);
                $profile_photo->move('uploads/borrower_photo', $photo_name);
                unlink("uploads/borrower_photo/".$borrower_photo);
            }else {
                Borrower::where('roll_number',$roll_number)->lockForUpdate()->update([
                    'first_name' => $request->get('first_name'),
                    'middle_name' => $request->get('middle_name'),
                    'last_name' => $request->get('last_name'),
                    'birth_date' => $request->get('birth_date'),
                    'phone_number' => $request->get('phone_number'),
                    'borrowed_amount' => $request->get('borrowed_amount'),
                    'borrower_address' => $request->get('borrower_address'),
                    'borrower_gender' => $request->get('borrower_gender'),
                    'borrower_status' => $request->get('borrower_status'),
                    'branch_id' => $request->get('branch_id'),
                    'loan_service_id' =>$request->get('loan_service_id') ,
                    'user_username' => $user_username,
                    'status' => "Pending",
                ]);
            }
        });
        return redirect()->route('customerServiceOfficer.borrowers_list')->with('message','Borrower data updated successfully.');
    }

    public function view_requested_loans(){
        $requested_loans = Borrower::join('requested_loans','requested_loans.borrower_roll_number','=','borrowers.roll_number')->get();
        return view('dashboards.customerServiceOfficers.manage_loan.requested_loan.view_requested_loan',compact('requested_loans'));
    }

    public function view_approved_loans(){
        $borrowers = Borrower::join('approved_loans','approved_loans.borrower_roll_number','=','borrowers.roll_number')->get();
        return view('dashboards.customerServiceOfficers.manage_loan.approved_loan.view_approved_loan',compact('borrowers'));
    }

    public function search_borrower(Request $request){
        $request->validate([
            'roll_number' => 'required|regex:/[0-9]/|max:10',
        ],
        [
            'roll_number.required' => 'Roll number not matched. Please try again.',
            'roll_number.regex' => 'Roll number must be number only. Please try again.',
            'roll_number.max' => 'Roll number must be 10 character. Please try again.',
        ]
     );
        $roll_number = $request->roll_number;
        $borrower = Borrower::join('loan_services','borrowers.loan_service_id','=','loan_services.id')->select('borrowers.roll_number','borrowers.first_name','borrowers.middle_name','borrowers.last_name','borrowers.borrower_gender','borrowers.borrower_address','borrowers.birth_date','borrowers.phone_number','borrowers.borrower_status','borrowers.borrowed_amount','borrowers.borrower_photo','borrowers.birth_date','borrowers.created_at','borrowers.status','loan_services.loan_service_name','loan_services.loan_service_interest_rate')->find($roll_number);
        if (!$borrower) {
            // $borrower =new Borrower();
            return redirect('customerServiceOfficer/search_borrower')->with('message_not_much','Borrower id not exist.');
        }
        return view('dashboards.customerserviceofficers.manage_loan.loan_payment_form',compact('borrower'));
    }

    public function loan_payment_form($roll_number){
        Borrower::where('roll_number',$roll_number)->firstOrFail();
        $borrower = Borrower::join('loan_services','borrowers.loan_service_id','=','loan_services.id')->select('borrowers.roll_number','borrowers.first_name','borrowers.middle_name','borrowers.last_name','borrowers.borrower_gender','borrowers.borrower_address','borrowers.birth_date','borrowers.phone_number','borrowers.borrower_status','borrowers.borrowed_amount','borrowers.borrower_photo','borrowers.birth_date','borrowers.created_at','borrowers.status','loan_services.loan_service_name','loan_services.loan_service_interest_rate')->find($roll_number);
        return view('dashboards.customerserviceofficers.manage_loan.loan_payment_form',compact('borrower'));
    }

    public function apply_loan_payment($roll_number){
        // loan_paid returns 1 if true 0 if false
        $username = Auth::user()->username;
        DB::transaction(function () use($username, $roll_number){
            Borrower::where('roll_number',$roll_number)->lockForUpdate()->update([
            'status' => "Paid",
            'user_username' => $username,
            ]);
        });
        return redirect('customerServiceOfficer/borrowers_list')->with('message','Payment completed successfully.');
    }

    public function view_loan_disbursemet(){
        $disbursement_records = LoanDisburseRecord::join('borrowers','loan_disburse_records.borrower_roll_number','=','borrowers.roll_number')->join('branches','branches.id','=','borrowers.branch_id')->select('remaining_amount','disburse_amount','disbursed_by','first_name','middle_name','roll_number','loan_disburse_records.created_at','branch_name')->orderBy('created_at', "desc")->get();

        return view('dashboards.customerServiceOfficers.loan_disbursement.view_disbursed_loan',compact('disbursement_records'));
    }

    public function view_loan_disbursemet_detail($roll_number){
        $borrower = Borrower::find($roll_number);
        $disbursement_records = LoanDisburseRecord::join('borrowers','loan_disburse_records.borrower_roll_number','=','borrowers.roll_number')->join('branches','branches.id','=','borrowers.branch_id')->select('remaining_amount','disburse_amount','disbursed_by','first_name','middle_name','roll_number','loan_disburse_records.created_at','branch_name')->orderBy('loan_disburse_records.created_at','DESC')->where('roll_number',$roll_number)->get();
        return view('dashboards.customerServiceOfficers.loan_disbursement.view_disbursed_loan_detail',compact('disbursement_records','borrower'));
    }


    public function new_loan_disbursement(Request $request){

        Validator::make($request->all(),[
            'roll_number' => 'required|regex:/[0-9]/|max:10|exists:borrowers,roll_number',
            'disburse_amount' => 'required|numeric|min:0|max:500000',
        ],
        [
            'roll_number.required' => 'Roll number not matched. Please try again.',
            'roll_number.regex' => 'Roll number must be number only. Please try again.',
            'roll_number.exists' => 'Wrong roll number. Please try again.',

        ])->validateWithBag('loan_disburse_errors');
        $roll_number = $request->get('roll_number');
        $borrower = Borrower::find($roll_number);
        if ($borrower->status == 'Paid') {
            $disbursed_by = Auth::user()->username;
            $user = User::join('employees','employees.id','=','users.employee_id')->find($disbursed_by);
            $disburse_amount = $request->get('disburse_amount');
            $current_balance = $borrower->borrowed_amount;
            if ($current_balance >= $disburse_amount) {
                $remaining_amount = $current_balance - $disburse_amount;
                DB::transaction(function () use($request,$borrower,$roll_number,$remaining_amount,$disburse_amount,$user,$disbursed_by){
                    Borrower::where('roll_number',$roll_number)->update([
                    'borrowed_amount' => $remaining_amount,
                    ]);
                    $new_disbursement = new LoanDisburseRecord([
                        'remaining_amount' => $remaining_amount,
                        'disburse_amount' => $disburse_amount,
                        'branch_id' => $user->branch_id,
                        'borrower_roll_number' => $roll_number,
                        'disbursed_by' =>$disbursed_by,
                        ]);
                        $new_disbursement->save();
                 });
                    return redirect()->route('customerServiceOfficer.loan_disbursemet_lists')->with('message','Loan disbursement completed successfully!');
                }
                elseif ($current_balance < $disburse_amount) {
                    return redirect()->route('customerServiceOfficer.loan_disbursemet_lists')->with('error_message','Insufficient balance. Enter sufficient disburse amount and try again.');
                }
            }else {
                return redirect()->route('customerServiceOfficer.loan_disbursemet_lists')->with('error_message','The loan is not paid yet. Wail till the loan to be paid.');
            }

    }


    public function view_loan_services(){
        $loan_services = LoanService::all();
        return view('dashboards.customerServiceOfficers.loan_services.view_loan_service',compact('loan_services'));
    }

    public function change_password_form(){
        return view('dashboards/customerServiceOfficers/change_password');
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
                return redirect()->route('customerServiceOfficer.change_password_form')->with('message','Your  password has been changed successfully.');
            }else {
                return redirect()->route('customerServiceOfficer.change_password_form')->with('error_message','Your  password has not been changed successfully.. Please try again.');
            }

        }
}
