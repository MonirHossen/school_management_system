@extends('layouts.admin.master')

@section('title','list of teacher')

@push('css') @endpush

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Teacher's</h1>
            <p>all teachers list here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="">teachers</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.teacher.create') }}" class="btn btn-info btn-lg"> Add Teacher</a>
            <div class="tile mt-3">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Salary</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $key=>$teacher)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->designation }}</td>
                                        <td>{{ $teacher->salary }}</td>
                                        <td>
                                            @if($teacher->image !=null)
                                                <img src="{{ asset($teacher->image) }}" style="width: 50px;height: 50px;" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.teacher.edit',$teacher->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline-block" action="{{route('admin.teacher.destroy',$teacher->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Delete This User?')"><i class="fa fa-trash"></i></button>
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
