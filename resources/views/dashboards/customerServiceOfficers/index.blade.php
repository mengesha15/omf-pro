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
                        <h3>{{ $total_requested_loans }}</h3>

                        <p>Requested loans</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">View requested<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_borrowers }}</h3>

                        <p>Borrowers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">View borrowers <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_loan_service }}</h3>

                        <p>Loan services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">View services <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_approved_loan }}</h3>

                        <p>Approved loans</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">View approved <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>

<div class="card">
    <div class="card-header">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <p class=""> Requested loans
                            </p>
                        </ol>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('customerServiceOfficer.add_new_request_form') }}"
                                class="btn btn-success"> Add new request
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First name</th>
                        <th>middle name</th>
                        <th>Gender</th>
                        <th>Phone no</th>
                        <th>Salary</th>
                        <th>Statu</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requsted_loans as $requsted_loan) 
                    <tr>
                        <td>{{ $requsted_loan->id }}</td>
                        <td>{{ $requsted_loan->first_name }}</td>
                        <td>{{ $requsted_loan->middle_name }}</td>
                        <td>{{ $requsted_loan->borrower_gender }}</td>
                        <td>{{ $requsted_loan->phone_number }}</td>
                        <td>{{ $requsted_loan->borrowed_amount }}</td>
                        <td>{{ $requsted_loan->status }}</td>
                        <td class="text-center">
                            <ol>
                                @if ($requsted_loan->status == "Approved")
                                <li class="breadcrumb-item li-none"><a class="btn btn-lg btn-success"
                                    href="{{ url('customerServiceOfficer/loan_payment/' . $requsted_loan->id) }}">Pay</a>
                                @else
                                <button class="btn btn-success" disabled> Pay</button>
                                @endif

                            </ol>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
