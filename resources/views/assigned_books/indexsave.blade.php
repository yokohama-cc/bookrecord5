@extends('layouts.app')
@section('content')
<div class="container"> 
	{!! Form::open(['url' => 'assigned_books']) !!}
	<div class="row">
		<div class="form-group col-3 text-right">
		{!! Form::label('department_id', '指定:') !!}
		</div>
		<div class="form-group col-3">   
		{!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'dropdown-toggle']) !!}
		</div> 						 
		<div class= "form-group col-3">
		{!! Form::submit('選択', ['class' => 'btn btn-primary btn-sm form-control']) !!}
		</div>
	</div>	
	{!! Form::close() !!}
</div>
 @endsection
