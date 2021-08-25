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
                            <li class="breadcrumb-item active">OMF- Saving audit</li>
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
                             <h4><b>Saving <Tr>
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
                <table id="example1" class="table table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Transaction date</th>
                        <th>Username</th>
                        @foreach ($transaction_types as $transaction_type)
                            <th>{{ $transaction_type }}</th>
                        @endforeach
                        @foreach ($transaction_types as $transaction_type)
                            <th>Count of {{ $transaction_type }}</th>
                        @endforeach
                        <th>Taken amonut</th>
                        <th>Net return</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saving_report as $transaction_date => $values)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($transaction_date)->format('d-m-Y') }}</td>
                            <td>{{ $saving_report[$transaction_date][$transaction_type]['username'] ?? '--' }}</td>
                            @foreach ($transaction_types as $transaction_type)
                                <td>{{ $saving_report[$transaction_date][$transaction_type]['amount'] ?? '0' }}</td>
                            @endforeach
                            @foreach ($transaction_types as $transaction_type)
                            <td>{{ $saving_report[$transaction_date][$transaction_type]['count'] ?? '0' }}</td>
                            @endforeach
                            <td>taken for work</td>
                            <td>Net return</td>
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

