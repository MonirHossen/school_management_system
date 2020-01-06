@extends('layouts.admin.master')

@section('title','Create User')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Admins</h1>
            <p>create new subject</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.subject.index') }}">subject's</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-12">
        <a href="{{ route('admin.subject.index') }}" class="btn btn-info btn-lg">Subject's List</a>
        <div class="tile mt-3">
            <h3 class="tile-title">Subject Create Form</h3>
            <div class="tile-body">
                <form class="row" method="post" action="{{ route('admin.subject.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.subject._form')
                    <div class="form-group col-md-4 align-self-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
