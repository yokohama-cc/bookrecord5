@extends('layouts.app')
@section('content')
<div class="container">  
    <div class="row justify-content-end">    
    	<a href="../books/create" class="btn btn-info">本を追加する</a>
    </div>
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-info">
        		<th scope="col">タイトル</th>
        		<th scope="col">著者</th>
        		<th scope="col">出版社</th>
        		<th scope="col">出版年</th>
        		<th scope="col">ISBN番号</th>
        		<th></th>
        		<th></th>
      		</tr>
      		</thead>  
      		<tbody>    
@foreach ($books as $book)
        	<tr>
          		<td>{{ $book->name }}</td>
          		<td>{{ $book->author }}</td>
          		<td>{{ $book->company }}</td>
          		<td>{{ $book->year_publication }}</td>
          		<td>{{ $book->isbn }}</td>
          		<td><a href="../reading_records/add/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を追加</a></td>
          		<td><a href="../reading_records/booklist/{{$book->id}}" class="btn btn-primary btn-sm">読書記録を見る</a></td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  	</div>
</div>
@endsection
