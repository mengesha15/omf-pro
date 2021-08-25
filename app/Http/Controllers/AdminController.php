<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Borrower;
use App\Models\RequestedLoan;
use App\Models\ApprovedLoan;
use App\Models\LoanService;
use App\Models\SavingService;
use App\Models\EventPhoto;

use App\Helpers\Helper;

use Illuminate\Support\Str;
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
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $total_employees = DB::table('employees')->get()->count();
        $total_borrowers = DB::table('borrowers')->get()->count();
         $total_customers = DB::table('customers')->get()->count();
         $total_service = DB::table('saving_services')->get()->count() + DB::table('loan_services')->get()->count();

        return view('dashboards/admins/index', compact(['requested_loans','total_employees', 'total_borrowers','total_customers','total_service','total_request']));


    }

    public function employee_registration_form(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/employee_registration',compact(['branches','roles','requested_loans','total_request']));
    }
    public function add_new_employee(Request $request){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $request->validate([
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
            // 'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,' . $user->id,
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',

            'birth_date' => 'required|date|before:now',
            // 'phone' => 'required|min:11|numeric',
            'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
            // 'amount' => 'required|digits_between:3,5',
            // 'product_price' => 'required|numeric|gt:0',
            'employee_salary' => 'required|numeric|min:2000|max:20000',
            'employee_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'employee_photo' => 'required|image|mimes:jpg,jpeg,png',
            'branch_id'=> 'required|exists:branches,id',
            'role_id'=> 'required|exists:roles,id',
            ],
            [
                'branch_id.exists' => 'Branch not found',
                'role_id.exists' => 'Role not found',
            ]
    );
        DB::transaction(function () use($request){
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

            $new_user = new User([
                'username' => $request->first_name . random_int(10000, 99999) . "-" . date('y'),
                'employee_id' => $new_employee_id,
                'role_id' => $request->role_id,
                'password' => Hash::make('password'),
                'user_photo' => $photo_name,
            ]);


            $new_user->save();
        });

        return redirect()->route('admin.view_employee',compact('requested_loans','total_request'))->with('message', 'Employee registered successfully!');

    }

    public function edit_employee_form($id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $employee = Employee::where('id',$id)->firstOrFail();

        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/edit_employee',compact(['employee','roles','branches','requested_loans','total_request']));
    }
    public function update_employee(Request $request,$id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $request->validate([
        'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
        'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|min:2|max:15',
        'last_name' => 'required|regex:/^[a-zA-Z]+$/u|min:2|max:15',
        'birth_date' => 'required|date',
        'phone_number' => 'required|regex:/^[0-9]+$/u|min:10|max:13',
        'employee_salary' => 'required|numeric|min:2000|max:20000',
        'employee_address' => 'required|regex:/[a-zA-Z\s]+/|max:50',
        'employee_photo' => 'nullable|image|mimes:jpg,jpeg,png',
        'branch_id'=> 'required|exists:branches,id',
        'role_id'=> 'required|exists:roles,id',
        ],
        [
            'branch_id.exists' => 'Branch not found',
            'role_id.exists' => 'Role not found',
        ]
    );

       DB::transaction(function () use($request,$id){
            $employee = Employee::find($id);
            $employee_photo = $employee->employee_photo;

            if ($request->hasFile('employee_photo')) {
                $profile_photo = $request->file('employee_photo');
                $extension = $profile_photo->getClientOriginalExtension();
                $photo_name = time() . "." . $extension;
                $employee_updated = Employee::where('id',$id)->lockForUpdate()->update([
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
                // new photo moved to public folder
                $profile_photo->move('uploads/employee_photo', $photo_name);
                // remove previous image from folder
                unlink("uploads/employee_photo/".$employee_photo);
                if($employee_updated){
                    $updated_user =  User::where('employee_id',$id)->update([
                        "username" => Employee::find($id)->first_name . random_int(10000, 99999) . "/" . date('y'),
                        'role_id' => $request->get('role_id'),
                        'user_photo' => $photo_name,
                        "password" => Hash::make('password'),
                    ]);

                }
            }else {
                $employee_updated = Employee::where('id',$id)->lockForUpdate()->update([
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
                ]);
                if($employee_updated){
                    $updated_user =  User::where('employee_id',$id)->update([
                        "username" => Employee::find($id)->first_name . random_int(10000, 99999) . "/" . date('y'),
                        'role_id' => $request->get('role_id'),
                        "password" => Hash::make('password'),
                    ]);

                }
            }
        });
        return redirect()->route('admin.view_employee',compact('requested_loans','total_request'))->with('message', 'Employee data updated successfully!');
    }

    public function view_employee(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $employees = Employee::join('roles','roles.id','=','employees.role_id')
                            ->join('users','users.employee_id','=','employees.id')
                            ->join('branches','employees.branch_id','=','branches.id')
                            ->select('employees.id', 'first_name', 'middle_name', 'last_name', 'employee_gender', 'employee_address', 'birth_date', 'employee_salary', 'phone_number', 'employee_photo', 'branch_id', 'employees.created_at', 'employees.updated_at','role_name','username','employees.created_at')->orderBy('created_at','desc')->get();

        return view('dashboards.admins.employee_management.view_employee',compact('employees','requested_loans','total_request'));
    }

    public function view_customers(){
        $total_request = RequestedLoan::where('seen_unseen',"unseen")->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen',"unseen")->orderBy('requested_loans.created_at','desc')->paginate(5);

        $customers = DB::table('customers')->get();
        return view('dashboards\admins\borrower_and_customer\view_customers', compact('customers','total_request','requested_loans'));
    }

    public function view_borrowers(){
        $total_request = RequestedLoan::where('seen_unseen',"unseen")->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen',"unseen")->orderBy('requested_loans.created_at','desc')->paginate(5);

        $borrowers = Borrower::select('*')->orderBy('updated_at','desc')->get();
        return view('dashboards\admins\borrower_and_customer\view_borrower', compact('borrowers','total_request','requested_loans'));
    }
    public function users_list(){
        $total_request = RequestedLoan::where('seen_unseen',"unseen")->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen',"unseen")->orderBy('requested_loans.created_at','desc')->paginate(5);

        $users = User::join('employees','employees.id','=','users.employee_id')->join('roles','roles.id','=','users.role_id')->get();
        return view('dashboards.admins.user_management.view_user',compact('total_request','requested_loans','users'));

    }

    public function employee_detail($id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $employee = Employee::join('branches','branches.id','=','employees.branch_id')->join('roles','roles.id','=','employees.role_id')->join('users','users.employee_id','=','employees.id')->find($id);
        $birth_year = date('Y',strtotime($employee->birth_date));
        $current_year = date('Y',strtotime(now()));
        $age = $current_year - $birth_year;
        return view('dashboards.admins.employee_management.employee_detail',compact('employee','requested_loans','total_request','age'));
    }

    public function delete_employee($id){
        $employee = Employee::find($id);
        $employee->delete();
        return redirect('admin/view_employee')->with('message','Employee is deleted successfully.');

    }

    public function requested_loans_list(){
        DB::table('requested_loans')->update([
            'seen_unseen' => 'seen',
        ]);
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->orderBy('requested_loans.created_at','desc')->paginate(5);


        return view('dashboards.admins.loan_management.requested_loan.view_requested_loan',compact('requested_loans','total_request'));
    }

    public function approve_request($roll_number){

         $approved_by = Auth::user()->username;   //who does approve the requested loan

        DB::transaction(function () use($roll_number,$approved_by){
            $borrower_status_updated = Borrower::where('roll_number',$roll_number)->sharedLock()->update([
                'status' => 'Approved',
            ]);
            if($borrower_status_updated){
                $new_approve = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->select('borrowers.roll_number','requested_amount','requested_by','borrowers.loan_service_id')->where('requested_loans.borrower_roll_number',$roll_number)->firstOrFail();
            $approved_loans = new ApprovedLoan([
                'approved_amount' => $new_approve->requested_amount,
                'borrower_roll_number' => $new_approve->roll_number,
                'requested_by' => $new_approve->requested_by,
                'approved_by' => $approved_by,
                'status' => 'Approved',
            ]);
            }
            RequestedLoan::where('borrower_roll_number',$roll_number)->delete();
            $approved_loans->save();
        });

        return redirect()->route('admin.requested_list')->with('message','Request approval comleted successfully.');

    }

    public function reject_loan_request($roll_number){
        $rejected_by = Auth::user()->username;
        DB::transaction(function () use($roll_number,$rejected_by){
            $borrower_status_updated = Borrower::where('roll_number',$roll_number)->update([
                'status' => 'Rejected',
            ]);
            if($borrower_status_updated){
                $new_approve = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->select('borrowers.roll_number','requested_amount','requested_by','borrowers.loan_service_id')->where('requested_loans.borrower_roll_number',$roll_number)->firstOrFail();
            $approved_loans = new ApprovedLoan([
                'approved_amount' => $new_approve->requested_amount,
                'borrower_roll_number' => $new_approve->roll_number,
                'requested_by' => $new_approve->requested_by,
                'approved_by' => $rejected_by,
                'status' => 'Rejected',
            ]);
            }
            RequestedLoan::where('borrower_roll_number',$roll_number)->delete();
            $approved_loans->save();
        });
        return redirect()->route('admin.requested_list')->with('message', 'request rejected successfully!');

    }

    public function approved_loans_list(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $approved_loans = ApprovedLoan::join('borrowers','borrowers.roll_number','=','approved_loans.borrower_roll_number')->select('id','approved_amount','requested_by','approved_by','approved_loans.created_at','roll_number','first_name', 'middle_name', 'last_name', 'borrower_gender', 'borrower_address', 'birth_date', 'phone_number', 'borrower_status', 'borrowed_amount', 'user_username', 'branch_id', 'loan_service_id', 'borrower_photo')->orderBy('approved_loans.created_at','desc')->get();

        return view('dashboards.admins.loan_management.approved_loan.view_approved_loan',compact('approved_loans','requested_loans','total_request'));
    }

    public function add_new_saving_service(Request $request){
        $request->validate([
            'saving_service_name' => 'required|regex:/[a-zA-Z\s]+/|max:255|unique:saving_services,saving_service_name',
            'saving_service_description' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'saving_service_interest_rate' => 'required|regex:/^\d+(\.\d{1,2})?/|min:1|max:5',
            ],
        );
            $new_saving_service = new SavingService([
                'saving_service_name' => $request->get('saving_service_name'),
                'saving_service_description' => $request->get('saving_service_description'),
                'saving_service_interest_rate' => $request->get('saving_service_interest_rate'),
            ]
        );
            $new_saving_service->save();
            return redirect()->route('admin.view_saving_service')->with('message','saving service registered successfuly.');
    }
    public function branch_registration_form(){
        $total_request = RequestedLoan::get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->paginate(5);

        return view('dashboards.admins.branch_management.add_new_branch', compact('total_request','requested_loans'));
    }

    public function branch_registration(Request $request){
        $request->validate([
            'branch_name' => 'required|regex:/[a-zA-Z\s]+/|max:50|unique:branches,branch_name',
            'branch_location' => 'required|regex:/[a-zA-Z\s]+/|max:50',
      ]);
      $new_branch = new Branch([
          'branch_name' => $request->get('branch_name'),
          'branch_location' => $request->get('branch_location'),
      ]);
      $new_branch->save();
      return redirect()->route('admin.view_branch')->with('message','Branch registered successfuly.');
    }

    public function loan_service_registration_form(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        return view('dashboards.admins.service_management.manage_saving_service.add_new_saving_service', compact('total_request','requested_loans'));
    }

    public function add_new_loan_service(Request $request){

        $request->validate([
            'loan_service_name' => 'required|regex:/[a-zA-Z\s]+/|max:255|unique:loan_services,loan_service_name',
            'loan_service_description' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'loan_service_interest_rate' => 'required|regex:/^\d+(\.\d{1,2})?/|min:1|max:5',
            'loan_term' => 'required|regex:/^[0-9]+$/u|min:1|max:2',
        ],
    );
        $new_loan_service = new LoanService([
            'loan_service_name' => $request->get('loan_service_name'),
            'loan_service_description' => $request->get('loan_service_description'),
            'loan_service_interest_rate' => $request->get('loan_service_interest_rate'),
            'loan_term' => $request->get('loan_term'),
        ]
    );
         $new_loan_service->save();
        return redirect()->route('admin.view_loan_service')->with('message','Loan service registered successfuly.');
    }

    public function view_loan_service(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $loan_services = LoanService::all();

        return view('dashboards.admins.service_management.manage_loan_service.view_loan_service',compact('total_request','requested_loans','loan_services'));

    }
    public function view_saving_service(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $saving_services = SavingService::all();

        return view('dashboards.admins.service_management.manage_saving_service.view_saving_service',compact('total_request','requested_loans','saving_services'));
    }
    public function all_services_list(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $saving_services = SavingService::all();
        $loan_services = LoanService::all();

        return view('dashboards.admins.service_management.view_all_services',compact('total_request','requested_loans','saving_services','loan_services'));
    }
    public function view_branch(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $branches = Branch::all();
        return view('dashboards.admins.branch_management.view_branch',compact('branches','total_request','requested_loans'));
    }

    public function delete_loan_service($id){
        LoanService::where('id',$id)->delete();
        return redirect()->route('admin.view_loan_service')->with('message', 'loan service deleted successfully.');
    }
    public function delete_saving_service($id){
        SavingService::where('id',$id)->delete();
        return redirect()->route('admin.view_saving_service')->with('message', 'saving service deleted successfully.');
    }
    public function delete_branch($id){
        Branch::where('id',$id)->delete();
        return redirect()->route('admin.view_branch')->with('message', 'Branch deleted successfully.');
    }

    public function edit_branch_form($id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $branch = Branch::find($id);
        return view('dashboards.admins.branch_management.edit_branch', compact('branch','total_request','requested_loans'));
    }

    public function update_branch(Request $request,$id){
        $request->validate([
            'branch_name' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'branch_location' => 'required|regex:/[a-zA-Z\s]+/|max:50',
      ]);
      Branch::where('id',$id)->update([
          'branch_name' => $request->get('branch_name'),
          'branch_location' => $request->get('branch_location'),
      ]);
      return redirect()->route('admin.view_branch')->with('message','Branch updated successfully.');

    }

    public function edit_loan_service_form($id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);


        $loan_service = LoanService::find($id);
        return view('dashboards.admins.service_management.manage_loan_service.edit_loan_service', compact('loan_service','total_request','requested_loans'));
    }

    public function update_loan_service(Request $request,$id){
        $request->validate([
            'loan_service_name' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'loan_service_description' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'loan_service_interest_rate' => 'required|regex:/^\d+(\.\d{1,2})?/|min:1|max:5',
            'loan_term' => 'required|regex:/^[0-9]+$/u|min:1|max:2',
            ],
        );
            LoanService::where('id',$id)->update([
                'loan_service_name' => $request->get('loan_service_name'),
                'loan_service_description' => $request->get('loan_service_description'),
                'loan_service_interest_rate' => $request->get('loan_service_interest_rate'),
                'loan_term' => $request->get('loan_term'),
            ]
        );
            return redirect()->route('admin.view_loan_service')->with('message','Loan service is updated successfuly.');

    }

    public function edit_saving_service_form($id){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $saving_service = savingService::find($id);
        return view('dashboards.admins.service_management.manage_saving_service.edit_saving_service', compact('saving_service','total_request','requested_loans'));
    }

    public function update_saving_service(Request $request,$id){
        $request->validate([
            'saving_service_name' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'saving_service_description' => 'required|regex:/[a-zA-Z\s]+/|max:255',
            'saving_service_interest_rate' => 'required|regex:/^\d+(\.\d{1,2})?/|min:1|max:5',
            ],
        );
            SavingService::where('id',$id)->update([
                'saving_service_name' => $request->get('saving_service_name'),
                'saving_service_description' => $request->get('saving_service_description'),
                'saving_service_interest_rate' => $request->get('saving_service_interest_rate'),
            ]
        );
            return redirect()->route('admin.view_saving_service')->with('message','saving service is updated successfuly.');

    }

    public function upload_event_photo_form(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        $event_photos = EventPhoto::all();

        return view('dashboards.admins.event_photo.upload_event_photo', compact('event_photos','total_request','requested_loans'));
    }
    public function upload_event_photo(Request $request){
        $request->validate([
            'event_description' => 'required|regex:/[a-zA-Z\s]+/|max:50',
            'event_photo' => 'required|image|mimes:jpg,jpeg,png',
            ]
        );
        if ($request->hasFile('event_photo')) {
            $event_photo = $request->file('event_photo');
            $orginal_name = $event_photo->getClientOriginalName();
            $photo_name = time() .'-'.$orginal_name;
        }
        $event_description = $request->get('event_description');
        $new_event_photo = new EventPhoto([
            'event_description' => $event_description,
            'event_photo' => $photo_name,
        ]);
        DB::transaction(function () use($new_event_photo,$event_photo,$photo_name){
            $new_event_photo->save();
            $event_photo->move('uploads/event_photo', $photo_name);
        });

        return redirect()->route('admin.event_photo_uploading_form')->with('message','Event photo uploaded successfully.');
    }

    public function delete_event_photo($id){
        DB::transaction(function () use($id){
            $event_photo = EventPhoto::find($id);
            $deleted_photo = $event_photo->event_photo;
            EventPhoto::where('id',$id)->delete();
            unlink("uploads/event_photo/".$deleted_photo);
        });
        return redirect()->route('admin.event_photo_uploading')->with('message','Event photo deleted successfully.');

    }

    public function change_password_form(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        return view('dashboards/admins/change_password', compact('total_request','requested_loans'));
    }

    public function reset_password(Request $request){
        $request->validate([
            'new_password' => ['required', 'string', 'min:8',],
            'confirm_password' => ['required','string', 'min:8','same:new_password'],
        ],
        [
            'confirm_password.same' => 'The two password are not the same. Please recorrect and try again.',
        ]);
        $username = Auth::user()->username;
        $new_password = Hash::make($request->new_password);
        $password_changed = User::where('username',$username)->update([
            'password' => $new_password,
        ]);
        if ($password_changed) {
            return redirect()->route('admin.change_password_form')->with('message','Your  password has been changed successfully.');
        }else {
            return redirect()->route('admin.change_password_form')->with('error_message','Your  password has not been changed successfully.. Please try again.');
        }

    }

    public function change_user_password_form(){
        $total_request = RequestedLoan::where('seen_unseen','unseen')->get()->count();
        $requested_loans = Borrower::join('requested_loans','borrowers.roll_number','=','requested_loans.borrower_roll_number')->where('seen_unseen','unseen')->orderBy('requested_loans.created_at','desc')->paginate(5);

        return view('dashboards/admins/user_management/reset_user_password', compact('total_request','requested_loans'));
    }

    public function reset_user_password(Request $request){
        $request->validate([
            'username' => ['required', 'string','exists:users,username'],
        ],
        [
            'username.exists' => 'Username does not exist. Please try again.',
        ]);
        $username = $request->username;
        $new_user_pwd = Str::random(1).random_int(1,9).Str::random(1).random_int(1,9).Str::random(1).random_int(1,9).Str::random(1).random_int(1,9);
        $new_password = Hash::make($new_user_pwd);
        $password_changed = User::where('username',$username)->update([
            'password' => $new_password,
        ]);
        if ($password_changed) {
            return redirect()->route('admin.change_user_password_form', compact('new_user_pwd'))->with('message','User password has been reseted successfully.')->with('pwd',$new_user_pwd);
        }else {
            return redirect()->route('admin.change_user_password_form')->with('error_message','Your  password has not been changed successfully. Please try again.');
        }

    }

    public function reset_user_password_from_view($employee_id){
        $new_user_pwd = Str::random(1).random_int(1,9).Str::random(1).random_int(1,9).Str::random(1).random_int(1,9).Str::random(1).random_int(1,9);
        $new_password = Hash::make($new_user_pwd);
        $password_changed = User::where('employee_id',$employee_id)->lockForUpdate()->update([
            'password' => $new_password,
        ]);
        if ($password_changed) {
            return redirect()->route('admin.change_user_password_form', compact('new_user_pwd'))->with('message','User password has been changed successfully.')->with('pwd',$new_user_pwd);
        }else {
            return redirect()->route('admin.change_user_password_form')->with('error_message','Your  password has not been reseted successfully.. Please try again.');
        }

    }



    public function guest_page(){
        $sliders = EventPhoto::all();
        $loan_services = LoanService::all();
        $saving_services = SavingService::all();
        return view('welcome',compact('saving_services','loan_services','sliders'));
    }
}




