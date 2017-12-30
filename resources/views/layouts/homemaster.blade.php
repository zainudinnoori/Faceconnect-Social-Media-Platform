<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ Auth::user()->name." ".'Profile' }}</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href=/css/main.css>
<style type="text/css">
	#namanyay-search-btn {
		background:#0099ff;
		color:white;
		font: 'trebuchet ms', trebuchet;
		padding:10px 20px;
		border-radius:0 5px 5px 0;
		-moz-border-radius:0 5px 5px 0;
		-webkit-border-radius:0 5px 5px 0;
		-o-border-radius:0 5px 5px 0;
		border:0 none;
		font-weight:bold;

		}
		 
		#namanyay-search-box {
		margin-left:80px ; 
		background: #eee;
		padding:10px;
		 border-radius:5px 0 0 5px;
		-moz-border-radius:5px 0 0 5px;
		-webkit-border-radius:5px 0 0 5px;
		-o-border-radius:5px 0 0 5px;
		border: 0 none;
   		 width: 200px;
		}
	
		.image-upload > input
		{
		    display: none;

		}

		#notification{
			display: none;
		}

		.text_area_disabled{
			width: 100%;
			border: none;
			resize: none;
			background-color: transparent;
			cursor: pointer;
		}

		.text_area_enabled{
			width: 100%;
			border: none;
			border-radius: 5px; 
			resize: none;
			background-color: #f5f2f3;
			cursor: text;
			padding: 5px;
		}

		.text_area_enabled_comment
		{
			width: 100%;
			border: none;
			resize: none;
			background-color: #ecffe6;
			color: black;
			font-weight: bold;
			cursor: text;
			padding: 5px;
		}
 
</style>
</head>
<body>
<header class="site-header">
	<div class="container-fluid">
	    <a href="#" class="site-logo">
	        <img class="hidden-md-down" src="/images/Logo.jpg" alt="logo">
	    </a>

		

	    <button class="hamburger hamburger--htla">
	        <span>toggle menu</span>
	    </button>
	    <div class="site-header-content">
	        <div class="site-header-content-in">
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
								{{--<p class="line-with-icon">
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
								</p> --}}

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






	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
	


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


	

	  $(document).ready(function(){
			
		    $("#click").click(function(){
		        $("#notification").toggle();
		    });
		});
</script>

	@yield('scripts')

</body>

</html>