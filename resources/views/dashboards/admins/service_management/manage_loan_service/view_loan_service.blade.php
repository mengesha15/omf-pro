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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">loan service list</li>
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
                                <p class="">Loan services
                                </p>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('admin.loan_service_registration_form') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add new loan service
                                </a>
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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Service ID</td>
                        <th>Service name</th>
                        <th>Service description</th>
                        <th>Interest rate</th>
                        <th>Loan term</th>
                        <th>Edit</th>
                        <th style="color: red">Delete</th>
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
                        <td class="text-center">
                            <a href="{{ url('admin/edit_loan_service/' . $loan_service->id) }}">
                                <p class="fa fa-edit"></p>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ url('admin/delete_loan_service/' . $loan_service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this loan service?')">
                                @method('delete')
                                @csrf
                                <button><i class="far fa-trash-alt" style="color: red;"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</section>
 @endsection


