@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('label.header_register')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('label.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">@lang('label.email')</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('label.password')</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('label.password-confirm')</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                        </div>
                        
                        <div class="row">
						<div class="form-group col-md-4 text-right">
   							{!! Form::label('name', 'ニックネーム',['class' => 'col-form-label']) !!}
   						</div>
						<div class="form-group col-md-6">   
    						{!! Form::text('reader_name', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-4 text-right">
   							{!! Form::label('admission_year', '入学年度',['class' => 'col-form-label']) !!}
   						</div>
						<div class="form-group col-md-6">   
    						{!! Form::selectRange('admission_year', date('Y')-10, date('Y'), date('Y'), ['class' => 'form-control']) !!}
						</div>
						<div class="form-group col-1 text-left col-form-label">年</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('school_number', '学生番号',['class' => 'col-form-label']) !!}
    					</div>
 						<div class="form-group col-6">   
    						{!! Form::text('school_number', null, ['class' => 'form-control']) !!}
						</div>
					</div>
					<div class="row">
						<div class="form-group col-4 text-right">
    						{!! Form::label('department_id', '所属') !!}
    					</div>
 						<div class="form-group col-6">   
    						{!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'dropdown-toggle']) !!}
						</div>
					</div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('label.register')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('errors.list')
@endsection
