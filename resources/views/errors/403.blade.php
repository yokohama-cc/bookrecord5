@extends('layouts.app')
@section('content')
 <div class="container">
	<div class="row justify-content-center">
		<div class="col-8">  
        	<div class="alert alert-danger">
            	{{ $exception->getMessage() }}
        	</div>
        </div>
	</div>
</div>
 @endsection