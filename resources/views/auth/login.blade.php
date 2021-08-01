<html>
<head>
    <title>OMF Login</title>
</head>
@extends('layouts.welcome_sider_nav')

@section('blogger_content')
<br/><br/>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                {{-- <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group offset-md-1">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-9">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group offset-lg-1">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-lg-9">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-block btn-default btn-lg">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}


  
      <div class="card-body">
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
            @if (Session::has('message'))
                <div class="alert alert-danger" >
                    {{ Session::get('message') }}
                </div>
            @endif

            @csrf
          <div class="col-md-11 mb-4">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" autofocus="autofocus" value="{{old('username')}}"required>
              <div class="invalid-feedback">
                Valid username  is required.
              </div>
          </div>

          <div class="col-md-11 mb-4">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" autofocus="autofocus" required>
              <div class="invalid-feedback">
                Please enter valid password.
              </div>
          </div>
          <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-block btn-default btn-lg">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
        </form>
      </div>
    </div>
            </div>
        </div>
    </div>
</div>
<script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

@endsection
