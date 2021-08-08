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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <p class="">Branch employees
                                </p>
                            </ol>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('admin.employee_registration') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add new employee
                                </a>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
        </div>
        <!-- /.card-header -->
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
                        <th>First name</th>
                        <th>middle name</th>
                        <th>Gender</th>
                        <th>Salary</th>
                        <th>Employee role</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th style="color: red">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->username }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->middle_name }}</td>
                        <td>{{ $employee->employee_gender }}</td>
                        <td>{{ $employee->employee_salary }}</td>
                        <td>{{ $employee->role_name }}</td>
                        <td>
                            <ol>
                                <li class="breadcrumb-item li-none"><a href="{{ url('admin/employee_detail/' . $employee->id) }}"><i class="fa fa-indent"></i></a>

                            </ol>
                        </td>
                        <td class="text-center">
                            <a href="{{ url('admin/edit_employee/' . $employee->id) }}">
                                <p class="fa fa-edit"></p>
                            </a>
                        </td>
                        <td class="text-center">
                            <form action="{{ url('admin/delete_employee/' . $employee->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete?')">
                                @method('delete')
                                @csrf
                                <button><i class="far fa-trash-alt" style="color: red;"></i></button>
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 @endsection

