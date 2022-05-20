@extends('plantilla')

@section('content')
@if($success)
<div class="alert alert-success">
    <h1>{{ $message }} </h1>
</div>
@else
<div class="alert alert-danger">
    <h1>{{ $message }} </h1>
</div>
@endif
@endsection