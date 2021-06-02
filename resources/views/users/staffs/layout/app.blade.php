<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KOADIT - @yield('title')</title>
    @include('users.staffs.layout.style')
    @yield('style')
</head>
<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('users.staffs.layout.navbar')
            <div class="main-content">

            @yield('content')

            </div>

@include('users.staffs.layout.footer')
        </div>
    </div>


    @include('users.staffs.layout.script')
    @yield('script')
</body>
</html>

