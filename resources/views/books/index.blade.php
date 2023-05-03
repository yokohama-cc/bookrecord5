@extends('layouts.app')
@section('content')
<div class="container">  
   <div class="row clearfix"> 
   <div class="col col-12 col-md-10 float-left">
    {!! Form::open(['url' => 'books/search']) !!}
	<div class="row">			
		<div class="form-group col-md-8 text-right ">		
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
	</div>	
	<div class="col col-md-1 form-group float-right">  
    	<a href="books/create" class="btn btn-sm btn-info form-control fload-right">追加</a>
    </div>
    </div>
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-primary row pl-2 pl-md-0">        		
        		<th scope="col" class="col-10 col-md-3">タイトル</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-2">著者</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-1">出版社</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-1">出版年</th>
        		<th scope="col" class="d-none d-md-table-cell col-md-2">ISBN番号</th>
        		<th class="d-md-table-cell col-1 col-md-2"></th>        		
      		</tr>
      		</thead>  
      		<tbody>    
@foreach ($books as $book)
        	<tr class="row pl-2 pl-md-0">          		
          		<td class="d-md-table-cell col-10 col-md-3">{{ $book->name }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $book->author }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $book->company }}</td>
          		<td class="d-none d-md-table-cell col-md-1">{{ $book->year_publication }}</td>
          		<td class="d-none d-md-table-cell col-md-2">{{ $book->isbn }}</td>
          		<td class="d-md-table-cell col-1 col-md-2">
          		<div class="row">
          		<div class="col d-block d-md-inline p-1 pl-md-1">
          		<a href="{{ url('books/'.$book->id) }}" class="btn btn-info btn-sm">詳細</a>
          		</div>
          		<div class="col d-block d-md-inline p-1 pl-md-1">
          		<a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-primary btn-sm">編集</a>          		
           		</div>
           		<div class=" col d-block d-md-inline p-1 pl-md-1">
           			{{Form::open(['route'=>['books.destroy',$book->id],'method'=>'DELETE'])}}
           			{{Form::submit('削除',['class' => 'btn btn-danger btn-sm'])}}
          			{{Form::close()}}
          		</div>
          		</div>
          		</td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  	</div>
</div>
@endsection
