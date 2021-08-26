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
                            <li class="breadcrumb-item active">Role registration</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</section>
<section class="content">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Role registration</h3>
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
                                    <form method="POST" action="{{ route('admin.role_registration') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role_name">Role name</label>
                                                    <input id="role_name" type="text" value="{{ old('role_name') }}"class="form-control @error('role_name') is-invalid @enderror" name="role_name" required style="width: 90%;" autocomplete="role_name">
                                                    <div class="invalid-feedback">
                                                        Valid input required.
                                                    </div>
                                                    @error('role_name')
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

