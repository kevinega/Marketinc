@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    <div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i>Transaction Management</h1>
    {{-- <a class="btn btn-default pull-right"> Hello,  <b> {{ Auth::guard('admin_users')->user()->name }} </b></a> --}}
    <a href="/logout" class="btn btn-default pull-right">Logout</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Brand Name</th>
                    <th>Transaction ID</th>
                    <th>Transaction Added</th>
                    <th>Valid Until</th>
                    <th>Confirmation Code</th>
                    <th>Flag</th>
                    <th>Payment</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    
                    <td>{{ $transaction->brand->brand_name }}</td>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $transaction->brand->valid_until }}</td>
                    <td>{{ $transaction->confirmation_code }}</td>
                    <td>{{ $transaction->flag }}</td>
                    <td>{{ $transaction->total_payment }}</td>
                    <td>
                        <a href="/unicorn/approve/{{ $transaction->id }}" class="btn btn-info pull-left" style="margin-right: 3px;">Approve</a>
                        <a href="/unicorn/delete/{{ $transaction->id }}" class="btn btn-danger pull-left" style="margin-right: 3px;">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>


    </div>
</div>
@endsection
