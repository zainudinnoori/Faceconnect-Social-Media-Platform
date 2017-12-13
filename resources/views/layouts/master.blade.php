<!DOCTYPE html>
<html>

<!-- Mirrored from themesanytime.com/startui/demo/profile-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2016 06:51:10 GMT -->
<head lang="ru">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Template</title>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<script src="js/plugins.js"></script>
	<script src="js/lib/ion-range-slider/ion.rangeSlider.js"></script>
	<!-- <script src="https://use.fontawesome.com/fcf4bb6c21.js"></script> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.css">
	<link rel="stylesheet" href="css/lib/ion-range-slider/ion.rangeSlider.skinHTML5.css">
	<script src="js/app.js"></script>
	
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
<header class="site-header">
	<div class="container-fluid">
	    <a href="#" class="site-logo">
	        <img class="hidden-md-down" src="images/Logo.jpg" alt="logo">
	        <img class="hidden-lg-up" src="Logo.jpg" alt="">
	    </a>
	    <button class="hamburger hamburger--htla">
	        <span>toggle menu</span>
	    </button>
	    <div class="site-header-content">
	        <div class="site-header-content-in">

	        </div><!--site-header-content-in-->
	    </div><!--.site-header-content-->
	</div><!--.container-fluid-->
</header><!--.site-header-->
<div class="page-content">
		<div class="profile-header-photo">
			<div class="profile-header-photo-in">
				<div class="tbl-cell" style="background-image: url(images/{{ Auth::user()->image }});">
					<div class="info-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-9 col-xl-offset-3 col-lg-8 col-lg-offset-4 col-md-offset-0">
									<div class="tbl info-tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<p class="title">{{ Auth::user()->name }}</p>
												<p>Company Founder</p>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">23К</p>
													<p>Followers</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">938</p>
													<p>Photos</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">18</p>
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
				<form method="Post" action='/profile/{{ Auth::id() }}' enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}

					<button type="button" class="change-cover">
						Change cover <img src="images/upload_icon.png" width="30px" height="30px">
						<input type="file" name="cover-photo"/>
					</button>
				</form>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-4">
					<aside class="profile-side">
						<section class="box-typical profile-side-user">

							<form method="Post" action='/profile/{{ Auth::id() }}' enctype="multipart/form-data">
								{{ csrf_field() }}
								{{ method_field('PUT') }}
								<button type="button" class="avatar-preview avatar-preview-128">
									<img src="images/{{ Auth::user()->image }}" alt="Your pic"/>
									<span class="update">
										<i class="icon-picture"></i>
										Update photo
									</span>
									<input type="file" name="image"/>
								</button>
								<button type="submit"><img src="images/upload_icon.png" width="30px" height="30px"></button>
							</form>


							<button type="button" class="btn btn-rounded">Send a Message</button>
							<div class="btn-group">
								<button type="button"
								        class="btn btn-rounded btn-primary-outline dropdown-toggle"
								        data-toggle="dropdown"
								        aria-haspopup="true"
								        aria-expanded="false">
									Follow
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
									<a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
								</div>
							</div>
						</section>
					
						<section class="box-typical profile-side-stat">
							<div class="tbl">
								<div class="tbl-row">
									<div class="tbl-cell">
										<span class="number">9854</span>
										followers
									</div>
									<div class="tbl-cell">
										<span class="number">112</span>
										following
									</div>
								</div>
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">About</header>
							<div class="box-typical-inner">
								<p>{{ Auth::user()->about }}</p>
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Recommendation</header>
							<div class="box-typical-inner">
								<p>All stream</p>
								<p>Connected Apps</p>
								<p>Photos</p>
								<p>Most recent</p>
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Info</header>
							<div class="box-typical-inner">
								<p class="line-with-icon">
									<i class="font-icon fa fa-globe"></i>
									{{ Auth::user()->clocation }} , {{ Auth::user()->ccountry }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-users-two"></i>
									{{ Auth::user()->email }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-case-3"></i>
									{{ Auth::user()->dob }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-case-3"></i>
									{{ Auth::user()->gender }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon font-icon-calend"></i>
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
								<script>
									$(document).ready(function(){
										$("#range-slider-1").ionRangeSlider({
											min: 0,
											max: 100,
											from: 30,
											hide_min_max: true,
											hide_from_to: true
										});

										$("#range-slider-2").ionRangeSlider({
											min: 0,
											max: 100,
											from: 30,
											hide_min_max: true,
											hide_from_to: true
										});

										$("#range-slider-3").ionRangeSlider({
											min: 0,
											max: 100,
											from: 30,
											hide_min_max: true,
											hide_from_to: true
										});

										$("#range-slider-4").ionRangeSlider({
											min: 0,
											max: 100,
											from: 30,
											hide_min_max: true,
											hide_from_to: true
										});

									});
								</script>
								</div>
							</section>
<!-- 							<section class="box-typical-section profile-settings-btns">
								<button type="submit" class="btn btn-rounded">Save Changes</button>
								<button type="button" class="btn btn-rounded btn-grey">Cancel</button>
							</section> -->
						</div>
					</div><!--.tab-pane-->
				</div><!--.tab-content-->
			</div>





	<!--Progress bar-->
	<!-- <div class="circle-progress-bar pieProgress" role="progressbar" data-goal="100" data-barcolor="#ac6bec" data-barsize="10" aria-valuemin="0" aria-valuemax="100">
	    <span class="pie_progress__number">0%</span> -->
	<!-- </div> --> 

	<script src="js/lib/salvattore/salvattore.min.js"></script>

</body>

<!-- Mirrored from themesanytime.com/startui/demo/profile-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2016 06:51:31 GMT -->
</html>