@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">  
			<div class="card">
				<div class="card-header alert-danger">ID: {{ $user->id }}</div>				
				<div class="card-body">
				<div class="row">
						<div class="form-group col-5 text-right">
   							名前:
   						</div>
						<div class="form-group col-5">   
    						{{ $user->name }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
   							@lang('label.email')
   						</div>
						<div class="form-group col-5">   
    						{{ $user->email }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
   							ニックネーム:
   						</div>
						<div class="form-group col-5">   
    						{{ $user->reader->name }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						入学年度:
    					</div>
 						<div class="form-group col-5">   
    						{{ $user->reader->admission_year }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						学生番号:
    					</div>
 						<div class="form-group col-5">   
    						{{ $user->reader->school_number }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						所属:
    					</div>
 						<div class="form-group col-5">   
    						{{ $user->reader->department->name }}
						</div>
					</div>
				</div>
    		</div>
 		</div>
 	</div>
</div>
@endsection
