@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<div class="container-fluid">

    @php
    $url = url()->current();
    if (Request::input('sort','asc') == 'asc') {
        $sort='desc';
    } else {
        $sort='asc';
    }
    @endphp

    <div class="row">
        <div class="col-12">
            <h1><i class="fa fa-users"></i>Brand Management</h1>    
        </div>
    </div>

    <div class="row">
        <div class="col-12">
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

            @if($brands->total() == 0)
            <div class="alert alert-danger" role="alert">
                <strong>Oh snap!</strong> Brand not found. You may try another keyword.
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Brand Name<a href="{{url('unicorn?orderBy=brand_name&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></a></th>
                            <th>Valid Until<a href="{{url('unicorn?orderBy=valid_until&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></th>
                            {{-- <th>Status<a href="{{url('unicorn?orderBy=status&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></th> --}}
                            <th>Membership<a href="{{url('unicorn?orderBy=membership&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></th>
                            <th>Email Verification<a href="{{url('unicorn?orderBy=verified&sort=')}}{{$sort}}"><i class="fa fa-fw fa-sort"></i></th>
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
                            {{-- <td>{{ $brand->status }}</td> --}}
                            <td class="center uppercase">{{ $brand->membership }}</td>
                            <td class="center">
                                @if($brand->verified)
                                <span class="badge badge-primary">VERIFIED</span>
                                @else
                                <span class="badge badge-default">NOT VERIFIED</span>
                                @endif
                            </td>
                            <td>
                                <a href="/unicorn/reset/{{ $brand->id }}" class="btn btn-primary btn-block btn-sm" style="margin-right: 3px;"><strong>Reset Membership</strong></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $brands->links()}}
            @endif

        </div>
    </div>
</div>
@endsection