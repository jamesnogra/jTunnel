<!DOCTYPE html>

<html>


    <head>
        <title>jTunnel - Free Trial SSH Tunnel - @yield('page-title')</title>
        <link rel="stylesheet" href="{{url('/css/mdl/material.min.css')}}">
        <link rel="stylesheet" href="{{url('/css/my.css')}}">
        <script src="{{url('/css/mdl/material.min.js')}}"></script>
        <script src="{{url('/js/jquery-1.12.1.min.js')}}"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        @yield('js-scripts')
    </head>


    <body>

    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <!-- Title -->
                <span class="mdl-layout-title">jTunnel</span>
                <!-- Add spacer, to align navigation to the right -->
                <div class="mdl-layout-spacer"></div>
                <!-- Navigation. We hide it in small screens. -->
                <nav class="mdl-navigation mdl-layout--large-screen-only">
                    <a class="mdl-navigation__link" href="{{action('UserController@index')}}">Features</a>
                    <a class="mdl-navigation__link" href="{{action('UserController@pricing')}}">Pricing</a>
                    <a class="mdl-navigation__link" href="{{action('UserController@installation')}}">Installation</a>
                    <a class="mdl-navigation__link" href="{{action('UserController@contact_us')}}">Contact Us</a>
                    <a class="mdl-navigation__link" href="{{action('UserController@about_us')}}">About Us</a>
                    @if (\Auth::check())
                        <a class="mdl-navigation__link" href="{{action('UserController@myTunnels')}}">My Tunnels</a>
                        <a class="mdl-navigation__link" href="{{action('UserController@logout')}}">Logout</a>
                    @endif
                    @if (!\Auth::check())
                        <a class="mdl-navigation__link" href="{{action('UserController@register')}}">Register</a>
                        <a class="mdl-navigation__link" href="{{action('UserController@login')}}">Login</a>
                    @endif
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">jTunnel</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="{{action('UserController@index')}}">Features</a>
                <a class="mdl-navigation__link" href="{{action('UserController@pricing')}}">Pricing</a>
                <a class="mdl-navigation__link" href="{{action('UserController@installation')}}">Installation</a>
                <a class="mdl-navigation__link" href="{{action('UserController@contact_us')}}">Contact Us</a>
                <a class="mdl-navigation__link" href="{{action('UserController@about_us')}}">About Us</a>
            </nav>
        </div>

        <main class="mdl-layout__content">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--1-col"></div>
                <div class="mdl-cell mdl-cell--10-col main-content">
                    @yield('main-content')
                </div>
                <div class="mdl-cell mdl-cell--1-col"></div>
            </div>
        </main>

    </div>

    <div class="main-footer">
        <div class="main-footer-contents">
            <a href="{{action('UserController@index')}}">Terms</a>  ·
            <a href="{{action('UserController@pricing')}}">Privacy</a> ·
            jTunnel © 2016
        </div>
    </div>

    </body>


</html>