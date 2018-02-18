<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Faceconnect Login</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=/css/pace.css>
    <script src="/js/pace.js"></script>
    @if(app()->getLocale()==="fa")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">
    @endif

    <style>

canvas {
  display: block;
  vertical-align: bottom;
}

/* ---- particles.js container ---- */

#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #b61924;
  background-image: url("");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 50% 50%;
  z-index: 0;
}
</style>
</head>
 <div id="particles-js"></div>
<body> 
    
        @yield('content')
        <div style="width: 100% ;position: fixed; height: 50px;background-color:white;bottom:0px;border-top:1px solid lightgray " >
        <span style="float:left; margin:10px"><i class="fa fa-copyright" aria-hidden="true"></i>Created by Zainudin Noori & Mustafa Ayan - 2018 </span>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
    <script src="/js/app.js"></script>

    <script src="/js/particles.js-master/particles.js"></script>
    <script>
        particlesJS.load('particles-js', '/js/particlesjs.json', function() {
      console.log('callback - js/particles.js config loaded');
    });
    </script>
    @yield('scripts')
    
</body>
</html>
