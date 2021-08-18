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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">OMFsaving customers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-3">
                            <ol class="breadcrumb">
                                <h4><b>Saving customers</b></h4>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <ol class="breadcrumb">
                                <a href="{{ route('customerRelationOfficer.customer_registration_form') }}"
                                    class="btn btn-success"><i class="fas fa-plus"></i> Add new Customer</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Account number</th>
                        <th>Full name</th>
                        <th>Phone no</th>
                        <th>Balance</th>
                        <th>Gender</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->account_number }}</td>
                        <td>{{ $customer->first_name." ". $customer->middle_name." ".$customer->last_name }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->account_balance }}</td>
                        <td>{{ $customer->customer_gender }}</td>
                        <td class="text-center">
                            <li class="breadcrumb-item li-none"><a class="btn btn-lg btn-success"
                                    href="{{ url('customerRelationOfficer/customer_detail/'. $customer->account_number) }}">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
