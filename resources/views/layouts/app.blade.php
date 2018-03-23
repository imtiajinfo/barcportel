<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Barc Portel</title>


    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css') }}">
    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
    @stack('css')
</head>
@php
    $number = array(1,2,3,4,5,6,7,8,9,10);
    $theme = array_rand($number);
@endphp
<body data-sa-theme="{{ $theme }}">
    <div id="app">
        <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>
            @if(Request::is('admin/*') || Request::is('student/*'))
                @include('layouts.partial.header')

                @include('layouts.partial.sidebar')

                <div class="themes">
                    <div class="scrollbar-inner">
                        <a href="#" class="themes__item active" data-sa-value="1"><img src="{{ asset('img/bg/1.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="2"><img src="{{ asset('img/bg/2.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="3"><img src="{{ asset('img/bg/3.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="4"><img src="{{ asset('img/bg/4.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="5"><img src="{{ asset('img/bg/5.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="6"><img src="{{ asset('img/bg/6.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="7"><img src="{{ asset('img/bg/7.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="8"><img src="{{ asset('img/bg/8.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="9"><img src="{{ asset('img/bg/9.jpg') }}" alt=""></a>
                        <a href="#" class="themes__item" data-sa-value="10"><img src="{{ asset('img/bg/10.jpg') }}" alt=""></a>
                    </div>
                </div>

                <section class="content">
                    @include('layouts.partial.msg')
                    @yield('content')

                    @include('layouts.partial.footer')
                </section>
            @else
                @yield('content')
            @endif
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Javascript -->
    <script src="{{ asset('vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js') }}"></script>
    <!-- Vendors -->
{{--    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>--}}
{{--    <script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>--}}
    {{--<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>--}}


    <!-- App functions and actions -->
    <script src="{{ asset('js/app.min.js') }}"></script>
@stack('script')
</body>
</html>
