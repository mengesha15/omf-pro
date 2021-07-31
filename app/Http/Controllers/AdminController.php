<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Branch;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $total_employees = DB::table('employees')->get()->count();
        $total_borrowers = DB::table('borrowers')->get()->count();
         $total_customers = DB::table('customers')->get()->count();
         $total_service = DB::table('saving_services')->get()->count() + DB::table('loan_services')->get()->count();;
        $employees = DB::table('employees')->select('id','first_name','middle_name','last_name','employee_salary','employee_photo')->get();
        
        return view('dashboards/admins/index', compact(['employees','total_employees',       'total_borrowers','total_customers','total_service']));

        
    }

    public function employee_registration_form(){
        $roles = Role::all();
        $branches = Branch::all();

        return view('dashboards/admins/employee_management/employee_registration',compact(['branches','roles']));
    }
    public function add_new_employee(Request $request){
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
            'employee_photo' => 'photo'

    ]);
        $new_employee->save();
        return redirect('admin/employee_registration')->with('success','Employee add successfully!');

        
    }

    public function profile(){
        return view('dashboards/admins/profile');
    }
    public function settings(){
        return view('dashboards/admins/settings');
    }
}
