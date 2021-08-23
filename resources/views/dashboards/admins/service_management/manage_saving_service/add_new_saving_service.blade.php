<title>OMF- Saving service registration</title>
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
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Saving service registration</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="content">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Saving service registration</h3>
            </div>
        <div class="card-body">
        <div id="" class=" dt-bootstrap4">
        <div class="col-sm-12">
                <div class="row">
            <div class="col-12">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Fill the form</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.add_new_saving_service') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="saving_service_name">Saving service name</label>
                                                    <input id="saving_service_name" type="text" value="{{ old('saving_service_name') }}"class="form-control @error('saving_service_name') is-invalid @enderror" name="saving_service_name" required style="width: 90%;" autocomplete="saving_service_name">
                                                    <div class="invalid-feedback">
                                                        Valid input required.
                                                    </div>
                                                    @error('saving_service_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="saving_service_description">Saving service description</label>
                                                    <input  id="saving_service_description" type="text" value="{{ old('saving_service_description') }}"class="form-control @error('saving_service_description') is-invalid @enderror" name="saving_service_description" required autocomplete="saving_service_description" style="width: 90%;">
                                                    <div class="invalid-feedback">
                                                        Valid input required.
                                                    </div>
                                                    @error('saving_service_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="saving_service_interest_rate">Interest rate</label>
                                                    <input  id="saving_service_interest_rate" type="text" value="{{ old('saving_service_interest_rate') }}"class="form-control @error('saving_service_interest_rate') is-invalid @enderror" name="saving_service_interest_rate" required autocomplete="saving_service_interest_rate" style="width: 90%;">
                                                    <div class="invalid-feedback">
                                                        Valid input required.
                                                    </div>
                                                    @error('saving_service_interest_rate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="card-footer col-md-3">
                                                    <button type="submit" class="btn btn-success">Register</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
</section>
@endsection

