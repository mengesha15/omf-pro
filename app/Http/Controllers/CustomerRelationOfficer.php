<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\customer;
use App\Models\SavingService;
use App\Models\SavingTransaction;
use App\Models\User;

use App\Helpers\Helper;
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

    public function view_customers(){
        $customers = DB::table('customers')->get();
        return view('dashboards.customerRelationOfficers.customer_management.view_customers', compact('customers'));
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
                'account_number' => Helper::account_number_generator(new Customer, 'account_number', 2, 100),
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

    public function view_saving_transaction(){
        $saving_transactions = DB::table('saving_transactions')->join('branches','branches.id','=','saving_transactions.branch_id')->get();
        return view('dashboards.customerRelationOfficers.transaction_management.view_saving_transactions', compact('saving_transactions'));
    }

    public function view_saving_servises(){
        $saving_services = DB::table('saving_services')->get();
        return view('dashboards.customerRelationOfficers.saving_services.view_saving_services', compact('saving_services'));
    }

    public function profile(){
        return view('dashboards/customerRelationOfficers/profile');
    }
    public function settings(){
        return view('dashboards/customerRelationOfficers/settings');
    }
}
