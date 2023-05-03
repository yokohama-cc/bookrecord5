@extends('layouts.app')
@section('content')
<div class="container">  
    <div class="row justify-content-end">    
    	<a href="users/create" class="btn btn-info">追加</a>
    </div>
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-info">
      			<th scope="col">名前</th>
        		<th scope="col">@lang('label.email')</th>        		
        		<th scope="col">ニックネーム</th>
        		<th scope="col">入学年度</th>
        		<th scope="col">学生番号</th>
        		<th scope="col">所属</th>        		
        		<th></th>
        		<th></th>
        		<th></th>
      		</tr>
      		</thead>  
      		<tbody>    
@foreach ($users as $user)
        	<tr>
        	    <td>{{ $user->name }}</td>
          		<td>{{ $user->email }}</td>
          		<td>{{ $user->reader->name }}</td>
          		<td>{{ $user->reader->admission_year }}</td>
          		<td>{{ $user->reader->school_number }}</td>
          		<td>{{ $user->reader->department->name }}</td>
          		<td><a href="users/{{$user->id}}" class="btn btn-info btn-sm">詳細</a></td>
          		<td><a href="users/{{$user->id}}/edit" class="btn btn-primary btn-sm">編集</a></td>
          		<td>
           			{{Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE'])}}
           			{{Form::submit('削除',['class' => 'btn btn-danger btn-sm'])}}
          			{{Form::close()}}</td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  	</div>
</div>
@endsection
