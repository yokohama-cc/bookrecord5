<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>			

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav mr-auto nav nav-tabs">
 						<li class="nav-item  ">
 						@if (Request::url() === url('assigned_books/list'))
    						<a class="nav-link list-group-item-danger" href="{{ url('assigned_books/list') }}">読書記録を作成する</a>
 						@else  
    						<a class="nav-link" href="{{ url('assigned_books/list') }}">読書記録を作成する</a>   
 						@endif  
						</li>
						<li class="nav-item  ">
						@if (Request::url() === url('reading_records/readerlist'))
   							<a class="nav-link list-group-item-danger" href="{{ url('reading_records/readerlist') }}">読書記録を見る</a>
 						@else
    						<a class="nav-link" href="{{ url('reading_records/readerlist') }}">読書記録を見る</a>
						@endif    
  						</li>
  						<li class="nav-item  ">
  						@if (Request::url() === url('books'))
  							<a class="nav-link list-group-item-danger" href="{{ url('books') }}">本を登録・変更する</a>
  						@else
    						<a class="nav-link" href="{{ url('books') }}">本を登録・変更する</a>
    					@endif
 						 </li>
 						 @if (Auth::user()->isSystemAdmin())
 						 <li class="nav-item ">
  							@if (Request::url() === url('assigned_books'))
  							<a href="{{ url('assigned_books') }}" class="nav-link list-group-item-danger">指定図書登録</a>
  							@else	
  							<a class="nav-link" href="{{ url('assigned_books') }}">指定図書登録</a>
  							@endif 
  							</li>
						@endif  
                    </ul>
					@endauth
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">@lang('label.login')</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">@lang('label.header_register')</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        @lang('label.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

        
            @yield('content')
        </main>
    </div>
   <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
