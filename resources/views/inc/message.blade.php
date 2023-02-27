@if(session()->has('message'))
<div class="alert alert-success">
  {{session()->get('message')}}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
  {{session()->get('error')}}
</div>
@endif

@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}
</div>
@endforeach
@endif
