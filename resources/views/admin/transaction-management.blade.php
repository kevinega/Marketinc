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
                <input type="text" class="form-control" name="search" placeholder="Search by brand name">
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
                                    <th>
                                        <div class="table-header">
                                            <div>Brand Name</div>
                                            <a href="{{url('unicorn/transaction?orderBy=brand_name&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>    
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Transaction ID</div>
                                            <a href="{{url('unicorn/transaction?orderBy=id&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>    
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Date Added</div>
                                            <a href="{{url('unicorn/transaction?orderBy=created_at&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>    
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Valid Until</div>
                                            <a href="{{url('unicorn/transaction?orderBy=valid_until&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Confirmation Code</div>
                                            <a href="{{url('unicorn/transaction?orderBy=confirmation_code&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Approved By</div>
                                            <a href="{{url('unicorn/transaction?orderBy=flag&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>    
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Amount</div>
                                            <a href="{{url('unicorn/transaction?orderBy=total_payment&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th><div class="table-header"></div></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->brand->brand_name }}</td>
                                    <td>{{ $transaction->id }}</td>
                                    <td class="center">{{ $transaction->created_at->format('d M Y') }}</td>
                                    <td class="center">
                                        @if ($transaction->brand->valid_until=='0000-00-00 00:00:00')
                                        -
                                        @else
                                        {{ date('d M Y', strtotime($transaction->brand->valid_until)) }}
                                        @endif
                                    </td>
                                    <td class="center">
                                        @if ($transaction->confirmation_code == '')
                                        -
                                        @else
                                        {{ $transaction->confirmation_code }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaction->flag != '')
                                        {{ $transaction->flag }}
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>{{ $transaction->total_payment }}</td>
                                    <td class="row-buttons">
                                        <a href="/unicorn/approve/{{ $transaction->id }}" class="btn btn-success pull-right @if ($transaction->flag != '') disabled @endif" title="Approve"><i class="fa fa-check" aria-hidden="true"></i></a>
                                        <a href="/unicorn/delete/{{ $transaction->id }}" class="btn btn-danger pull-right" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
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