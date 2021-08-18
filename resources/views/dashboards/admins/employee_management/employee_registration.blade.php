<title>OMF- Employee registration</title>
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Employe registration</li>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employee registration</h3>
                    </div>
                    <!-- /.card-header -->
<div class="card-body">
<div id="" class=" dt-bootstrap4">
    <div class="row">
        <div class="col-sm-12 col-md-6"></div>
        <div class="col-sm-12 col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table id="" class="table table-bordered table-hover dtr-inline collapsed" role="grid">
<div class="row">
    <div class="col-12">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Fill employee data</div>
                        @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.add_new_employee') }}" enctype="multipart/form-data" class="needs-validation" id="main_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="first_name">First
                                                    name</label>
                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" style="width: 90%;">
                                                @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="middle_name">Middle
                                                    name</label>
                                                <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" style="width: 90%;">
                                                @error('middle_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="last_name">Last
                                                    name</label>
                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" style="width: 90%;">
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_salary">Employee
                                                    salary</label>
                                                <input id="employee_salary" type="text" class="form-control @error('employee_salary') is-invalid @enderror" name="employee_salary" value="{{ old('employee_salary') }}" required autocomplete="employee_salary" style="width: 90%;">
                                                @error('employee_salary')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_address">Address</label>
                                                <input id="employee_address" type="text" class="form-control @error('employee_address') is-invalid @enderror" name="employee_address" value="{{ old('employee_address') }}" required autocomplete="employee_address" style="width: 90%;">
                                                @error('employee_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">Phone
                                                    number</label>
                                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" style="width: 60%;">
                                                @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">

                                            <div class="form-group">
                                                <label for="birth_date">Birth
                                                    date</label>
                                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date" style="width: 50%;">
                                                @error('birth_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="branch_id">Branch</label><br>
                                                <input list="branch_id" name="branch_id" class="col-sm-6 custom-select custom-select-sml @error('birth_date') is-invalid @enderror" required value="{{ old('branch_id') }}" placeholder="Choose role...">
                                                <datalist id="branch_id">
                                                    @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}">
                                                        {{ $branch->branch_name }}
                                                    </option>
                                                    @endforeach
                                                </datalist>
                                                @error('branch_id')

                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="role_id">Employee
                                                    role</label><br>
                                                <input list="role_id" name="role_id" class="col-sm-6 custom-select custom-select-sm @error('birth_date') @enderror" required value="{{ old('role_id') }}" placeholder="Choose role...">
                                                <datalist id="role_id">
                                                    @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">
                                                        {{ $role->role_name }}
                                                    </option>
                                                    @endforeach
                                                </datalist>
                                                @error('role_id')

                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                            <!-- radio -->
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" value="Female" type="radio" name="employee_gender" checked id="female">
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="employee_gender" value="Male" id="male">
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="employee_gender" value="Other" id="other">
                                                    <label class="form-check-label" for="other">Other</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="employee_photo">Choose
                                                    photo</label>
                                                <input type="file" class="form-control @error('employee_photo') is-invalid @enderror" name="employee_photo" id="employee_photo" value="{{ old('employee_photo') }}" style="width: 80%; height: 8.5%;" required>

                                                @error('employee_photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-success">Register</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            </form>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </table>
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
    </section>
@endsection
