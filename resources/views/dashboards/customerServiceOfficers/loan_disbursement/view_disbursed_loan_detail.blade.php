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
                            <li class="breadcrumb-item active">Individual disburs list</li>
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
            <div class="col-sm-3">
                <ol>
                 <p><b>{{  $borrower->first_name." ".$borrower->middle_name }}</b></p>
                </ol>
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
                        <th>Disburse date</th>
                        <th>Disbursed amount</th>
                        <th>Remaining amount</th>
                        <th>Disbursed by</th>
                        <th>Branch</th>
                        <th>Roll number</th>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

