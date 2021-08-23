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
                            <li class="breadcrumb-item active">Borrowers list</li>
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
                             <h4><b>Loan disburses</b></h4>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('message') }}
                            </div>
                            @elseif (Session::has('error_message'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error_message') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> New disbursement
                              </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Disburse date</th>
                        <th>Disbursed amount</th>
                        <th>Remaining amount</th>
                        <th>Disbursed by</th>
                        <th>Branch</th>
                        <th>Roll number</th>
                        <th>Name</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($disbursement_records as $disbursement_record)
                    <tr>
                        <td>{{date('d/m/Y',strtotime($disbursement_record->created_at))}}</td>
                        <td>{{ $disbursement_record->disburse_amount }}</td>
                        <td>{{ $disbursement_record->remaining_amount }}</td>
                        <td>{{ $disbursement_record->disbursed_by }}</td>
                        <td>{{ $disbursement_record->branch_name }}</td>
                        <td>{{ $disbursement_record->roll_number }}</td>
                        <td>{{ $disbursement_record->first_name." ".$disbursement_record->middle_name }}</td>
                        <td class="text-center">
                            <ol>
                                <li class="breadcrumb-item li-none"><a class="btn btn-lg btn-success"
                                    href="{{ url('customerServiceOfficer/loan_disbursemet_detail/' . $disbursement_record->roll_number) }}">Detail</a>

                            </ol>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div
@endsection

