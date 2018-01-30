<!DOCTYPE html>
<html>

<head lang="en">
	<title>{{ Auth::user()->name." ".'Profile' }}</title>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

    <link rel="stylesheet" href=/css/main.css>
    <link rel="stylesheet" href=/css/custom.css>
    <link rel="stylesheet" href=/css/pace.css>
	<script src="/js/pace.js"></script>

<style type="text/css">
	
.content-name{
    font-size: 20px;
    margin-top:15px;
}
.content-info{
	font-size: 15px;
    margin-top:0px;
    color: #999;
}
 
 /* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    margin-top:80px;
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
.image{
	cursor: zoom-in;
}

.image-upload > input
{
    display: none;

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
      		<div class="site-header-content-in" style='padding:0px ; position:relative;top:-8px'>
				@include('layouts.header')
	        </div><!--site-header-content-in-->
	    </div><!--.site-header-content-->
	</div><!--.container-fluid-->
</header><!--.site-header-->

<div class="page-content">
		<div class="profile-header-photo">
			<div class="profile-header-photo-in">
				<div class="tbl-cell" style="background-image: url(/images/{{ Auth::user()->cover_image }});     background-position: center;
  					background-repeat: no-repeat;
    background-size: cover;">
					<div class="info-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-9 col-xl-offset-3 col-lg-8 col-lg-offset-4 col-md-offset-0">
									<div class="tbl info-tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<p class="title">{{ Auth::user()->name }}</p>
												{{-- <p>Company Founder</p> --}}
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">{{count(Auth::user()->followers)  }}</p>
													<p>Followers</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">{{count(Auth::user()->photos)  }}</p>
													<p>Photos</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">0	</p>
													<p>Videos</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<form method="Post" action='profile/profile{{ Auth::id() }}' enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<button type="button" class="change-cover">
					Change cover 
					<input type="file" name="coverimage"/>
				</button>
				<button type="submit" style="margin: 30px" class="change-cover"> <i class="fa fa-upload"></i>
				</button>
			</form>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-4">
					<aside class="profile-side">
						<section class="box-typical profile-side-user">
								<button type="button" class="avatar-preview avatar-preview-128">
									<img id="pImage" src="/images/{{ Auth::user()->image }}" alt="Your pic"/>
									<a>
								<form method="Post" action='profile/profile{{ Auth::id() }}' enctype="multipart/form-data">
									{{ csrf_field() }}
									{{ method_field('PUT') }}		
									<span class="update">
										<input type="file" name="image" class="profileimage"/>
										<i class="icon-picture"></i>
										Update photo
									</span>
									</a>
									<button type="submit" hidden id="UploadProfileImage"> <i class="fa fa-upload" style="padding: 0px 10px 0px 10px" title="Upload selected image"></i></button>
								</button>
								</form>
									
							{{-- <button>send a meesage</button> --}}
						</section>
						<section class="box-typical profile-side-stat">
							<div class="tbl">
								<div class="tbl-row">
									<div class="tbl-cell">
										<span class="number">{{count(Auth::user()->followers)  }}</span>
										followers
									</div>
									<div class="tbl-cell">
										<span class="number">{{ count($followings) }}</span>
										following
									</div>
								</div>
							</div>
						</section>
					@if(Auth::user()->about)
						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Status</header>
							<div class="box-typical-inner">
								<p>{{ Auth::user()->about }}</p>
							</div>
						</section>
					@endif

						<section class="box-typical">
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
	{{-- <script src="https://code.jquery.com/jquery-3.2.1.js"></script> --}}
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    	if($.fn.button.noConflict) {
$.fn.btn = $.fn.button.noConflict();
}
    </script>
	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
	{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
	<script src="/js/app.js"></script>
	
	 <script>
	 	$('.profileimage').on('change', function(){
			$('#UploadProfileImage').removeAttr('hidden');
	 	});	

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
	        minLength: 1,
	       
	    });
	});

</script>

@yield('scripts')

</body>

</html>