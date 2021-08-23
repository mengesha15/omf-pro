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
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Password change</li>
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
                <div class="card-header">{{ __('Password change') }}</div>
                <div class="card-body">
                    <form action="{{ route('customerRelationOfficer.reset_password') }}" method="POST" class="nedds-validatio" novalidate>
                        @csrf
                          <div class="col-md-9" style="padding-left: 30%">
                                @if (Session::has('message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error_message') }}
                                    </div>
                                @endif
                              <div class="form-group">
                                <label for="new_password">New password</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter new password" name="new_password" required>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" placeholder="Confirm password" name="confirm_password" required>
                                <div class="invalid-feedback">
                                    Valid input is required.
                                </div>
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                              <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
