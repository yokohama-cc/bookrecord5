@extends('layouts.app')
@section('content')
<div class="container"> 
{!! Form::open(['url' => 'reading_records/search','method' => 'get']) !!}
	<div class="row">			
		<div class="form-group col-md-1 text-right">		
		{!! Form::label('department_id', '所属:') !!}
		</div>
		<div class="form-group col-md-3 ">   
		{!! Form::select('department_id', $departments, $department_id, ['class' => 'form-control', 'dropdown-toggle']) !!}
		</div>	
		<div class="form-group col-md-4 text-right ">		
		{!! Form::label('param', '本のタイトルに含まれる文字を指定してください:') !!}
		</div>
		<div class="form-group col-md-3 ">   
		{!! Form::text('param', null, ['maxlength'=>255,'class' => 'form-control']) !!}
		</div> 						 
		<div class= "form-group col-md-1 ">
		{!! Form::submit('検索', ['class' => 'btn btn-primary btn-sm form-control']) !!}		
		</div>			
	</div>	
	{!! Form::close() !!}	
{!! Form::open(['url' => 'reading_records/searchbyreader','method' => 'get']) !!}
	<div class="row">			
		<div class="form-group col-md-4 text-left ">		
		{!! Form::label('paramreader', '読者に含まれる文字をを指定してください:') !!}
		</div>
		<div class="form-group col-md-3 ">   
		{!! Form::text('paramreader', null, ['maxlength'=>255,'class' => 'form-control']) !!}
		</div> 						 
		<div class= "form-group col-md-1 ">
		{!! Form::submit('読者検索', ['class' => 'btn btn-primary btn-sm form-control']) !!}		
		</div>			
	</div>	
	{!! Form::close() !!}	     
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-primary row pl-2 pl-md-0">           
        		<th scope="col" class="col-8 col-md-3">本</th>
        		<th scope="col" class="col-2 col-md-2">読者</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-1">読書年月</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-4">感想</th>           
        		<th class="d-md-table-cell col-1 col-md-2"></th>
      		</tr>
      		</thead>
      		 
      		<tbody>    
@foreach ($reading_records as $reading_record)
        	<tr class="row pl-2 pl-md-0">        	    
          		<td class="d-md-table-cell col-8 col-md-3">{{ $reading_record->book->name }}</td>
          		<td class="d-md-table-cell col-2 col-md-2">{{ $reading_record->reader->name }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $reading_record->year_read.'/'.$reading_record->month_read }}</td>
          		<td class="d-none d-md-table-cell col-md-4">{{ $reading_record->report }}</td>          
          		<td class="d-md-table-cell col-1 col-md-2">
          		<div class="row">
          		<div class="col d-block d-md-inline p-1 pl-md-1">
          		<a href="{{ url('/reading_records').'/'.$reading_record->id }}" class="btn btn-info btn-sm">詳細</a>
          		</div>
          		<div class="col d-block d-md-inline p-1 pl-md-1">
          		@can('update_and_delete', $reading_record)         			
          			<a href="{{ url('/reading_records').'/'.$reading_record->id.'/edit' }}" class="btn btn-primary btn-sm">編集</a>
          		@endcan
          		</div>
          		<div class="col d-block d-md-inline p-1 pl-md-1">
          		@can('update_and_delete', $reading_record)
           			{{Form::open(['route'=>['reading_records.destroy',$reading_record->id],'method'=>'DELETE'])}}
           			{{ Form::hidden('page', $reading_records->currentPage(), ['class' => 'form-control']) }}
           			{{Form::submit('削除',['class' => 'btn btn-danger btn-sm'])}}
          			{{Form::close()}}
          		@endcan	
          		</div>
          		</div>
          		</td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  		@if (isset($reading_records))
			{{ $reading_records->appends(Request::only('department_id','param'))->links() }}
		@endif
  	</div>
</div>
@endsection
