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
                            <li class="breadcrumb-item active">OMF saving services</li>
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
                             <h4><b>Saving services</b></h4>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saving_services as $saving_service)
                    <tr>
                        <td>{{ $saving_service->id }}</td>
                        <td>{{ $saving_service->saving_service_name }}</td>
                        <td>{{ $saving_service->saving_service_description }}</td>
                        <td>{{ $saving_service->saving_service_interest_rate }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

