@extends('layouts.app')
@section('content')
<div class="container">  
    <div class="row justify-content-end">    
    	<a href="readers/create" class="btn btn-info">追加</a>
    </div>
    <div class="mt-2 row">
    	<table class="table table-striped">
      		<thead>
      		<tr class="table-info">
        		<th scope="col">ID</th>
        		<th scope="col">名前</th>
        		<th scope="col">入学年度</th>
        		<th scope="col">学生番号</th>
        		<th scope="col">所属</th>
        		<th scope="col">作成日時</th>
        		<th scope="col">更新日時</th>
        		<th></th>
        		<th></th>
        		<th></th>
      		</tr>
      		</thead>  
      		<tbody>    
@foreach ($readers as $reader)
        	<tr>
          		<td>{{ $reader->id}}</td>
          		<td>{{ $reader->name }}</td>
          		<td>{{ $reader->admission_year }}</td>
          		<td>{{ $reader->school_number }}</td>
          		<td>{{ $reader->department->name }}</td>
          		<td>{{ $reader->created_at }}</td>
          		<td>{{ $reader->updated_at }}</td>
          		<td><a href="readers/{{$reader->id}}" class="btn btn-info btn-sm">詳細</a></td>
          		<td><a href="readers/{{$reader->id}}/edit" class="btn btn-primary btn-sm">編集</a></td>
          		<td>
           			{{Form::open(['route'=>['readers.destroy',$reader->id],'method'=>'DELETE'])}}
           			{{Form::submit('削除',['class' => 'btn btn-danger btn-sm'])}}
          			{{Form::close()}}</td>
       		</tr>
    
@endforeach
    		</tbody>  
  		</table> 
  	</div>
</div>
@endsection
