@extends('layouts.auditor')
@section('auditor_content')
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
                            <li class="breadcrumb-item active">OMF loan services</li>
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
                             <h4><b>Loan services</b></h4>
                            </ol>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Service name</th>
                        <th>Service description</th>
                        <th>Interest rate</th>
                        <th>Loan term</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan_services as $loan_service)
                    <tr>
                        <td>{{ $loan_service->id }}</td>
                        <td>{{ $loan_service->loan_service_name }}</td>
                        <td>{{ $loan_service->loan_service_description }}</td>
                        <td>{{ $loan_service->loan_service_interest_rate }}</td>
                        <td>{{ $loan_service->loan_term }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

