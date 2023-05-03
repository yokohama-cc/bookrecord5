@extends('layouts.app')
@section('content')
<div class="container">  
    <div class="container"> 
	{!! Form::open(['url' => 'assigned_books']) !!}
	<div class="row">
		<div class="form-group col-3 text-right">
		{!! Form::label('department_id', '指定:') !!}
		</div>
		<div class="form-group col-3">   
		{!! Form::select('department_id', $departments, $department_id, ['class' => 'form-control', 'dropdown-toggle']) !!}
		</div> 						 
		<div class= "form-group col-3">
		{!! Form::submit('選択', ['class' => 'btn btn-primary btn-sm form-control']) !!}
		</div>
	</div>	
	{!! Form::close() !!}
</div>
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-primary">
        		<th scope="col">タイトル</th>
        		<th scope="col">著者</th>
        		<th scope="col">出版社</th>
        		<th scope="col">出版年</th>
        		<th scope="col">ISBN番号</th>
        		<th></th>
      		</tr>
      		</thead>  
      		<tbody> 
      		<tr>
		    <td colspan = "6" class="table-warning">
		    指定図書登録済み
		    </td>
		    </tr> 
@foreach ($assigned_books as $assigned_book)		    
        	<tr>
          		<td>{{ $assigned_book->book->name }}</td>
          		<td>{{ $assigned_book->book->author }}</td>
          		<td>{{ $assigned_book->book->company }}</td>
          		<td>{{ $assigned_book->book->year_publication }}</td>
          		<td>{{ $assigned_book->book->isbn }}</td>
          		<td>
           			{{Form::open(['route'=>['assigned_books.destroy',$assigned_book->id],'method'=>'DELETE'])}}
           			{!! Form::hidden('department_id', $department_id, ['class' => 'form-control']) !!}
           			{{Form::submit('削除',['class' => 'btn btn-danger btn-sm'])}}
          			{{Form::close()}}</td>
       		</tr>
    
@endforeach
			<tr>
			 <td colspan = "6" class="table-success">
		    指定図書未登録
		    </td>
		    </tr>
@foreach ($books as $book)

        	<tr>
          		<td>{{ $book->name }}</td>
          		<td>{{ $book->author }}</td>
          		<td>{{ $book->company }}</td>
          		<td>{{ $book->year_publication }}</td>
          		<td>{{ $book->isbn }}</td>
          		<td>
          		{!! Form::open(['method' => 'POST', 'url' => 'assigned_books/add/']) !!} 
          		{!! Form::hidden('department_id', $department_id, ['class' => 'form-control']) !!}
          		{!! Form::hidden('book_id', $book->id, ['class' => 'form-control']) !!}
           		{{Form::submit('追加',['class' => 'btn btn-primary btn-sm'])}}
          		{{Form::close()}}
          		</td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  	</div>
</div>

@endsection
