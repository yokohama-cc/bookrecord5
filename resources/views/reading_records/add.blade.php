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
		<div class="col-12 col-md-8">  
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
						<div class="form-group col-4 text-right">
   							{!! Form::label('book_id', '本:') !!}
   						</div>
						<div class="form-group col-6">   
						    {!! Form::label('book_name', $book->name) !!}
    						{!! Form::hidden('book_id',$book->id) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('reader_id', '読者:') !!}
    					</div>
 						<div class="form-group col-6">   
    						{!! Form::label('reader_name', $reader->name) !!}
    						{!! Form::hidden('reader_id',$reader->id) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('yearmonth_read', '読書年:') !!}
    					</div>
    					<div class="form-group col-4">   
    					{!! Form::selectRange('year_read', date("Y"), date("Y")-10,null,  ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-1 text-left col-form-label">年</div>
					</div>
					<div class="row">
						
						<div class="form-group col-4 text-right">						
    						{!! Form::label('yearmonth_read', '読書月:') !!}
    					</div>
 						<div class="form-group col-4"> 
    						{!! Form::selectRange('month_read',1,12,null,['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-1 text-left col-form-label">月</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('report', '感想:') !!}
    					</div>
 						<div class="form-group col-8">   
    						{!! Form::textarea('report', null, ['maxlength'=>255,'class' => 'form-control']) !!}
						</div>
					</div>
					<div class = "row">
 						<div class="col-4"></div>  
						<div class= "form-group col-6">
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

