<title>OMF - Requested loans list</title>
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
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Requested loans list</li>
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

    {{-- Datatable --}}
    <div class="card">
        <div class="card-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <p class=""><h4><b>Requested loans</b></h4>
                                </p><hr>
                            </ol>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <ol class="breadcrumb">
                                <a href="{{ route('customerServiceOfficer.add_new_request') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add new request</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                    <tr>
                        <th>Roll Number</th>
                        <th>Borrower name</th>
                        <th>Requested amount</th>
                        <th>Gender</th>
                        <th>Requested date</th>
                        <th>Loan status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requested_loans as $requested_loan)
                    <tr>
                        <td>{{ $requested_loan->roll_number }}</td>
                        <td>{{ $requested_loan->first_name." " . $requested_loan->middle_name }}</td>
                        <td>{{ $requested_loan->borrowed_amount }}</td>
                        <td>{{ $requested_loan->borrower_gender }}</td>
                        <td>{{ $requested_loan->created_at }}</td>
                        <td>{{ $requested_loan->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

