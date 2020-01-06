@extends('layouts.admin.master')

@section('title','Edit Subject')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>Subject</h1>
            <p>edit subject info</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.subject.index') }}">Subject</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-12">
        <a href="{{ route('admin.subject.index') }}" class="btn btn-info btn-lg">Subject's List</a>
        <div class="tile mt-3">
            <h3 class="tile-title">Subject Edit Form</h3>
            <div class="tile-body">
                <form class="form-row" method="post" action="{{ route('admin.subject.update',$subject->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.subject._form')
                    <div class="form-group col-md-4 align-self-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

