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
                            <li class="breadcrumb-item active">Employees list</li>
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

    {{-- Datatable --}}
    <div class="card">
        <div class="card-header">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-left">
                                <p class="">Branch users
                                </p>
                            </ol>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('admin.change_user_password_form') }}" class="btn btn-success"><i class="fas fa-plus"></i> Reset user password
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
                        <th>Username</th>
                        <th>Full name</th>
                        <th>Employee role</th>
                        <th>Reset password</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->first_name .' '.$user->middle_name.' '.$user->last_name}}</td>
                        <td>{{ $user->role_name }}</td>
                        <td class="text-center">
                            <form action="{{ url('admin/reset_user_password/' . $user->employee_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to reset this user password?')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-secondary">Reset password</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
 @endsection


