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

            <h1><i class="fa fa-users"></i>Brand Management</h1>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Valid Until</th>
                            <th>Status</th>
                            <th>Membership</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                            @if($brand->verified)
                            <td>{{ $brand->brand_name }}</td>
                            <td>{{ $brand->valid_until }}</td>
                            <td>{{ $brand->status }}</td>
                            <td>{{ $brand->membership }}</td>
                            <td>
                                <a href="/unicorn/reset/{{ $brand->id }}" class="btn btn-danger pull-left" style="margin-right: 3px;">Reset Membership</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>


    </div>
</div>
@endsection