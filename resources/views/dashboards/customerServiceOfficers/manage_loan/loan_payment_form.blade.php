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
                                <li class="breadcrumb-item active">Loan payment</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 col-md-1 col-xs-1">
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6">
                <div class="thumbnail">
                    <div class="col-sm-6 col-md-6 col-xs-12 image-container">
                        <img  src="{{ asset('uploads/borrower_photo/'.$borrower->borrower_photo) }}" class="mx-auto d-block" style="height: 215px; width: 215px;"/>
                    </div>
                    <br>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Name</label>{{": ". $borrower->first_name." ".$borrower->middle_name." ".$borrower->last_name }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Address</label>{{": ". $borrower->borrower_address }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Phone number</label>{{": ". $borrower->phone_number }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Gender</label>{{": ". $borrower->borrower_gender }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Job</label>{{": ". $borrower->borrower_status }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Loan Status</label>{{": ". $borrower->status }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Request date</label><td>{{date('d/m/Y',strtotime($borrower->created_at))}}</td>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-5 col-md-5 col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('customerServiceOfficer.search_borrower') }}">
                            <div class="input-group input-group-sm">
                                <input name="roll_number" type="text" class="form-control @error('roll_number') is-invalid @enderror" placeholder="Enter roll number" required value="{{ $borrower->roll_number }}">
                                <span class="input-group-append">
                                  <button type="submit" class="btn btn-info btn-flat">Search</button>
                                </span>
                                @error('roll_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </form>
                    </div>

                </div>
                <hr>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <label>Loan type</label>{{": ". $borrower->loan_service_name }}
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <label>Interest rate</label>{{": ". $borrower->loan_service_interest_rate }}
                </div>
                <form method="POST" action="{{ url('customerServiceOfficer/loan_payment/'.$borrower->roll_number) }}" class="needs-validation" id="main_form">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="borrowed_amount">Request Amount</label>
                        <div class="col-md-5">
                            <input type="text" name = "borrowed_amount" class="form-control" id="borrowed_amount" value="{{ $borrower->borrowed_amount }}"readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="roll_number">Roll Number</label>
                        <div class="col-md-4">
                            <input type="text" name="roll_number" class="form-control" id="roll_number" value="{{ $borrower->roll_number }}" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        @if ($borrower->status == "Approved")
                            <ol class="breadcrumb">
                                <button class="btn btn-success"> Apply payment</button>
                            </ol>
                        @else
                            <ol class="breadcrumb">
                                <button class="btn btn-success" disabled> Apply payment</button>
                            </ol>
                        @endif
                    </div>
                  </form>
            </div>

        </div>
    </section>
    <br><br><br>
@endsection
