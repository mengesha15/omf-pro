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
                                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                                <li class="breadcrumb-item active">{{ $customer->first_name." ".$customer->middle_name }}</li>
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
            <div class="col-sm-5 col-md-5 col-xs-5">
                <div class="thumbnail">
                    <div>
                        <h5>Customer detail</h5>
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12 image-container">
                        <img  src="{{ asset('uploads/customer_photo/'.$customer->customer_photo) }}" class="mx-auto d-block" style="height: 215px; width: 215px;" alt="Customer photo"/>
                    </div>
                    <br>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Name</label>{{": ". $customer->first_name." ".$customer->middle_name." ".$customer->last_name }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Address</label>{{": ". $customer->customer_address }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Phone number</label>{{": ". $customer->phone_number }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Gender</label>{{": ". $customer->customer_gender }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Customer Status</label>{{": ". $customer->customer_status }}
                    </div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <label>Registration date: &nbsp;</label><td>{{date('d/m/Y',strtotime($customer->created_at))}}</td>
                    </div>
                </div>
                <br>
            </div>
            <div class="col-md-5 col-md-5 col-xs-12">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('customerRelationOfficer.search_customer') }}">
                            <div class="input-group input-group-md">
                                <input name="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" placeholder="Enter account number" required value="{{ $customer->account_number }}">
                                <span class="input-group-append">
                                  <button type="submit" class="btn btn-info btn-flat">Search</button>
                                </span>
                                @error('account_number')
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
                    <label>Saving type</label>{{": ". $customer->saving_service_name }}
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <label>Interest rate</label>{{": ". $customer->saving_service_interest_rate }}
                </div>
                <form method="POST" action="" class="needs-validation" id="main_form">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="account_balance">Current balance</label>
                        <div class="col-md-5">
                            <input type="text" name = "account_balance" class="form-control" id="account_balance" value="{{ $customer->account_balance }}"readonly>
                        </div>
                      </div>
                    </div>
                  </form>
                  <div class="col-sm-6">
                    <ol class="breadcrumb">
                        <button class="btn btn-success" data-toggle="modal" data-target="#deposit-money"> Deposit money</button>
                    </ol>
                    <ol class="breadcrumb">
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#withdraw-money"> Withdraw money</button>
                    </ol>
                    <ol class="breadcrumb">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#transfer-money"> Transfer money</button>
                    </ol>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Transaction date</th>
                            <th>Transaction type</th>
                            <th>transaction amount</th>
                            <th>Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($saving_transactions as $saving_transaction)
                        <tr>
                            <td>{{date('d/m/Y',strtotime($saving_transaction->created_at))}}</td>
                            <td>{{ $saving_transaction->transaction_type }}</td>
                            <td>{{ $saving_transaction->transaction_amount }}</td>
                            <td>{{ $saving_transaction->branch_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <br><br><br>
@endsection
