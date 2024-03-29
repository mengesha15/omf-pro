@extends('layouts.admin')
@section('admin_content')
<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: 'Times New Roman'">OROMIA MICROFINANCE</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Employee detail</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</section>
<hr>
    <section>
        <div class="row" style="padding-left: 10%;">
            <div class="col-md-3">
                <img src="{{ asset('uploads/employee_photo/'.$employee->employee_photo) }}" alt="Employee photo">
            </div>
        </div>
        <br>
        <div class="row" style="padding-left: 10%;">
            <div class="col-md-5">
                <div>
                    <label for="full_name">Full name</label>{{": " .$employee->first_name.' '.$employee->middle_name.' '.$employee->last_name }}
                </div>
                <div>
                    <label for="username">Username </label>{{": " .$employee->username}}
                </div>
                <div>
                    <label for="address">Address</label>{{": " .$employee->employee_address }}
                </div>
                <div>
                    <label for="branch">Branch</label>{{": " .$employee->branch_name}}
                </div>
                <div>
                    <label for="employee_role">Employee role</label>{{": " .$employee->role_name}}
                </div>
                <div>
                    <label for="phone_number">Phone number</label>{{": " .$employee->phone_number}}
                </div>
            </div>
            <div class="col-md-5">
                <div>
                    <label for="birth_date">Birthdate:</label>{{' '.date('d-m-Y',strtotime($employee->birth_date))}}
                </div>
                <div>
                    <label for="first_name">Hired date:</label>{{' '.date('d-m-Y',strtotime($employee->created_at))}}
                </div><div>
                    <label for="age">Age:</label>{{ ' '.$age }}
                </div>
                <div>
                    <label for="salary">Salary</label>{{": " .$employee->employee_salary }}
                </div>
                <div>
                    <label for="gender">Gender</label>{{": " .$employee->employee_gender }}
                </div>
                <div>
                    <label for="salary">Branch</label>{{": " .$employee->branch_name }}
                </div>
            </div>
        </div>
    </section>
@endsection
