<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/build/assets/app.css')}}">
    <title>@yield('title')</title>


        <meta name="csrf-token" content="{{ csrf_token() }}">
{{--    <script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}
    {!! htmlScriptTagJsApi() !!}

</head>
<body class="body">
@include('Front.topmenu')

@yield('content')
@include('Front.footer')

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="/js/axios/dist/axios.min.js"></script>
<script src="{{asset('/js/app.js')}}" ></script>
<script src="{{asset('/js/api.js')}}"></script>

<script type="text/javascript" src="{{asset('/js/MainSlider.js')}}" ></script>
</body>
</html>
