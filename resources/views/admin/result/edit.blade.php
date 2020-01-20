@extends('layouts.admin.master')

@section('title','Edit result')

@push('css')
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
@endpush
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>result</h1>
            <p>edit result info</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.result.index') }}">result</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="col-md-12">
        <a href="{{ route('admin.result.index') }}" class="btn btn-info btn-lg">result's List</a>
        <div class="tile mt-3">
            <h3 class="tile-title">result Edit Form</h3>
            <div class="tile-body">
                <form class="form-row" method="post" action="{{ route('admin.result.update',$result->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.result._form')
                    <div class="form-group col-md-4 align-self-end">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change','#label_id',function () {
                // console.log('text is change');
                let label_id = $(this).val();
                let div=$(this).parent();
                // console.log(label_id);
                let op = " ";
                $.ajax({
                    type:'GET',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getStudent') !!}',
                    data:{'id':label_id},
                    success:function (data) {
                        op+='<option value="0" selected disabled>Select Student</option>';
                        for(let i=0;i<data.length;i++)
                        {
                                op += '<option  value="' + data[i].id + '">' + data[i].name + '</option>';

                        }
                        $('#student_id').html(" ");
                        $('#student_id').append(op);

                    },
                    error:function () {

                    },
                });
            });
        });



        $(document).ready(function () {
            $(document).on('change','#label_id',function () {
                // console.log('text is change');
                let label_id = $(this).val();
                let div=$(this).parent();
                // console.log(label_id);
                let op = " ";
                $.ajax({
                    type:'GET',
                    url: '{!! \Illuminate\Support\Facades\URL::to('getSubject') !!}',
                    data:{'id':label_id},
                    success:function (data) {
                        op+='<option value="0" selected disabled>Select Subject</option>';
                        for(let i=0;i<data.length;i++)
                        {
                            op += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                        }
                        $('#subject_id').html(" ");
                        $('#subject_id').append(op);

                    },
                    error:function () {

                    },
                });
            });
        });
    </script>
@endpush
