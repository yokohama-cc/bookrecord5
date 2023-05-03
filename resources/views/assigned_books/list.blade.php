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
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-primary row pl-2 pl-md-0">
        		<th scope="col" class="col-8 col-md-4">タイトル</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-2">著者</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-1">出版社</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-1">出版年</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-2">ISBN番号</th>
        		<th class="d-md-table-cell col-4 col-md-2"></th>
      		</tr>
      		
@isset($assigned_books)	      		 
      		<tr class="table-warning row pl-2 pl-md-0">
		    <td class="d-md-table-cell col-8 col-md-4">
		    指定図書
		    </td>
		    <td class="d-none d-md-table-cell col-md-2"></td>
		    <td class="d-none d-md-table-cell col-md-1"></td>
		    <td class="d-none d-md-table-cell col-md-1"></td>
		    <td class="d-none d-md-table-cell col-md-2"></td>
		    <td class="d-md-table-cell col-4 col-md-2"></td>
		    </tr> 
		    </thead>  
      		<tbody>	    
@foreach ($assigned_books as $assigned_book)		    
        	<tr class="row pl-2 pl-md-0">
          		<td class="d-md-table-cell col-8 col-md-4">{{ $assigned_book->book->name }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $assigned_book->book->author }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $assigned_book->book->company }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $assigned_book->book->year_publication }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $assigned_book->book->isbn }}</td>
          		<td class="d-md-table-cell col-4 col-md-2">
          		<div class="d-block m-1"><a href="../reading_records/add/{{$assigned_book->book_id}}" class="btn btn-primary btn-sm">読書記録を追加</a></div>
          		<div class="d-block m-1"><a href="../reading_records/booklist/{{$assigned_book->book_id}}" class="btn btn-primary btn-sm">読書記録を見る</a></div>
          		</td>
       	     </tr>   
@endforeach	 
			<tr class="table-success row pl-2 pl-md-0">
			 <td class="d-md-table-cell col-8 col-md-4">
		    指定図書外
		    </td>
		    <td class="d-none d-md-table-cell col-md-2"></td>
		    <td class="d-none d-md-table-cell col-md-1"></td>
		    <td class="d-none d-md-table-cell col-md-1"></td>
		    <td class="d-none d-md-table-cell col-md-2"></td>
		    <td class="d-md-table-cell col-4 col-md-2"></td>	        
		    </tr>
@endisset
@isset($books)			    
@foreach ($books as $book)

        	<tr class="row pl-2 pl-md-0">
          		<td class="d-md-table-cell col-8 col-md-4">{{ $book->name }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $book->author }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $book->company }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $book->year_publication }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $book->isbn }}</td>
          		<td class="d-md-table-cell col-4 col-md-2">
          		<div class="d-block m-1"><a href="../reading_records/add/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を追加</a></div>	
          		<div class="d-block m-1"><a href="../reading_records/booklist/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を見る</a>
          		</td>
       		</tr>
    
@endforeach
@endisset
    		</tbody>  
  		</table> 
  	</div>
</div>

@endsection
