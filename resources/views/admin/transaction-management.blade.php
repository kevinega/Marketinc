@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@php
$url = url()->current();
if(Request::input('sort','asc') == 'asc'){
    $sort='desc';
}else{
    $sort='asc';
}
@endphp

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            {!! Form::open(['method'=>'GET','url'=> $url,'class'=>'navbar-form navbar-left','role'=>'search'])  !!}
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default-sm" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            {!! Form::close() !!}
            <h1><i class="fa fa-users"></i>Transaction Management</h1>
            @if($transactions->total() == 0)
                TRANSACTION NOT FOUND
            @endif
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
</div> --}}

<div class="container-fluid">

    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav flex-column pl-1">
                <li class="nav-item"><a class="nav-link" href="{{ url('unicorn/home') }}">Brands</a></li>
                <li class="nav-item active"><a class="nav-link" href="{{ url('unicorn/transaction') }}">Transactions</a></li>
            </ul>
        </div>

        <div class="col-md-9 col-lg-10">
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-right"></i></button>
            </p>

            <h1>Transactions Management</h1>
            <hr>

            {!! Form::open(['method'=>'GET','url'=> $url,'class'=>'search-bar','role'=>'search'])  !!}
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default-sm" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
            {!! Form::close() !!}

            <div class="row mb-3">
                <div class="col-12">

                    @if ($transactions->total() == 0 && Request::input('sort') != '')
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong> Transaction not found. You may try another keyword.
                    </div>
                    @elseif ($transactions->total() == 0)
                    <div class="alert alert-info" role="alert">
                        There are no transactions to be displayed yet.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead class="thead-inverse">
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
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                    {{ $transactions->links()}}
                    @endif

                </div> <!-- col -->
            </div> <!-- row -->

        </div> <!-- col -->

    </div> <!-- row -->

</div> <!-- container-fluid -->
@endsection

@section('footer')
<footer class="footer">
    <div class="container"><span class="text-muted pull-right">© 2017 Marketinc</span></div>
</footer>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {

        $('[data-toggle=offcanvas]').click(function() {
            $('.row-offcanvas').toggleClass('active');
        });

    });
</script>
@endsection