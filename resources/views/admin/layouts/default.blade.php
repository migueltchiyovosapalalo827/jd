<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('admin.includes.head')

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
     @include('admin.includes.navbar')
     @include('admin.includes.sidebar')

    @yield('content')

    @include('admin.includes.footer')

    </div>
       @include('admin.includes.foot')

  </body>
</html>
