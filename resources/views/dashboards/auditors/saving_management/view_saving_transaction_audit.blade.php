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
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Month</th>
                        @foreach ($job_comp_codes as $job_comp_code)
                         <th>Job Amount {{ $job_comp_code }}</th>
                        @endforeach
                        @foreach ($job_comp_codes as $job_comp_code)
                         <th>Job count {{ $job_comp_code }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $month => $values)
                      <tr>
                          <td>{{ \Carbon\Carbon::parse($month)->format('F Y') }}</td>
                          @foreach ($job_comp_codes as $job_comp_code)
                            <td>{{ $roport[$month][$job_comp_code]['amount'] ?? '0'}}</td>
                          @endforeach
                          @foreach ($job_comp_codes as $job_comp_code)
                            <td>{{ $roport[$month][$job_comp_code]['count'] ?? '0' }}</td>
                          @endforeach
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

