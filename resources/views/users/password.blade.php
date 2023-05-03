@extends('layouts.app')
@section('content')
@empty($user)
	{!! Form::open(['url' => 'users']) !!}
@endempty
@isset($user)
	{!! Form::model($user, ['method' => 'POST', 'url' => 'users/'.$user->id.'/password']) !!} 
@endisset
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">  
			<div class="card">
				<div class="card-header alert-danger">
                	@isset($user)
                  			変更 ID: {{ $user->id }}
                  		{!! Form::hidden('id', null, ['class' => 'form-control']) !!}	
                	@endisset
				</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-5 text-right">
   							{!! Form::label('name', '名前:') !!}
   						</div>
						<div class="form-group col-5">   
    						{!! Form::label('name',$user->name) !!}
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('old_password', '旧'.__('label.password').':') !!}
    						{!! Form::hidden('old',$user->password, ['class' => 'form-control']) !!}
    					</div>
 						<div class="form-group col-5">  						     
    						{!! Form::password('old_password', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('password', '新'.__('label.password').':') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::password('password', ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('password_confirmation', __('label.password-confirm').':') !!}
    					</div>
 						<div class="form-group col-5">
 						{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
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
@include('errors.list')
@endsection

