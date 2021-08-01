@extends('layouts.admin')
@section('admin_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee registration</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Registration</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registration form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="POST" action="{{ route('admin.employee_registration') }}" enctype="multipart/form-data" id="main_form">
                                @if (Session::has('success'))
                                <div class="alert alert-success" >
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="first_name">First name</label>
                                        <input id="first_name" type="text"
                                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                            value="{{ old('first_name') }}" required autocomplete="first_name"
                                            style="width: 90%;">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="middle_name">Middle name</label>
                                        <input id="middle_name" type="text"
                                            class="form-control @error('middle_name') is-invalid @enderror"
                                            name="middle_name" value="{{ old('middle_name') }}" required
                                            autocomplete="middle_name" style="width: 90%;">
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
                                            value="{{ old('last_name') }}" required autocomplete="last_name"
                                            style="width: 90%;">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_salary">Employee salary</label>
                                        <input id="employee_salary" type="text"
                                            class="form-control @error('employee_salary') is-invalid @enderror"
                                            name="employee_salary" value="{{ old('employee_salary') }}" required
                                            autocomplete="employee_salary" style="width: 90%;">
                                        @error('employee_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_address">Address</label>
                                        <input id="employee_address" type="text"
                                            class="form-control @error('employee_address') is-invalid @enderror"
                                            name="employee_address" value="{{ old('employee_address') }}" required
                                            autocomplete="employee_address" style="width: 90%;">
                                        @error('employee_address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Phone number</label>
                                        <input id="phone_number" type="text"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            name="phone_number" value="{{ old('phone_number') }}" required
                                            autocomplete="phone_number" style="width: 90%;">
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="birth_date">Birth date</label>
                                        <input id="birth_date" type="date"
                                            class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                            value="{{ old('birth_date') }}" required autocomplete="birth_date"
                                            style="width: 90%;">
                                        @error('birth_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="branch_id">Branch</label><br>
                                        <input list="branch_id" name="branch_id"
                                            class="col-sm-6 custom-select custom-select-sm" required=""
                                            placeholder="Choose role...">
                                        <datalist id="branch_id">
                                            @foreach ($branches as $branch)
                                                <option value="{{ $branch->id}}">
                                                    {{ $branch->branch_name }}</option>
                                            @endforeach
                                        </datalist>
                                        <div class="invalid-feedback">
                                            Choose valid employee role.
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="role_id">Employee role</label><br>
                                        <input list="role_id" name="role_id"
                                            class="col-sm-6 custom-select custom-select-sm" required=""
                                            placeholder="Choose role...">
                                        <datalist id="role_id">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">
                                                    {{ $role->role_name }}</option>
                                            @endforeach
                                        </datalist>
                                        <div class="invalid-feedback">
                                            Choose valid employee role.
                                        </div>
                                    </div>
                                    <!-- radio -->
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" value="Female" type="radio"
                                                name="employee_gender" checked id="female">
                                            <label class="form-check-label" for="female">Female</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="employee_gender" value="Male"
                                                id="male">
                                            <label class="form-check-label" for="male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="employee_gender"
                                                value="Other" id="other">
                                            <label class="form-check-label" for="other">Other</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_photo">Choose photo</label>
                                        <input type="file" class="form-control" name="employee_photo" id="employee_photo" style="width: 90%;" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
 @include('includes.footer')
@endsection


{{-- <script>
    $(function () {
        $(#main_form).on('submit',function (e) {
            e.preventDefault();
            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this);
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){

                },
                success:function(data){

                }
            });
         });

    });
</script> --}}
