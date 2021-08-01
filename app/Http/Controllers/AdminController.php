<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Validators;


class AdminController extends Controller
{
    public function index(){
        $total_employees = DB::table('employees')->get()->count();
        $total_borrowers = DB::table('borrowers')->get()->count();
         $total_customers = DB::table('customers')->get()->count();
         $total_service = DB::table('saving_services')->get()->count() + DB::table('loan_services')->get()->count();;
        $employees = DB::table('employees')->select('id','first_name','middle_name','last_name','employee_salary','employee_photo','employee_gender')->get();

        return view('dashboards/admins/index', compact(['employees','total_employees',       'total_borrowers','total_customers','total_service']));


    }

    public function employee_registration_form(){
        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/employee_registration',compact(['branches','roles']));
    }
    public function add_new_employee(Request $request){
        $validator = Validators::make($request->all(),[
            'first_name'=> 'required|regex:/^[a-zA-Z]+$/u|max:255',
            // 'first_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255|unique:users,name,' . $user->id,
            'middle_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'birth_date' => 'required|date',
            // 'phone' => 'required|min:11|numeric',
            'phone_number' => 'required|min:11|numeric',
            // 'amount' => 'required|digits_between:3,5',
            // 'product_price' => 'required|numeric|gt:0',
            'employee_salary' => 'required|numeric|min:2000|max:20000',
            'employee_address' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'employee_gender' => 'required|regex:/^[a-zA-Z]+$/u|max:255',
            'employee_photo' => 'image|mimes:jpg,jpeg,png',

        ]);


        $last_employee= DB::table('employees')->select('id')->orderBy('id')->first();
        $last_employee_id = $last_employee->id;
        $new_employee = new Employee([
            'first_name'=> $request->get('first_name'),
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
            if ($request->hasFile('employee_photo')) {
                $profile_photo = $request->file('employee_photo');
                $extension = $profile_photo->getClientOriginalExtension();
                // $photo_nmae = $request->file('employee_photo')->getClientOriginalName();
                $photo_nmae = time().".".$extension;
                $profile_photo ->move('uploads/employee_photo',$photo_nmae);
                $new_employee -> employee_photo = $photo_nmae;
            }
        else {
            return $request;
            $new_employee->employee_photo = '';
        }
        $new_user = new User();
        $new_user ->username = $request->first_name.random_int(1000, 9999). "/".date('Y');
        $new_user->employee_id = $last_employee_id + 1;
        $new_user ->role_id = $request->role_id;
        $new_user->password = Hash::make('password');
        $new_user->user_photo= $photo_nmae;

        $new_employee->save();
        $new_user->save();
        return redirect('admin/employee_registration')->with('success','Employee registered successfully!');


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

