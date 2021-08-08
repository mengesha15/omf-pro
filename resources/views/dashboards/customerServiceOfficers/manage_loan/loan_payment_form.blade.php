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
            <div class="col-sm-2 col-md-2 col-xs-2">
            </div>
            <div class="col-sm-5 col-md-5 col-xs-5">
                <div class="thumbnail">
                    <div class="col-sm-6 col-md-6 col-xs-12 image-container">
                        <img  src="{{ asset('uploads/borrower_photo/'.$borrower->borrower_photo) }}" class="mx-auto d-block" />
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
                        <label>Request date</label>{{": ". $borrower->created_at }}
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-5">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <label>Loan type</label>{{": ". $borrower->loan_service_name }}
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <label>Interest rate</label>{{": ". $borrower->loan_service_interest_rate }}
                </div>
                <form method="POST" action="{{ url('customerServiceOfficer/loan_payment/'.$borrower->id) }}" class="needs-validation" id="main_form">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="borrowed_amount">Request Amount</label>
                        <div class="col-md-5">
                            <input type="text" name = "borrowed_amount" class="form-control" id="borrowed_amount" value="{{ $borrower->borrowed_amount }}"readonly>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="borrower_id">Borrower ID</label>
                        <div class="col-md-4">
                            <input type="text" name="borrower_id" class="form-control" id="borrower_id" value="{{ $borrower->id }}" readonly>
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

@endsection
