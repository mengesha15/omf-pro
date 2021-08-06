<title>OMF- Customer service officer</title>
@extends('layouts.customer_service_officer')
@section('customer_service_officer_content')
<div class="container">
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
                                <li class="breadcrumb-item active">OMF</li>
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
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_borrowers }}</h3>

                            <p>Borrowers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">View borrowers<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $total_requested_loans }}</h3>

                            <p>Requested loans</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">View requests <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $total_approved_loan }}</h3>

                            <p>Approved loans</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">View approveds <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $total_loan_service }}</h3>

                            <p>Available services</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">View services <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        {{-- Datatable --}}
        <div class="card">
            <div class="card-header">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">

                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-left">
                                    <p class=""> Approved loans
                                    </p>
                                </ol>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <a href="{{ route('customerServiceOfficer.add_new_request_form') }}" class="btn btn-success"> Add
                                        new request
                                    </a>
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            {{-- <th>Photo</th> --}}
                            <th>First name</th>
                            <th>middle name</th>
                            <th>last name</th>
                            <th>Gender</th>
                            <th>Salary</th>
                            <td>Detail</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approved_loans as $approved_loan)
                        <tr>
                            <td>{{ $requested_loan->id }}</td>
                            {{-- <td>
                                        <img src="{{ asset('uploads/employee_photo/'.$employee->employee_photo) }}" alt="Employee photo">
                            </td> --}}
                            <td>{{ $requested_loan->approved_amount }}</td>
                            <td>{{ $approved_loan->borrower_id }}</td>
                            <td>{{ $approved_loan->requested_by }}</td>
                            <td>{{ $approved_loan->employee_gender }}</td>
                            <td>{{ $approved_loan->approved_by }}</td>
                            <td>{{ $approved_loan->loan_service_id }}</td>
                            <td>
                                <ol>
                                    <li class="breadcrumb-item li-none"><a href="{{ url('admin/employee_detail/'. $employee->id) }}"><i class="fa fa-indent"></i>Detail</a>

                                </ol>
                            </td>

                            <td class="text-center">
                                <a href="{{ url('admin/edit_employee/' . $employee->id) }}" class=" breadcrumb-item li-none btn btn-primary btn-sm">
                                    <p class="fa fa-edit"></p>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{ url('admin/delete_employee/' . $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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


</div>
@endsection
