@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8">  
			<div class="card">
				<div class="card-header alert-danger">ID: {{ $reading_record->id }}</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-4 text-right">
   							本:
   						</div>
						<div class="form-group col-8">   
    						{{ $reading_record->book->name }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						読者:
    					</div>
 						<div class="form-group col-8">   
    						{{ $reading_record->reader->name }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						読書年月:
    					</div>
 						<div class="form-group col-8">   
    						{{ $reading_record->year_read.'/'.$reading_record->month_read }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    							感想:
    					</div>
 						<div class="form-group col-8">   
    						{{ $reading_record->report }}
						</div>
					</div>
				</div>
    		</div>
 		</div>
 	</div>
</div>
@endsection
