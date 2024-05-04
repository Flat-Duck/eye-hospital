<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" viewport-fit="cover">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta_tags')
    
    <title>NCTP-National Corneal Transplant Program</title>

    @vite('resources/js/app.js')
    @yield('styles')

    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css" integrity="sha512-tpsEzNMLQS7w9imFSjbEOHdZav3/aObSESAL1y5jyJDoICFF2YwEdAHOPdOr1t+h8hTzar0flphxR76pd0V1zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <body dir="rtl" class=" d-flex flex-column">
    <div class="page page-center">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="/img/logo-bx.png" width="110" height="48" alt="NCTP" class="navbar-brand-image" style="height: 4rem !important;">
          </a>
        </div>
        @yield('content')
      </div>
    </div>
    @stack('modals')

    @livewireScripts
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    @if (session()->has('success')) 
    <script>
        var notyf = new Notyf({dismissible: true})
        notyf.success('{{ session('success') }}')
    </script>
    @endif
    <script>
      function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
      </script>
  </body>
</html>