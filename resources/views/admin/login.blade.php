<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Faceconnect Admin Login</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=/css/pace.css>
    <script src="/js/pace.js"></script>
    @if(app()->getLocale()==="fa")
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">
    @endif
    <style>
        .adminP{
            font-size: 100px;
            text-shadow: 5px 5px 10px #FF0000;
            color: white;
        }
    </style>
</head>
<body style="background-image: url(/image/adminback.jpg)";> 
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div  class="col-md-1">
                    <br>
                   <a href="/locale/fa"><img src="/image/afgflag.gif" height="20px" width="30px"> فارسی</a><br>
                   <a href="/locale/en"><img src="/image/engflag.png" height="25px" width="30px"> English</a>
            </div>
            <div class="container">

                <div class="navbar-header">
                    <img style="margin: 25px" src="/images/Logo.jpg" alt="logo">
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <header class="site-header col-md-offset-6">
                        <div class="container-fluid" style="margin: 20px; right: 20px">
                            <form method="POST">
                            {{ csrf_field() }}
                                <div class="col-md-5">
                                    {{ trans('lang.Email') }}<input id="emailsignin" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                    @lang('lang.Remember_Me')
s
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-5">
                                   @lang('lang.Password') <input id="passwordsignin" type="password" class="form-control" name="password" required>
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        @lang('lang.Forgot_Your_Password?')
                                    </a>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>

                                    @endif
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">
                                    @lang('lang.Login')
                                </button>
                            </form>
                        </div>
                    </header>   
                </div>
            </div>
        </nav>  
        <div class="container">
            <div class="col-md-8 col-md-offset-2" >
                <h1 class="adminP">{{ trans('lang.amdin_panel') }}</h1>
            </div>
        </div>
    </div>
    <div style="width: 100% ;position: fixed; height: 50px;background-color:white;bottom:0px;border-top:1px solid lightgray " >
    <span style="float:left; margin:10px"><i class="fa fa-copyright" aria-hidden="true"></i>Created by Zainudin Noori and Mustafa Ayan- 2018 </span>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
    <script src="/js/app.js"></script>
    
</body>
</html>
