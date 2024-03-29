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
                            <li class="breadcrumb-item active">Updating employee</li>
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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Employee updation form</h3>
                </div>
                <form method="POST" action="{{ url('admin/edit_employee/'.$employee->id) }}"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <img src="{{ asset('uploads/employee_photo/'.$employee->employee_photo) }}" alt=""
                                height="150px" width="140">
                            <br><br>
                            <div class="form-group">
                                <label for="first_name">First
                                    name</label>
                                <input value="{{ $employee->first_name }}" id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    required style="width: 90%;" autocomplete="first_name">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="middle_name">Middle name</label>
                                <input value="{{ $employee->middle_name }}" id="middle_name" type="text"
                                    class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                    required autocomplete="middle_name" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ $employee->last_name }}" required autocomplete="last_name"
                                    style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employee_salary">Employee salary</label>
                                <input value="{{ $employee->employee_salary }}" id="employee_salary" type="text"
                                    class="form-control @error('employee_salary') is-invalid @enderror"
                                    name="employee_salary" required autocomplete="employee_salary" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('employee_salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employee_address">Address</label>
                                <input value="{{ $employee->employee_address }}" id="employee_address" type="text"
                                    class="form-control @error('employee_address') is-invalid @enderror"
                                    name="employee_address" required autocomplete="employee_address"
                                    style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('employee_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="phone_number">Phone number</label>
                                <input value="{{ $employee->phone_number }}" id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    required autocomplete="phone_number" style="width: 70%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="birth_date">Birth date</label>
                                <input value="{{ $employee->birth_date }}" id="birth_date" type="date"
                                    class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                    required autocomplete="birth_date" style="width: 60%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="branch_id">Branch</label><br>
                                <input list="branch_id" name="branch_id" value="{{ $employee->branch_id }}"
                                    class="col-sm-6 custom-select custom-select-sm @error('branch_id') is-invalid @enderror"
                                    required placeholder="Choose role..."> <datalist id="branch_id">
                                    @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">
                                        {{ $branch->branch_name }}
                                    </option>
                                    @endforeach
                                </datalist>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('branch_id')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="role_id">Employee
                                    role</label><br>
                                <input list="role_id" name="role_id"
                                    class="col-sm-6 custom-select custom-select-sm @error('role_id') is-invalid @enderror"
                                    required value="{{ $employee->role_id }}" placeholder="Choose role...">

                                <datalist id="role_id">
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">
                                        {{ $role->role_name }}
                                    </option>
                                    @endforeach
                                </datalist>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('role_id')

                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                            <!-- radio -->
                            @if($employee->employee_gender=='Female')
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="employee_gender"
                                        checked id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="employee_gender" value="Male"
                                        id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="employee_gender" value="Other"
                                        id="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="employee_gender"
                                        id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input checked class="form-check-input" type="radio" name="employee_gender"
                                        value="Male" id="male">

                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="employee_gender" value="Other"
                                        id="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="employee_photo">Choose
                                    photo</label>
                                <input value="{{ asset('uploads/employee-photo/'.$employee->employee_photo) }}"
                                    type="file" class="form-control @error('employee_photo') is-invalid @enderror"
                                    name="employee_photo" id="employee_photo" style="width: 90%; height: 10%;">
                                @error('employee_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
</section>
@endsection
