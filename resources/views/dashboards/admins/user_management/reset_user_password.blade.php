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
                            <li class="breadcrumb-item active">Password reset</li>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User password reset') }}</div>
                <div class="card-body">
                    <form action="{{ route('admin.reset_user_password') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                          <div class="col-md-9" style="padding-left: 15%">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                    <div class="alert alert-default" style="font-family: 'Times New Roman', Times, serif;">
                                        <h3>Password:{{' '. Session::get('pwd') }}</h3>
                                    </div>
                                @endif
                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error_message') }}
                                    </div>
                                @endif
                              <div class="form-group">
                                <label for="username">Employee username</label>
                                <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Enter employee username" name="username" required value="{{ old('username') }}">
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="card-footer col-md-7">
                                <button type="submit" class="btn btn-primary">Reset user pwd</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
