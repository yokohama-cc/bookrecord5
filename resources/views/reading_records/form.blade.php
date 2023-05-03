@extends('layouts.app')
@section('content')
@empty($reading_record)
	{!! Form::open(['url' => 'reading_records']) !!}
@endempty
@isset($reading_record)
	{!! Form::model($reading_record, ['method' => 'PUT', 'route' => ['reading_records.update', $reading_record->id]]) !!} 
@endisset
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">  
			<div class="card">
					<div class="card-header alert-danger">
					@empty($reading_record)
				 		新規
					@endempty
                	@isset($reading_record)
                  			変更 ID: {{ $reading_record->id }}
                	@endisset
				</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-5 text-right">
   							{!! Form::label('book_id', '本:') !!}
   						</div>
						<div class="form-group col-5">   
    						{!! Form::select('book_id', $books, null, ['class' => 'form-control', 'dropdown-toggle']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('reader_id', '読者:') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::select('reader_id', $readers, null, ['class' => 'form-control', 'dropdown-toggle']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('yearmonth_read', '読書年月:') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::text('yearmonth_read', null, ['maxlength'=>6,'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-5 text-right">
    						{!! Form::label('report', '感想:') !!}
    					</div>
 						<div class="form-group col-5">   
    						{!! Form::textarea('report', null, ['maxlength'=>255,'class' => 'form-control']) !!}
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

