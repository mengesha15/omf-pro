@extends('layouts.customer_service_officer')
@section('service_officer_content')
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">New loan request</li>
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
            <div class="card-header">
                <h3 class="card-title">Loan request edit form</h3>
            </div>
            <div class="col-md-12" style="padding-left: 10%">
                <br>
                <form method="POST" action="{{ url('customerServiceOfficer/update_borrower/'.$borrower->roll_number) }}"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First
                                    name</label>
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ $borrower->first_name }}" required style="width: 90%;">
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
                                    value="{{ $borrower->middle_name }}" autocomplete="middle_name" style="width: 90%;"
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
                                    value="{{ $borrower->last_name }}" autocomplete="last_name" style="width: 90%;"
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
                                <label for="borrowed_amount">Request
                                    amount</label>
                                <input id="borrowed_amount" type="text"
                                    class="form-control @error('borrowed_amount') is-invalid @enderror"
                                    name="borrowed_amount" value="{{ $borrower->borrowed_amount }}" required
                                    autocomplete="borrowed_amount" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('borrowed_amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="borrower_status">Borrower
                                    status</label>
                                <input id="borrower_status	" type="text"
                                    class="form-control @error('borrower_status') is-invalid @enderror"
                                    name="borrower_status" value="{{ $borrower->borrower_status }}"
                                    autocomplete="borrower_status" style="width: 90%;" required>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('borrower_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="borrower_address">Address</label>
                                <input id="borrower_address" type="text"
                                    class="form-control @error('borrower_address') is-invalid @enderror"
                                    name="borrower_address" value="{{ $borrower->borrower_address }}" required
                                    autocomplete="borrower_address" style="width: 90%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('borrower_address')
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
                                    value="{{ $borrower->phone_number }}" required autocomplete="phone_number"
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
                                    value="{{ $borrower->birth_date }}" required autocomplete="birth_date"
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
                                    required value="{{  $borrower->branch_id }}" placeholder="Choose branch...">
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
                                <label for="loan_service_id">Loan
                                    service type</label><br>
                                <input list="loan_service_id" name="loan_service_id"
                                    class="col-sm-6 custom-select custom-select-sml @error('loan_service_id') is-invalid @enderror"
                                    required value="{{ $borrower->loan_service_id }}" placeholder="Choose service...">
                                <datalist id="loan_service_id">
                                    @foreach ($loan_services as
                                    $loan_service)
                                    <option value="{{ $loan_service->id }}">
                                        {{ $loan_service->loan_service_name }}
                                    </option>
                                    @endforeach
                                </datalist>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('loan_service_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" value="Female" type="radio" name="borrower_gender"
                                        checked id="female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="borrower_gender" value="Male"
                                        id="male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="borrower_gender" value="Other"
                                        id="other">
                                    <label class="form-check-label" for="other">Other</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="borrower_photo">Choose
                                    photo</label>
                                <input type="file" class="form-control @error('borrower_photo') is-invalid @enderror"
                                    name="borrower_photo" id="borrower_photo" value="{{ old('borrower_photo') }}"
                                    style="width: 60%; height: 8.5%;">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('borrower_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="position-relative"><br><br>
                            </div>
                            <div class="card-footer col-5">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection
