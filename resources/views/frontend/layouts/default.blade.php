<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('frontend.includes.head')

  <body>
    <main>
     @include('frontend.includes.navbar')

<div id="artigos">
    @yield('conteudo')
</div>
    @include('frontend.includes.footer')

    </main>
       @include('frontend.includes.foot')

  </body>
</html>
