<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js" integrity="sha256-egVvxkq6UBCQyKzRBrDHu8miZ5FOaVrjSqQqauKglKc=" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Styles -->
    {{-- <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />


     {{-- Font Awesome i.e  i class="fa fa-user"  ko style app.css ko suru mai styling gareko chu --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CRM') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        
                           
                                @if(Request::segment(1) === 'admin')
                                    <a class="nav-link" style="color:white" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                                    <li class="nav-item">
                                            <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>   
                                   
                                @elseif(Request::segment(1) === 'login')
                                    <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    <li class="nav-item">
                                            <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @elseif(Route::has('login'))
                                
                                    @if(Auth::guard('user')->check())
                                            <a style="color: white; margin-top: 8px;" href="{{ route('user.dashboard') }}"><i class="fa fa-user"> Dasboard</i></a>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" style="color:white" href="{{ route('user.settings') }}">Settings</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{Auth::guard('user')->user()->first_name}} <span class="caret"></span>
                                            </a>
                        
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    
                                    @elseif(Auth::guard('admin')->check())
                                        <a style="color: white; margin-top: 8px;" href="{{ route('admin.dashboard') }}"><i class="fa fa-user"> Admin</i></a>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" style="color:white" href="{{ route('admin.product') }}">Products</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{Auth::guard('admin')->user()->first_name}} <span class="caret"></span>
                                            </a>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>

                                    @else
                                        <a class="nav-link" style="color:white" href="{{ route('login') }}">{{ __('Login') }}</a>
                
                                        @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" style="color:white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                        @endif
                                    @endif

                                @endif
                            

                                {{-- @if (Route::has('register'))
                            
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    
                                @endif --}}
                            
                            

                        @else
                                
                                
                                @if( auth()->user()->role->nickname == 'user' )
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:white" href="{{ route('user.settings') }}">Settings</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->first_name }} <span class="caret"></span>
                                        </a>
                    
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @else 
                                    
                                        <a style="color: white; margin-top: 8px;" href="{{ route('admin.customers') }}"><i class="fa fa-users"> Customers</i></a>
                                        {{-- <a class="nav-link" style="color:white" href="#">Customers</a> --}}
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" style="color:white" href="{{ route('admin.product') }}">Products</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->first_name }} <span class="caret"></span>
                                        </a>
                                        
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endif
                    
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    
    
                                @yield('body')
       
        
    
</body>

</html>
