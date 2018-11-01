<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script
            src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>
<div class="container">
        <div class="loginBox nav navbar-nav pull-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
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
            @endguest</div>

    <div>
        <h1>Welcome to blog</h1>
    </div>



    {{--<nav class="navbar navbar-default">--}}
        <div class="container-fluid">
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="" class="dropdown-toggle" data-toggle="dropdown">Sort Posts By <span class="caret"></span></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="">Top 10 Resent Posts</a></li>--}}
                        {{--<li><a href="">Top 10 Liked Posts</a></li>--}}
                        {{--<li><a href="">Top 10 Most Commented Posts</a></li>--}}
                        {{--<li><a href="">Top 10 Most Visited Posts</a></li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href={{ route('posts.index') }}">Manage Blog Posts</a></li>
                </ul>
            @endif

                                </div>

                            </nav>

                            <div>
                                <h2>Blogs</h2>

                                @yield('content')

                                <div class="footer text-center" style="margin:  20px 0 60px 0;">
                        <p>&copy; Begin Programing</p>
        </div>
</div>
</body>
</html>