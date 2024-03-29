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
                            <li class="breadcrumb-item active">Approved loans list</li>
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

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <p class=""><h4><b>Approved loans</b></h4>
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
                        <th>Borrower name</th>
                        <th>Approved amount</th>
                        <th>Gender</th>
                        <th>Requested by</th>
                        <th>Approved by</th>
                        <th>Approved date</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($approved_loans as $approved_loan)
                    <tr>
                        <td>{{ $approved_loan->roll_number }}</td>
                        <td>{{ $approved_loan->first_name." " . $approved_loan->middle_name }}</td>
                        <td>{{ $approved_loan->approved_amount }}</td>
                        <td>{{ $approved_loan->borrower_gender }}</td>
                        <td>{{ $approved_loan->requested_by }}</td>
                        <td>{{ $approved_loan->approved_by }}</td>
                        <td>{{ date('d-m-Y H:m:s',strtotime($approved_loan->created_at)) }}</td>
                        <td class="text-center">
                            <ol>
                                <li class="breadcrumb-item li-none"><a href="{{ url('admin/employee_detail/' . $approved_loan->id) }}"><i class="fa fa-indent"></i>Detail</a>

                            </ol>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection

