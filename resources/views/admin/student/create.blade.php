@extends('layouts.admin.master')

@section('title','Create New Student')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Students </h1>
            <p>create new student</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.student.index') }}">student's</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-12">
        <a href="{{ route('admin.student.index') }}" class="btn btn-info btn-lg">Student's List</a>
        <div class="tile mt-3">
            <h3 class="tile-title">Student Create Form</h3>
            <div class="tile-body">
                <form class="row" method="post" action="{{ route('admin.student.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('admin.student._form')
                    <div class="form-group col-md-4 align-self-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Student</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script type="text/javascript">
        $(function() {
            $('#session').datepicker( {
                yearRange: "c-100:c",
                changeMonth: false,
                changeYear: true,
                showButtonPanel: true,
                closeText:'Select',
                currentText: 'This year',
                onClose: function(dateText, inst) {
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).val($.datepicker.formatDate('yy', new Date(year, 1, 1)));
                }
            }).focus(function () {
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
                $(".ui-datepicker-current").hide();
                $(".ui-datepicker-prev").hide();
                $(".ui-datepicker-next").hide();
                $("#ui-datepicker-div").position({
                    my: "left top",
                    at: "left bottom",
                    of: $(this)
                });
            }).attr("readonly", false);
        });
    </script>
@endpush
