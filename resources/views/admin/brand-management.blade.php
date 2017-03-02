@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@php
$url = url()->current();
if (Request::input('sort','asc') == 'asc') {
    $sort='desc';
} else {
    $sort='asc';
}
@endphp

@section('content')
<div class="container-fluid">

    <div class="row row-offcanvas row-offcanvas-left">

        <div class="col-md-3 col-lg-2 sidebar-offcanvas" id="sidebar" role="navigation">
            <ul class="nav flex-column pl-1">
                <li class="nav-item active"><a class="nav-link" href="{{ url('unicorn/home') }}">Brands</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('unicorn/transaction') }}">Transactions</a></li>
            </ul>
        </div>

        <div class="col-md-9 col-lg-10">
            <p class="hidden-md-up">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas"><i class="fa fa-chevron-right"></i></button>
            </p>

            <h1>Brands Management</h1>
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

                    @if ($brands->total() == 0 && Request::input('sort') != '')
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong> Brand not found. You may try another keyword.
                    </div>
                    @elseif ($brands->total() == 0)
                    <div class="alert alert-info" role="alert">
                        There are no brands to be displayed yet.
                    </div>
                    @else
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>
                                        <div class="table-header">
                                            <div>Brand Name</div>
                                            <a href="{{url('unicorn?orderBy=brand_name&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Valid Until</div>
                                            <a href="{{url('unicorn?orderBy=valid_until&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>

                                    <th>
                                        <div class="table-header">
                                            <div>Membership</div>
                                            <a href="{{url('unicorn?orderBy=membership&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="table-header">
                                            <div>Email Verification</div>
                                            <a href="{{url('unicorn?orderBy=verified&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a>
                                        </div>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td class="center">
                                        @if ($brand->valid_until=='0000-00-00 00:00:00')
                                        -
                                        @else
                                        {{ date('d F Y', strtotime($brand->valid_until)) }}
                                        @endif
                                    </td>
                                    <td class="center uppercase">{{ $brand->membership }}</td>
                                    <td class="center">
                                        @if($brand->verified)
                                        <span class="badge badge-primary">VERIFIED</span>
                                        @else
                                        <span class="badge badge-default">NOT VERIFIED</span>
                                        @endif
                                    </td>
                                    <td class="row-buttons">
                                        <a href="/unicorn/reset/{{ $brand->id }}" class="btn btn-primary btn-block btn-sm" style="margin-right: 3px;"><strong>Reset Membership</strong></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                    {{ $brands->links()}}

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