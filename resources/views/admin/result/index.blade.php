@extends('layouts.admin.master')

@section('title','list of result')

@push('css') @endpush

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>result's</h1>
            <p>all results list here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="">results</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
{{--            <div class="tile mt-3">--}}
{{--                <div class="tile-body">--}}
{{--                    <form class="row" action="" method="">--}}
{{--                        <div class="form-group col-md-3">--}}
{{--                            <label for="label" class="control-label">Label<span class="text-danger">*</span></label>--}}
{{--                            <select  name="label_id" id="label_id" class="form-control">--}}
{{--                                <option value="">--Select Label--</option>--}}
{{--                                @foreach($labels as $label)--}}
{{--                                    <option @if(old('label_id',isset($result->label_id) ? $result->label_id : null) == $label->id) selected @endif value="{{ $label->id }}">{{ $label->name }}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('label_id')--}}
{{--                            <span class="text-danger">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-md-12">
            <a href="{{ route('admin.result.create') }}" class="btn btn-info btn-lg"> Add result</a>
            <div class="tile mt-3">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Class</th>
                                <th>Registration</th>
                                <th>Name</th>
                                <th>Exam Type</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $key=>$result)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $result->label->name }}</td>
                                        <td>{{ $result->student->reg_code }}</td>
                                        <td>{{ $result->student->name }}</td>
                                        <td>{{ $result->exam->exam_type }}</td>
                                        <td>{{ $result->subject->name }}</td>
                                        <td>{{ $result->marks }}</td>
                                        <td>
                                            @if($result->status == 'active')
                                                <i class="btn btn-sm btn-success">{{ strtoupper($result->status) }}</i>
                                                @else
                                                <i class="btn btn-sm btn-warning">{{ strtoupper($result->status) }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.result.edit',$result->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline-block" action="{{route('admin.result.destroy',$result->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This result?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
        if(document.location.hostname == 'pratikborsadiya.in') {
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-72504830-1', 'auto');
            ga('send', 'pageview');
        }
    </script>
@endpush
