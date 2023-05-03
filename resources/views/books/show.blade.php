@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12 col-md-8"> 		   
			<div class="card">
				<div class="card-header alert-danger">ID: {{ $book->id }}</div>				
				<div class="card-body">
					<div class="row">
						<div class="form-group col-4 text-right">
   							タイトル:
   						</div>
						<div class="form-group col-8">   
    						{{ $book->name }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						著者:
    					</div>
 						<div class="form-group col-8">   
    						{{ $book->author }}    						
   						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						出版社:
    					</div>
 						<div class="form-group col-8">   
    						{{ $book->company }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    							出版年:
    					</div>
 						<div class="form-group col-8">   
    						{{ $book->year_publication }}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						ISBN番号:
    					</div>
 						<div class="form-group col-8">   
    						{{ $book->isbn }}
						</div>
					</div>
				</div>
    		</div>
 		</div>
 	</div>
</div>
@endsection
