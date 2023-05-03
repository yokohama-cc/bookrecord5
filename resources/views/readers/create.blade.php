@extends('layouts.app')

@section('content')
{!! Form::open(['url' => 'readers']) !!} 
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8"> 
			<div class="card">
				<div class="card-header alert-danger">新規</div>
    			<div class="card-body">
					<div class="row">
						<div class="form-group col-5 text-right">
   							{!! Form::label('name', '名前:') !!}
   						</div>
						<div class="form-group col-5">   
    						{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('school_number', '学生番号:') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::text('school_number', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('class', 'クラス:') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::text('class', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class = "row">
 						<div class="col-5"></div>  
						<div class= "form-group col-5">
							{!! Form::submit('登録', ['class' => 'btn btn-primary btn-sm form-control']) !!}
						</div>
					</div>
				</div>
 			</div>
 		</div>
 	</div>
</div>
{!! Form::close() !!}
@endsection
