@extends('home')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Editar Instructor</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('instructores.index') }}">
Back</a>
</div>
</div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your
input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
{!! Form::model($instructor,['method'=> 'PATCH','route'=>['instructores.update', $instructor->id]]) !!}
@include('instructores.formedit')
{!! Form::close() !!}


@endsection
