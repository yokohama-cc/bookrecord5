@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-right">
    
    <a href="readers/create" class="btn btn-primary">追加</a>
    </div>
    <br>
    <table class="table table-striped">

      <tr>

        <th>ID</th>
        <th>名前</th>
        <th>学生番号</th>
        <th>クラス</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th></th>
        <th></th>
        <th></th>
      </tr>

            
@foreach ($readers as $reader)
      <tr>
 
          <td>{{ $reader->id}}</td>
          <td>{{ $reader->name }}</td>
          <td>{{ $reader->school_number }}</td>
          <td>{{ $reader->class }}</td>
          <td>{{ $reader->created_at }}</td>
          <td>{{ $reader->updated_at }}</td>
          <td><a href="reader/{{$reader}}" class="btn btn-primary btn-sm">詳細</a></td>
          <td><a href="reader/{{$reader}}/edit" class="btn btn-primary btn-sm">編集</a></td>
          <td>
           {{Form::open(['route'=>['readers.destroy',$reader],'method'=>'DELETE'])}}
           {{Form::submit('削除',['class' => 'btn btn-danger'])}}
           {{Form::close()}}</td>
      
      </tr>
@endforeach
 
    
  </table> 
 
   
    </div>
</div>
@endsection
