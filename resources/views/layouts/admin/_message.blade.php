
{{--    <div class="alert alert-success">{{ session('message') }}</div>--}}

@if(session()->has('message'))
<div class="col-md-8">
    <div class="bs-component">
        <div class="alert alert-dismissible alert-success">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>{{ session('message')  }}</strong>
        </div>
    </div>
</div>
@endif
