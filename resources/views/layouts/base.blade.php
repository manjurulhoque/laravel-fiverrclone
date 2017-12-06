<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel Fiverr Clone</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="{{asset('js/app.js')}}"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('img/logo.jpg')}}" height="23">
                </a>
            </div>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" style="padding-right: 200px" class="form-control" placeholder="Find services">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">
                            Sell & Buy
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="">My Sellings</a></li>
                            <li><a href="">My Buyings</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('gigs.create') }}">Create a gig</a></li>
                            <li><a href="{{ route('my_gigs') }}">My Gigs</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div id="category">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="">Graphics & Design</a></li>
                <li><a href="">Digital Marketing</a></li>
                <li><a href="">Video & Animation</a></li>
                <li><a href="">Music & Audio</a></li>
                <li><a href="">Programming & Tech</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="body" style="margin-top: 10%">
    <div class="container">
        @include('layouts.messages')
        @yield('content')
    </div>
</div>

<footer id="footer">
    <div class="container">
        <span>Fiverr clone &copy; 2017</span>
    </div>
</footer>
</body>
</html>
