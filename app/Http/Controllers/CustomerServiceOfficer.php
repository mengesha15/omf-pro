<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

          $approved_loans = DB::table('approved_loans')->select('id', 'approved_amount', 'borrower_id','requested_by', 'approved_by', 'loan_service_id' , 'updated_at', 'status')->get();
          return view('dashboards/customerServiceOfficers/index', compact(['approved_loans','total_borrowers','total_loan_service', 'total_approved_loan','total_requested_loans']));
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
            // 'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,' . $user->id,
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            'borrower_status' => 'required|regex:/^[a-zA-Z]+$/u|min:5|max:15',
            'birth_date' => 'required|date',
            // 'phone' => 'required|min:11|numeric',
            'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
            // 'amount' => 'required|digits_between:3,5',
            // 'product_price' => 'required|numeric|gt:0',
            'borrowed_amount' => 'required|numeric|min:2000|max:20000',
            'borrower_address' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'borrower_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required',
            'loan_service_id'=> 'required',


        ]);
            $last_borrower = DB::table('borrowers')->select('id')->orderBy('id')->first();
            $last_borrower_id = $last_borrower->id;
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
                'role_id' => $request->get('role_id'),
                'user_id' => $user_id,
            ]);
            if ($request->hasFile('borrower_photo')) {
                $profile_photo = $request->file('borrower_photo');
                $extension = $profile_photo->getClientOriginalExtension();
                // $photo_nmae = $request->file('employee_photo')->getClientOriginalName();
                $photo_nmae = time() . "." . $extension;
                $profile_photo->move('uploads/borrower_photo', $photo_nmae);
                $new_borrower->borrower_photo = $photo_nmae;
            } else {
                return redirect()->route('customerServiceOfficer.add_new_request');
            }

            $new_borrower->save();
            
            return redirect('admin/employee_registration')->with('message', 'Employee registered successfully!');
            dd('New borrower registerd successfully');
    }
    public function profile(){
        return view('dashboards/customerServiceOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerServiceOfficers/settings');
    }
}
