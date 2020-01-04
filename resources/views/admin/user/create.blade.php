@extends('layouts.admin.master')

@section('title','Create User')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Admins</h1>
            <p>create new admin</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">admins</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-8">
        <div class="tile">
            <h3 class="tile-title">Admin Registration Form</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.user._form')
                    <div class="form-group row">
                        <div class="col-md-8 ml-5 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('admin.dashboard') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
{{--            <div class="tile-footer">--}}
{{--                --}}
{{--            </div>--}}
        </div>
    </div>
@endsection
