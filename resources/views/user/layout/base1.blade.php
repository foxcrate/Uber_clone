<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Setting::get('site_title','Imcanat')}} - @yield('title') - User Dashboard</title>
{{--    <link rel="shortcut icon" type="image/png" href="{{ url('/').Setting::get('site_icon') }}"/>--}}
      <link style="float: right" rel="shortcut icon" type="image/png" href="{{ url('/').Setting::get('site_icon') }}"/>

    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/slick.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('asset/css/slick-theme.css')}}"/>
    <link href="{{asset('asset/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/bootstrap-timepicker.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/dashboard-style.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body>

    @include('user.include.header')

    <div class="page-content dashboard-page">    
        <div class="container">
            
            @yield('content')

        </div>
    </div>


    @include('user.include.footer')


    <script src="{{asset('asset/js/jquery.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>       
    <script type="text/javascript" src="{{asset('asset/js/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('asset/js/jquery-migrate-1.2.1.min.js')}}"></script> 
    <script type="text/javascript" src="{{asset('asset/js/slick.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('asset/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('asset/js/dashboard-scripts.js')}}"></script>

    @yield('scripts')
    
</body>
</html>