@extends('layouts.customer_relation_officer')
@section('customer_relation_officer_content')
<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0" style="font-family: 'Times New Roman'">OROMIA MICROFINANCE</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Customer registration</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Fill required customer data
                bellow</div>
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('customerRelationOfficer.customer_registration') }}"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First
                                    name</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" required style="width: 90%;">
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
                                <label for="middle_name">Middle
                                    name</label>
                                <input id="middle_name" type="text"
                                    class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"
                                    value="{{ old('middle_name') }}" autocomplete="middle_name" style="width: 90%;"
                                    required>
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
                                <label for="last_name">Last
                                    name</label>
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" autocomplete="last_name" style="width: 90%;"
                                    required>
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
                                <label for="account_balance">Initial
                                    deposit</label>
                                <input id="account_balance" type="text"
                                    class="form-control @error('account_balance') is-invalid @enderror"
                                    name="account_balance" value="{{ old('account_balance') }}" required
                                    autocomplete="account_balance" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('account_balance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_status">Customer
                                    status</label>
                                <input id="customer_status	" type="text"
                                    class="form-control @error('customer_status') is-invalid @enderror"
                                    name="customer_status" value="{{ old('customer_status') }}"
                                    autocomplete="customer_status" style="width: 90%;" required>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('customer_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customer_address">Address</label>
                                <input id="customer_address" type="text"
                                    class="form-control @error('customer_address') is-invalid @enderror"
                                    name="customer_address" value="{{ old('customer_address') }}" required
                                    autocomplete="customer_address" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('customer_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone
                                    number</label>
                                <input id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required autocomplete="phone_number"
                                    style="width: 60%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
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
                                <input id="birth_date" type="date"
                                    class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                                    value="{{ old('birth_date') }}" required autocomplete="birth_date"
                                    style="width: 50%;">
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
                                <input list="branch_id" name="branch_id"
                                    class="col-sm-6 custom-select custom-select-sml @error('branch_id') is-invalid @enderror"
                                    required value="{{ old('branch_id') }}" placeholder="Choose branch...">
                                <datalist id="branch_id">
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
                                <label for="saving_service_id">Saving
                                    service type</label><br>
                                <input list="saving_service_id" name="saving_service_id"
                                    class="col-sm-6 custom-select custom-select-sml @error('saving_service_id') is-invalid @enderror"
                                    required value="{{ old('saving_service_id') }}" placeholder="Choose service...">
                                <datalist id="saving_service_id">
                                    @foreach ($saving_services as
                                    $saving_service)
                                    <option value="{{ $saving_service->id }}">
                                        {{ $saving_service->saving_service_name }}
                                    </option>
                                    @endforeach
                                </datalist>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('saving_service_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="customer_gender"
                                        checked id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_gender" value="Male"
                                        id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="customer_gender" value="Other"
                                        id="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customer_photo">Choose
                                    photo</label>
                                <input type="file" class="form-control @error('customer_photo') is-invalid @enderror"
                                    name="customer_photo" id="customer_photo" value="{{ old('customer_photo') }}"
                                    style="width: 80%; height: 8.5%;" required>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('customer_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="position-relative"><br><br>
                            </div>
                            <div class="card-footer col-4">
                                <button type="submit" class="btn btn-success">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
