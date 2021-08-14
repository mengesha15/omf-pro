@extends('layouts.auditor')
@section('auditor_content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0" style="font-family: 'Times New Roman'">OROMIA MICROFINANCE</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">OMF</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row" style="padding-top: 5%;">
            <div class="col-md-2"></div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_loan_services }}</h3>

                        <p>Loan services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('auditor.view_loan_services') }}" class="small-box-footer">View loan services<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_saving_services }}</h3>

                        <p>Saving services</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('auditor.saving_services_list') }}" class="small-box-footer">View saving services <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
    </div>
</section>
@endsection
