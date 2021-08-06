<title>OMF- Empolyee detail</title>
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
                            <li class="breadcrumb-item active">Employee detail</li>
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
<hr>
    <section>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5">
                <div>
                    <img src="{{ asset('uploads/employee_photo/'.$employee->employee_photo) }}" alt="Employee photo">
                </div>
                <div>
                    <label for="first_name">First name</label>
                    <input type="di">
                </div>
            </div>
            <div class="col-md-2">
                md-2
            </div>
            <div class="col-md-4" >
                md-4
            </div>
        </div>
    </section>
@endsection
