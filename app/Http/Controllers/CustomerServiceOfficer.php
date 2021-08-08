<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

use App\Models\User;
use App\Models\Borrower;
use App\Models\Branch;
use App\Models\LoanService;
use App\Models\ApprovedLoan;
use App\Models\RequestedLoan;
use App\Models\LoanDisburseRecord;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CustomerServiceOfficer extends Controller
{
    public function index(){
          $user = Auth::user(); // specific data for the autherized person
          $total_requested_loans = DB::table('requested_loans')->get()->count();
          $total_borrowers = DB::table('borrowers')->get()->count();
          $total_approved_loan = DB::table('approved_loans')->get()->count();
          $total_loan_service = DB::table('loan_services')->get()->count();

          $requsted_loans = RequestedLoan::join('borrowers','requested_loans.borrower_id','=','borrowers.id')->select('requested_loans.id','first_name', 'middle_name', 'borrower_gender', 'phone_number', 'borrowed_amount', 'borrower_photo', 'requested_loans.created_at','borrowers.status')->get();
          return view('dashboards/customerServiceOfficers/index', compact(['requsted_loans','total_borrowers','total_loan_service', 'total_approved_loan','total_requested_loans']));
    }

    public function add_new_request_form(){
        $users = User::all();
        $branches = Branch::all();
        $loan_services = LoanService::all();

        return view('dashboards/customerServiceOfficers/manage_loan/add_new_request',compact(['branches','users','loan_services']));
    }

    public function add_new_request(Request $request){

        $user_id = Auth::user()->id;
        $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'borrower_status' => 'required|regex:/[a-zA-Z\s]+/|min:5|max:50',
            'birth_date' => 'required|date',
            'phone_number' => 'required|regex:/(09)[0-9]{8}/',
            'borrowed_amount' => 'required|numeric|min:10000|max:200000',
            'borrower_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'borrower_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required',
            'loan_service_id'=> 'required',
        ]);

        $profile_photo = $request->file('borrower_photo');
        $extension = $profile_photo->getClientOriginalExtension();
        $photo_name = time() . "." . $extension;
        $profile_photo->move('uploads/borrower_photo', $photo_name);

        $new_borrower = new Borrower([
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
            'user_id' => $user_id,
            'borrower_photo' => $photo_name,
            'status' => "Pending",
        ]);

        $new_borrower->save();

        $new_request = new RequestedLoan([
            'requested_amount' => $request->get('borrowed_amount'),
            'borrower_id' => $new_borrower->id,
            'requested_by' => $user_id,
            'loan_service_id' => $request->get('loan_service_id') ,
            'status' => "Pending",
        ]);
        $new_request->save();

        return redirect('customerServiceOfficer/borrowers_list')->with('message', 'Request sent successfully!');
    }


    public function view_borrowers(){
        $borrowers = DB::table('borrowers')->select('id','first_name', 'middle_name', 'borrower_gender', 'phone_number', 'borrowed_amount', 'borrower_photo', 'created_at','status')->get();
        return view('dashboards.customerServiceOfficers.manage_loan.view_borrower',compact('borrowers'));
    }

    public function loan_payment_form($id){
        $borrower = Borrower::join('loan_services','borrowers.loan_service_id','=','loan_services.id')->select('borrowers.id','borrowers.first_name','borrowers.middle_name','borrowers.last_name','borrowers.borrower_gender','borrowers.borrower_address','borrowers.birth_date','borrowers.phone_number','borrowers.borrower_status','borrowers.borrowed_amount','borrowers.borrower_photo','borrowers.birth_date','borrowers.created_at','borrowers.status','loan_services.loan_service_name','loan_services.loan_service_interest_rate')->find($id);
        return view('dashboards.customerserviceofficers.manage_loan.loan_payment_form',compact('borrower'));
    }

    public function apply_loan_payment($id){
        // loan_paid returns 1 if true 0 if false
        $user_id = Auth::user()->id;
        $loan_paid = Borrower::where('id',$id)->update([
        'status' => "Paid",
        'user_id' => $user_id,
        ]);
        if ($loan_paid) {
            dd('Successfully paid');
        }
        return view('dashboards.customerserviceofficers.manage_loan.loan_payment_form',compact('borrower'));
    }
    public function profile(){
        return view('dashboards/customerServiceOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerServiceOfficers/settings');
    }
}
