<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    
  </head>
  <body style="background-color: #F6F8FD">
    @include('includes.alternate-navbar')
    @yield('content')
    @include('includes.alternate-footer')
     

    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    @yield('script') 
  </body>
</html>