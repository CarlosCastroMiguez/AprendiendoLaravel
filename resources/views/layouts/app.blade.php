<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hospital Simulado') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.css">
    <link rel="stylesheet" href="fullcalendar/packages/core/main.css" />
    <link rel="stylesheet" href="fullcalendar/packages/daygrid/main.css" />
    <link rel="stylesheet" href="fullcalendar/packages/timegrid/main.css" />
    <link rel="stylesheet" href="fullcalendar/packages/list/main.css" />



</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Hospital Simulado') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @if(Auth()->check())
                    <ul class="navbar-nav mr-auto">
                        <form class="navbar-form">
                            <div class="form-group">
                                <select id="list-of-projects" class="form-control">
                                    @foreach(auth()->user()->list_of_projects as $project)
                                    <option value="{{ $project -> id }}" "@if($project->id == auth()->user()->selected_project_id) selected @endif"> {{ $project -> name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </form>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
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
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        @include('includes.menu')

                    </div>
                    <div class="col-md-9">
                        @yield('content')

                    </div>
                </div>
            </div>
        </main>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="/fullcalendar/packages/core/main.js"></script>
        
        <script src="/fullcalendar/packages/timegrid/main.js"></script>
        <script src="/fullcalendar/packages/daygrid/main.js"></script>
        <script src="/fullcalendar/packages/list/main.js"></script>
        
        <script src="/fullcalendar/packages/resource-common/main.js"></script>
        <script src="/fullcalendar/packages/resource-timegrid/main.js"></script>
        <script src="/fullcalendar/packages/resource-daygrid/main.js"></script>


        @yield('scripts')



</body>

</html>
