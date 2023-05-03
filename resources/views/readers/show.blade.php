@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">  
			<div class="card">
				<div class="card-header alert-danger">ID: {{ $reader->id }}</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-5 text-right">
   							名前:
   						</div>
						<div class="form-group col-5">   
    						{{ $reader->name }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						入学年度:
    					</div>
 						<div class="form-group col-5">   
    						{{ $reader->admission_year }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						学生番号:
    					</div>
 						<div class="form-group col-5">   
    						{{ $reader->school_number }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						所属:
    					</div>
 						<div class="form-group col-5">   
    						{{ $reader->department->name }}
						</div>
					</div>
				</div>
    		</div>
 		</div>
 	</div>
</div>
@endsection
