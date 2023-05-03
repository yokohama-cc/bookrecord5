@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="list-group">
  <a href="assigned_books/list" class="list-group-item list-group-item-action list-group-item-primary">読書記録を作成する</a>
  <a href="reading_records/readerlist" class="list-group-item list-group-item-action list-group-item-secondary">読書記録を見る</a>
  <a href="books" class="list-group-item list-group-item-action list-group-item-success">本を登録・変更する</a>
  <a href="users/{{$user_id}}/edit_password" class="list-group-item list-group-item-action list-group-item-danger">パスワードを変更する</a>
  <a href="users/{{$user_id}}/edit" class="list-group-item list-group-item-action list-group-item-warning">ユーザ情報を確認・変更する</a>

</div>
		</div>
	</div>
@if (Auth::user()->isSystemAdmin())
	 <div class="row justify-content-center">
     	<div class="col-md-8">
       		<div class="p-2"></div>
        	<div class="card">       
  				<div class="card-header">
    					管理者機能
  				</div>
  				<div class="list-group">
  					<a href="assigned_books" class="list-group-item list-group-item-action list-group-item-primary">指定図書登録</a>
  					<a href="users" class="list-group-item list-group-item-action list-group-item-secondary">ユーザ情報管理</a>
 				</div>
			</div>
		</div>
	</div>
@endif
</div>
@endsection
