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
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">OMF</a></li>
                            <li class="breadcrumb-item active">Borrowers list</li>
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
                                <h4><b>Borrowers list</b></h4>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Roll number</th>
                        <th>First name</th>
                        <th>middle name</th>
                        <th>Gender</th>
                        <th>Phone no</th>
                        <th>Balance</th>
                        <th>Statu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowers as $borrower)
                    <tr>
                        <td>{{ $borrower->roll_number }}</td>
                        <td>{{ $borrower->first_name }}</td>
                        <td>{{ $borrower->middle_name }}</td>
                        <td>{{ $borrower->borrower_gender }}</td>
                        <td>{{ $borrower->phone_number }}</td>
                        <td>{{ $borrower->borrowed_amount }}</td>
                        <td>{{ $borrower->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
