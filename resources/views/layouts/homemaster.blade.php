<!DOCTYPE html>
<html>

<head lang="en">
	<title>{{ Auth::user()->name." ".'Profile' }}</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="shortcut icon" type="image/png" href="/image/favicon.png"/>
	{{-- <link rel="shortcut icon" type="image/png" href="http://eg.com/favicon.png"/>	 --}}
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href=/css/main.css>
    <link rel="stylesheet" href=/css/custom.css>    
    <link rel="stylesheet" href=/css/pace.css>
	<script src="/js/pace.js"></script>

	

<style type="text/css">
 
</style>
</head>
	<body>
	<header class="site-header">
		<div class="container-fluid">
		    <a href="#" class="site-logo">
		        <img class="hidden-md-down" src="/image/Logo.jpg" alt="logo">
		    </a>
		    <div class="site-header-content">
		        <div class="site-header-content-in" style="position:relative;top:-10px">
		        	@include('layouts.header')
		        </div><!--site-header-content-in-->
		    </div><!--.site-header-content-->
		</div><!--.container-fluid-->
	</header><!--.site-header-->
	<div class="page-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-2 col-lg-3">
					<aside class="profile-side" style="margin:0px 0 20px;position:relative">

						<section class="box-typical" >
							<header class="box-typical-header-sm bordered">Info</header>
							<div class="box-typical-inner">
								<p class="line-with-icon">
									<i class="font-icon fa fa-map-marker"></i>
									{{ Auth::user()->clocation }} , {{ Auth::user()->ccountry }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-envelope"></i>
									 
									{{ Auth::user()->email }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-birthday-cake"></i>
									{{ Auth::user()->dob}}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-user-circle"></i>
									{{ Auth::user()->gender }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-calendar-check-o"></i>
									{{ Auth::user()->created_at->diffForHumans() }}
								</p> 

							</div>
						</section>
					</aside><!--.profile-side-->
				</div>

				<div class="col-xl-9 col-lg-8">
					<section class="tabs-section">
						<div class="tabs-section-nav tabs-section-nav-left">
							@yield('tabheader')
						</div><!--.tabs-section-nav-->
						<div class="tab-content no-styled profile-tabs">
							@yield('profilecontent')
						</div>
					</section>

				</div>
			</div><!--.tab-pane-->
		</div><!--.tab-content-->
	</div>
    @include('layouts.footer')
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
	<script src="/js/app.js"></script>


	<script>
	   $(document).ready(function() {

	    src = "{{ route('searchajax') }}";
	     $("#namanyay-search-box").autocomplete({
	        source: function(request, response) {
	            $.ajax({
	                url: src,
	                dataType: "json",
	                data: {
	                    term : request.term
	                },
	                success: function(data) {
	                    response(data);  
	                }
	            });
	        },
	        minLength: 2, 
	    });
	});

	// var auto_refresh = setInterval(
	//     function() {
	//         $('#nCount').load('/Cnotification').fadeIn("slow");
	//     }, 0);

	</script>
		@yield('scripts')
	</body>
</html>