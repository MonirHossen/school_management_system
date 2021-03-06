@extends('layouts.admin.master')

@section('title','list of fee_type')

@push('css') @endpush

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Fee Types</h1>
            <p>all fee types list here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="">Fee Types</a></li>
        </ul>
    </div>
    @include('layouts.admin._message')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.fee_type.create') }}" class="btn btn-info btn-lg"> Add Fee Types</a>
            <div class="tile mt-3">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Fee Types</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($fee_types as $key=>$fee_type)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $fee_type->fee_type }}</td>
                                        <td>
                                            @if($fee_type->status == 'active')
                                                <i class="btn btn-sm btn-success">{{ strtoupper($fee_type->status) }}</i>
                                                @else
                                                <i class="btn btn-sm btn-warning">{{ strtoupper($fee_type->status) }}</i>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.fee_type.edit',$fee_type->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <form class="d-inline-block" action="{{route('admin.fee_type.destroy',$fee_type->id)}}" method="post">
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
