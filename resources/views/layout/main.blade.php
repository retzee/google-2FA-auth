<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google 2FA Authentication App</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main_theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sub_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}" />
</head>
<body>
    <div id="bodywrapid" class="form-body on-top">   
        <div id="pagewrap_ajax_box"></div>     

        <div class="">

            <div class="header_logo_container">
                <div class="logo">
                    Google 2FA Authentication
                </div>
            </div>

            <div class="header_menu_container">
                <nav id="nav" role="navigation">
                    <a href="#nav" title="Show navigation">Show navigation</a>
                    <a href="#" title="Hide navigation">Hide navigation</a>
                    
                                                
                        @if(session()->has('user_id'))

                            <ul class="clearfix" style="width: 750px;">
                                <li> <a href="{{url('/2fa')}}">2FA</a> </li>
                                <li> <a href="{{url('/logout')}}">logout</a> </li>
                            </ul>

                        @else
                            <ul class="clearfix" style="width: 650px;">
                                <li> <a href="{{url('/')}}">Welcome</a></li>
                                <li> <a href="{{url('/login')}}">Login </a> </li>
                                <li> <a href="{{url('/create-user')}}">Create Account </a> </li>
                            </ul>
                        @endif
                        
                </nav>
            </div>

            @yield('content')

        </div>

    </div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>