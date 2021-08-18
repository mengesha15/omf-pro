@extends('layouts.customer_relation_officer')
@section('customer_relation_officer_content')
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
                            <li class="breadcrumb-item active">Saving transactions</li>
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
                             <h4><b>Transactions</b></h4>
                            </ol>
                        </div>
                        <div class="col-md-6">
                            @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                            @endif
                            @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Transaction date</th>
                        <th>Transaction type</th>
                        <th>transaction amount</th>
                        <th>Branch</th>
                        <th>Account number</th>
                        <th>Name</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saving_transactions as $saving_transaction)
                    <tr>
                        <td>{{date('d/m/Y',strtotime($saving_transaction->created_at))}}</td>
                        <td>{{ $saving_transaction->transaction_type }}</td>
                        <td>{{ $saving_transaction->transaction_amount }}</td>
                        <td>{{ $saving_transaction->branch_name }}</td>
                        <td>{{ $saving_transaction->customer_account_number }}</td>
                        <td>{{ $saving_transaction->first_name." ".$saving_transaction->middle_name }}</td>
                        <td class="text-center">
                            <ol>
                                <li class="breadcrumb-item li-none"><a class="btn btn-lg btn-success"
                                    href="{{ url('customerRelationOfficer/customer_detail/'. $saving_transaction->account_number) }}">Detail</a>

                            </ol>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

