@extends('layouts.admin.master')

@section('title','Edit Teacher')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Teacher</h1>
            <p>edit teacher info</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.teacher.index') }}">Teacher</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-12">
        <a href="{{ route('admin.teacher.index') }}" class="btn btn-info btn-lg">Teacher's List</a>
        <div class="tile mt-3">
            <h3 class="tile-title">Teacher Edit Form</h3>
            <div class="tile-body">
                <form class="form-horizontal" method="post" action="{{ route('admin.teacher.update',$teacher->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.teacher._form')
                    <div class="form-group row">
                        <div class="col-md-8 ml-2 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('admin.teacher.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

