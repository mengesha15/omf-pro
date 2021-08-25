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
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">OMF- Loan audit</li>
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
                             <h4><b>Loan <Tr>
                                 transaction audit</Tr></b></h4>
                            </ol>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Transaction date</th>
                        <th>Username</th>
                        <th>Total disburse</th>
                        <th>Total borrowed</th>
                        <th>Taken amonut</th>
                        <th>Net return</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loan_transaction_audits as $loan_transaction_audit)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($loan_transaction_audit->disburse_date)) }}</td>
                            <td>{{ $loan_transaction_audit->disbursed_by }}</td>
                            <td>{{ $loan_transaction_audit->sum_of_didburse }}</td>
                            <td>{{ $loan_transaction_audit->sum_of_borrowed }}</td>
                            <td>{{ $loan_transaction_audit->sum_of_didburse }}</td>
                            <td>{{ $loan_transaction_audit->sum_of_borrowed }}</td>
                            <td class="text-center">
                                <ol>
                                    <a class="btn btn-lg btn-success"
                                        href="#">Detail</a>
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

