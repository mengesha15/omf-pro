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
                        {{-- <th>Photo</th> --}}
                        <th>Borrower name</th>
                        <th>Requested Amount</th>
                        <th>Gender</th>
                        <th>Requested date</th>
                        <th>Detail</th>
                        <th>Approve</th>
                        <th style="color: red">Reject</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requested_loans as $requested_loan)
                    <tr>
                        <td>{{ $requested_loan->roll_number }}</td>
                        {{-- <td>
                                        <img src="{{ asset('uploads/employee_photo/'.$employee->employee_photo) }}" alt="Employee photo">
                        </td> --}}
                        <td>{{ $requested_loan->first_name." " . $requested_loan->middle_name }}</td>
                        <td>{{ $requested_loan->borrowed_amount }}</td>
                        <td>{{ $requested_loan->borrower_gender }}</td>
                        <td>{{ $requested_loan->created_at }}</td>
                        <td class="text-center">
                            <ol>
                                <li class="breadcrumb-item li-none"><a href="{{ url('admin/employee_detail/' . $requested_loan->id) }}"><i class="fa fa-indent"></i>Detail</a>

                            </ol>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('admin/loan_request_approvement/' . $requested_loan->roll_number) }}" class=" breadcrumb-item li-none btn btn-success btn-sm">Approve
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ url('admin/reject_loan_request/' .$requested_loan->roll_number) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to reject request?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm">Reject</button>
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- /.content -->


@endsection

