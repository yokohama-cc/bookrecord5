@extends('layouts.app')
@section('content')
<div class="container">  
    
	{!! Form::open(['url' => 'assigned_books/search']) !!}
	<div class="row">			
		<div class="form-group col-md-1 text-right">		
		{!! Form::label('department_id', '指定:') !!}
		</div>
		<div class="form-group col-md-3 ">   
		{!! Form::select('department_id', $departments, $department_id, ['class' => 'form-control', 'dropdown-toggle']) !!}
		</div>	
		<div class="form-group col-md-4 text-right ">		
		{!! Form::label('param', 'タイトル、著者、出版社に含まれる文字を指定してください:') !!}
		</div>
		<div class="form-group col-md-3 ">   
		{!! Form::text('param', null, ['maxlength'=>255,'class' => 'form-control']) !!}
		</div> 						 
		<div class= "form-group col-md-1 ">
		{!! Form::submit('検索', ['class' => 'btn btn-primary btn-sm form-control']) !!}		
		</div>			
	</div>	 
	{!! Form::close() !!}	
    
    <div class="row">
    
    <div class="col">	
      		<div class="table-primary row lead p-1 mt-0 mb-0">
        		<div class="col-8 col-md-4">タイトル</div>
        		<div class="d-none d-md-table-cell col-md-2">著者</div>
        		<div class="d-none d-md-table-cell col-md-1">出版社</div>
        		<div class="d-none d-md-table-cell col-md-1">出版年</div>
        		<div class="d-none d-md-table-cell col-md-2">ISBN番号</div>
        		<div class="d-md-table-cell col-2 col-md-2"></div>
      		</div>

@isset($assigned_books)
      		 
      		<div class="table-warning row h5 p-1 mt-0 mb-0">
		    <div class="d-md-table-cell col-8 col-md-4">
		    指定図書
		    </div>
		    <div class="d-none d-md-table-cell col-md-2"></div>
		    <div class="d-none d-md-table-cell col-md-1"></div>
		    <div class="d-none d-md-table-cell col-md-1"></div>
		    <div class="d-none d-md-table-cell col-md-2"></div>
		    <div class="d-md-table-cell col-2 col-md-2"></div>
		    </div> 	    
@foreach ($assigned_books as $assigned_book)	
            @if ($loop->iteration % 2 == 0) 	    
        	<div class="row table-light">
        	@else
        	<div class="row table-active">
        	@endif
          		<div class="d-md-table-cell col-8 col-md-4">{{ $assigned_book->book->name }}</div>
          		<div class="d-none d-md-table-cell col-md-2">{{ $assigned_book->book->author }}</div>
          		<div class="d-none d-md-table-cell col-md-1">{{ $assigned_book->book->company }}</div>
          		<div class="d-none d-md-table-cell col-md-1">{{ $assigned_book->book->year_publication }}</div>
          		<div class="d-none d-md-table-cell col-md-2">{{ $assigned_book->book->isbn }}</div>
          		<div class="d-md-table-cell col-2 col-md-2">
          		<div class="d-block mt-1"><a href="../reading_records/add/{{$assigned_book->book_id}}" class="btn btn-primary btn-sm">読書記録を追加</a></div>
          		<div class="d-block mt-1 mb-1"><a href="../reading_records/booklist/{{$assigned_book->book_id}}" class="btn btn-primary btn-sm">読書記録を見る</a></div>
          		</div>
       	     </div>   
@endforeach	 
			<div class="table-success row h5 p-1 mt-0 mb-0">
			 <div class="d-md-table-cell col-8 col-md-4 ">
		    指定図書外
		    </div>
		    <div class="d-none d-md-table-cell col-md-2"></div>
		    <div class="d-none d-md-table-cell col-md-1"></div>
		    <div class="d-none d-md-table-cell col-md-1"></div>
		    <div class="d-none d-md-table-cell col-md-2"></div>
		    <div class="d-md-table-cell col-2 col-md-2"></div>	        
		    </div>
@endisset
@isset($books)			    
@foreach ($books as $book)
 @if ($loop->iteration % 2 == 0) 	    
        	<div class="row table-light">
        	@else
        	<div class="row table-active">
        	@endif        	
          		<div class="d-md-table-cell col-8 col-md-4">{{ $book->name }}</div>
          		<div class="d-none d-md-table-cell col-md-2">{{ $book->author }}</div>
          		<div class="d-none d-md-table-cell col-md-1">{{ $book->company }}</div>
          		<div class="d-none d-md-table-cell col-md-1">{{ $book->year_publication }}</div>
          		<div class="d-none d-md-table-cell col-md-2">{{ $book->isbn }}</div>
          		<div class="d-md-table-cell col-2 col-md-2">
          		<div class="d-block mt-1"><a href="../reading_records/add/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を追加</a></div>	
          		<div class="d-block mt-1 mb-1"><a href="../reading_records/booklist/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を見る</a></div>
          		</div>
          	</div>
    
@endforeach
@endisset
    	</div>	
    	
  		</div> 
  	

 
</div>

@endsection
