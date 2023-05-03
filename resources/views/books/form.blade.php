@extends('layouts.app')
@section('content')
@empty($book)
	{!! Form::open(['url' => 'books']) !!}
@endempty
@isset($book)
	{!! Form::model($book, ['method' => 'PUT', 'route' => ['books.update', $book->id]]) !!} 
@endisset
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8"> 
		<a href="https://books.google.co.jp/bkshp?hl=ja&tab=pp" target="_blank" class="list-group-item list-group-item-action list-group-item-info">Google Books</a>		
		<a href="http://iss.ndl.go.jp/" target="_blank" class="list-group-item list-group-item-action list-group-item-primary">国立国会図書館サーチ</a> 
		<a href="https://mall.seikyou.ne.jp/shop/WFISBNConverter.aspx?sid=3&l=1" target="_blank" class="list-group-item list-group-item-action list-group-item-warning">ISBN13桁変換ツール</a> 
			<div class="card">
					<div class="card-header alert-danger">
					@empty($book)
				 		新規
					@endempty
                	@isset($book)
                  			変更 ID: {{ $book->id }}
                  		{!! Form::hidden('id', null, ['class' => 'form-control']) !!}	
                	@endisset
				</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-4 text-right">
   							{!! Form::label('name', 'タイトル:') !!}
   						</div>
						<div class="form-group col-8">   
    						{!! Form::text('name', null, ['maxlength'=>255,'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('author', '著者:') !!}
    					</div>
 						<div class="form-group col-8">   
    						{!! Form::text('author', null, ['maxlength'=>255,'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('company', '出版社:') !!}
    					</div>
 						<div class="form-group col-8">   
    						{!! Form::text('company', null, ['maxlength'=>255,'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('year_publication', '出版年:') !!}
    					</div>
    					<div class="form-group col-4">   
    						{!! Form::selectRange('year_publication',  date('Y'),date('Y')-100, null, ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-1 text-left col-form-label">年</div>
 					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('isbn', 'ISBN番号:') !!}
    					</div>
 						<div class="form-group col-8">   
    						{!! Form::text('isbn', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class = "row">
 						<div class="col-4"></div>  
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

