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
                            <li class="breadcrumb-item active">Apprroved loans</li>
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
                             <h4><b>Approved loans list</b></h4>
                            </ol>
                        </div>
                        <div class="col-sm-6"></div>
                        <div class="col-sm-3">
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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Roll number</th>
                        {{-- <th>Photo</th> --}}
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone no</th>
                        <th>Amount</th>
                        <th>Statu</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $borrower)
                    <tr>
                        <td>{{ $borrower->roll_number }}</td>
                        <td>{{ $borrower->first_name.$borrower->middle_name  }}</td>
                        <td>{{ $borrower->borrower_gender }}</td>
                        <td>{{ $borrower->phone_number }}</td>
                        <td>{{ $borrower->approved_amount }}</td>
                        <td>{{ $borrower->status }}</td>
                        <td class="text-center">
                            <ol>
                                <li class="breadcrumb-item li-none"><a class="btn btn-lg btn-success"
                                    href="{{ url('customerServiceOfficer/loan_payment/' . $borrower->roll_number) }}">Detail</a>

                            </ol>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

