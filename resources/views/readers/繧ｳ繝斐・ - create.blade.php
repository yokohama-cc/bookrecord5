@extends('layouts.app')

@section('content')
<div class="container">   
<div class="panel panel-danger">
	<div class="panel-heading">
      　新規</div>
    {!! Form::open(['url' => 'readers']) !!}
        @include('readers.form')
    {!! Form::close() !!}
 </div>

@endsection
