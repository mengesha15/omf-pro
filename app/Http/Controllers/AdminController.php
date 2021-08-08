<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\RequestedLoan;
use App\Models\ApprovedLoan;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        $user = Auth::user();
        $total_employees = DB::table('employees')->get()->count();
        $total_borrowers = DB::table('borrowers')->get()->count();
         $total_customers = DB::table('customers')->get()->count();
         $total_service = DB::table('saving_services')->get()->count() + DB::table('loan_services')->get()->count();
        $employees = DB::table('employees')->select('id','first_name','middle_name','last_name','employee_salary','employee_photo','employee_gender')->get();
        
        return view('dashboards/admins/index', compact(['employees','total_employees', 'total_borrowers','total_customers','total_service']));


    }

    public function employee_registration_form(){
        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/employee_registration',compact(['branches','roles']));
    }
    public function add_new_employee(Request $request){
        $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            // 'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,' . $user->id,
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',

            'birth_date' => 'required|date',
            // 'phone' => 'required|min:11|numeric',
            'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
            // 'amount' => 'required|digits_between:3,5',
            // 'product_price' => 'required|numeric|gt:0',
            'employee_salary' => 'required|numeric|min:2000|max:20000',
            'employee_address' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'employee_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required',
            'role_id'=> 'required',


        ]);

        $profile_photo = $request->file('employee_photo');
        $extension = $profile_photo->getClientOriginalExtension();
        // $photo_nmae = $request->file('employee_photo')->getClientOriginalName();
        $photo_name = time() . "." . $extension;
        $profile_photo->move('uploads/employee_photo', $photo_name);

        $new_employee = new Employee([
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'birth_date' => $request->get('birth_date'),
            'phone_number' => $request->get('phone_number'),
            'employee_salary' => $request->get('employee_salary'),
            'employee_address' => $request->get('employee_address'),
            'employee_gender' => $request->get('employee_gender'),
            'branch_id' => $request->get('branch_id'),
            'role_id' => $request->get('role_id'),
            'employee_photo' => $photo_name,
        ]);
        $new_employee->save();

        $new_employee_id = $new_employee->id;

        $new_user = new User();
        $new_user->username = $request->first_name . random_int(1000, 9999) . "/" . date('Y');
        $new_user->employee_id = $new_employee_id;
        $new_user->role_id = $request->role_id;
        $new_user->password = Hash::make('password');
        $new_user->user_photo = $photo_name;

        $new_user->save();

        return redirect('admin/view_employee')->with('message', 'Employee registered successfully!');

    }

    public function edit_employee_form($id){
        $employee = Employee::find($id);
        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/edit_employee',compact(['employee','roles','branches']));
    }
    public function update_employee(Request $request,$id){
        $request->validate([
        'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
        'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
        'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
        'birth_date' => 'required|date',
        'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
        'employee_salary' => 'required|numeric|min:2000|max:20000',
        'employee_address' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
        'employee_photo' => 'required|image|mimes:jpg,jpeg,png',
        'branch_id'=> 'required',
        'role_id'=> 'required',
        ]);

        if ($request->hasFile('employee_photo')) {
        $profile_photo = $request->file('employee_photo');
        $extension = $profile_photo->getClientOriginalExtension();
        $photo_name = time() . "." . $extension;
        $profile_photo->move('uploads/employee_photo', $photo_name);
        } else {
        return redirect()->route('admin.employee_registration');
        }

        $employee_updated = Employee::where('id',$id)->update([
        'first_name' => $request->get('first_name'),
        'middle_name' => $request->get('middle_name'),
        'last_name' => $request->get('last_name'),
        'birth_date' => $request->get('birth_date'),
        'phone_number' => $request->get('phone_number'),
        'employee_salary' => $request->get('employee_salary'),
        'employee_address' => $request->get('employee_address'),
        'employee_gender' => $request->get('employee_gender'),
        'branch_id' => $request->get('branch_id'),
        'role_id' => $request->get('role_id'),
        'employee_photo' => $photo_name,
        ]);

        if($employee_updated){
            $updated_user =  User::where('employee_id',$id)->update([
                "username" => Employee::find($id)->first_name . random_int(1000, 9999) . "/" . date('Y'),
                'role_id' => $request->get('role_id'),
                'user_photo' => $photo_name,
                "password" => Hash::make('password'),
            ]);

        }
        return redirect('admin/view_employee')->with('message', 'Employee data updated successfully!');
    }

    public function view_employee(){
    $employees = Employee::join('roles','roles.id','=','employees.role_id')
                        ->join('users','users.employee_id','=','employees.id')
                        ->join('branches','employees.branch_id','=','branches.id')
                        ->select('employees.id', 'first_name', 'middle_name', 'last_name', 'employee_gender', 'employee_address', 'birth_date', 'employee_salary', 'phone_number', 'employee_photo', 'branch_id', 'employees.created_at', 'employees.updated_at','role_name','username')->get();
    
    return view('dashboards.admins.employee_management.view_employee',compact('employees'));
    }

    public function employee_detail($id){
        $employee = Employee::find($id);
        return view('dashboards.admins.employee_management.employee_detail',compact('employee'));
    }

    public function requested_list(){
        $requested_loans = RequestedLoan::join('borrowers','borrowers.id','=','requested_loans.borrower_id')->get();

        return view('dashboards.admins.loan_management.requested_loan.view_requested_loan',compact('requested_loans'));
    }

    public function approve_request($id){

        $approver_id = Auth::user()->id;   //who does appreve the requested loan

        $new_approve = Borrower::join('requested_loans','borrowers.id','=','requested_loans.borrower_id')
                                 ->find($id);

        $borrower_status_updated = Borrower::where('id',$id)->update([
        'status' => 'Approved',
        ]);

        if($borrower_status_updated){
            $approved_loans = new ApprovedLoan([
            'approved_amount' => $new_approve->requested_amount,
            'borrower_id' => $new_approve->borrower_id,
            'requested_by' => $new_approve->requested_by,
            'approved_by' => $approver_id,
            'loan_service_id' => $new_approve->loan_service_id,
            'status' => 'Approved',
        ]);
        }

         $approved_loans->save();
         RequestedLoan::where('borrower_id',$id)->delete();
         return redirect('admin/requested_list')->with('message', 'Request approved successfully!');

    }



    public function delete_employee($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('admin/dashboard');

    }

    public function profile(){
        return view('dashboards/admins/profile');
    }
    public function settings(){
        return view('dashboards/admins/settings');
    }
}
