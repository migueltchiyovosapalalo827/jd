<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('logo.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <link rel="stylesheet" href="{{  asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{  asset('admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{  asset('admin/assets/css/docs.css')}}">
    <link rel="stylesheet" href="{{  asset('admin/assets/css/highlighter.css')}}">
    <link rel="stylesheet" href="{{  asset('admin/assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- SweetAlert2 -->
      <link rel="stylesheet" href="{{asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
      <!-- Toastr -->
      <link rel="stylesheet" href="{{asset('admin/plugins/toastr/toastr.min.css')}}">
 <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
    @yield('css')
</head>
