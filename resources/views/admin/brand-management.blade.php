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
        <div class="col-lg-10 col-lg-offset-1">

@php
$url = url()->current();
if(Request::input('sort','asc') == 'asc'){
    $sort='desc';
}else{
    $sort='asc';
}
@endphp

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
            <h1><i class="fa fa-users"></i>Brand Management</h1>
            @if($brands->total() == 0)
                BRAND NOT FOUND
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Brand Name<a href="{{url('unicorn?orderBy=brand_name&sort=')}}{{$sort}}">sort</a></th>
                            <th>Valid Until<a href="{{url('unicorn?orderBy=valid_until&sort=')}}{{$sort}}">sort</th>
                            <th>Status<a href="{{url('unicorn?orderBy=status&sort=')}}{{$sort}}">sort</th>
                            <th>Membership<a href="{{url('unicorn?orderBy=membership&sort=')}}{{$sort}}">sort</th>
                            <th>Email is Verified<a href="{{url('unicorn?orderBy=verified&sort=')}}{{$sort}}">sort</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $brand->brand_name }}</td>
                            <td>{{ $brand->valid_until }}</td>
                            <td>{{ $brand->status }}</td>
                            <td>{{ $brand->membership }}</td>
                            <td>
                                @if($brand->verified)
                                    Verified
                                @else
                                Not Verified
                                @endif
                            </td>
                            <td>
                                <a href="/unicorn/reset/{{ $brand->id }}" class="btn btn-danger pull-left" style="margin-right: 3px;">Reset Membership</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                {{ $brands->links()}}
            </div>
        </div>


    </div>
</div>
@endsection