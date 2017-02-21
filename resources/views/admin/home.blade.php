@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@php
if(Request::input('sort','asc') == 'asc'){
    $sort='desc';
}else{
    $sort='asc';
}
@endphp

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">

            <h1><i class="fa fa-users"></i>Transaction Management</h1>
            {!! Form::open([
                'url' => '/unicorn/logout',
                'name' => 'logout-form',
                'id' => 'logout-form',
            ]) !!}
            {!! Form::button('Log Out', [
                'type' => 'submit'
            ]) !!}
            {!! Form::close() !!}

            <div class="table-responsive">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Brand Name <a href="{{url('unicorn/transaction?orderBy=brand_name&sort=')}}{{$sort}}">sort</a></th>
                            <th>Transaction ID <a href="{{url('unicorn/transaction?orderBy=id&sort=')}}{{$sort}}">sort</a></th>
                            <th>Transaction Added <a href="{{url('unicorn/transaction?orderBy=created_at&sort=')}}{{$sort}}">sort</a></th>
                            <th>Valid Until <a href="{{url('unicorn/transaction?orderBy=valid_until&sort=')}}{{$sort}}">sort</a></th>
                            <th>Confirmation Code <a href="{{url('unicorn/transaction?orderBy=confirmation_code&sort=')}}{{$sort}}">sort</a></th>
                            <th>Flag <a href="{{url('unicorn/transaction?orderBy=flag&sort=')}}{{$sort}}">sort</a></th>
                            <th>Payment <a href="{{url('unicorn/transaction?orderBy=total_payment&sort=')}}{{$sort}}">sort</a></th>
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

                        {{ $transactions->links() }}
                    </tbody>
                </table>
                
            </div>
        </div>

    </div>
</div>
@endsection