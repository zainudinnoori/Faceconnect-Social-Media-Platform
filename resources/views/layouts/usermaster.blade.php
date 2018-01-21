<!DOCTYPE html>
<html>

<!-- Mirrored from themesanytime.com/startui/demo/profile-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Mar 2016 06:51:10 GMT -->
<head lang="ru">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>{{ $user->name." ".'Profile' }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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
	        <img class="hidden-md-down" src="/images/Logo.jpg" alt="logo">
	    </a>

	    <div class="site-header-content" style="padding: 0px" >
            <div class="site-header-content-in">
				@include('layouts.header')
	        </div><!--site-header-content-in-->
	    </div><!--.site-header-content-->
	</div><!--.container-fluid-->
</header><!--.site-header-->
<div class="page-content">
		<div class="profile-header-photo">
			<div class="profile-header-photo-in">
				<div class="tbl-cell" style="background-image: url(/images/{{ Auth::user()->cover_image }});  background-position: center;	background-repeat: no-repeat; background-size: cover;">
					<div class="info-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xl-9 col-xl-offset-3 col-lg-8 col-lg-offset-4 col-md-offset-0">
									<div class="tbl info-tbl">
										<div class="tbl-row">
											<div class="tbl-cell">
												<p class="title">{{ $user->name }}</p>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title followers-count" >{{count($user->followers)}}</p>
													<p>Followers</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">{{count($user->photos)}}</p>
													<p>Photos</p>
												</div>
											</div>
											<div class="tbl-cell tbl-cell-stat">
												<div class="inline-block">
													<p class="title">0</p>
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
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-3 col-lg-4">
					<aside class="profile-side">
						<section class="box-typical profile-side-user">
									<img src="/images/{{ $user->image }}" alt="Your pic" class="avatar-preview avatar-preview-128 img img-circle"/>
							<span><button class="btn btn-primary send-a-message" style="margin:5px">Send a message</button></span><br>
							<span>
								<button class="btn btn-success" id="follow-me"  style="margin:2px">
									{{ $status }}
								</button>
							</span>

						</section>
					
						<section class="box-typical profile-side-stat">
							<div class="tbl">
								<div class="tbl-row">
									<div class="tbl-cell">
										<span class="followers-count number">{{count($user->followers)}}</span>
										followers
									</div>
									<div class="tbl-cell">
										<span class="number">{{ count($followings) }}</span>
										following
									</div>
								</div>
							</div>
						</section>

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Status</header>
							<div class="box-typical-inner">
								<p>{{ $user->about }}</p>
							</div>
						</section>
{{-- 
						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Recommendation</header>
							<div class="box-typical-inner">
								<p>All stream</p>
								<p>Connected Apps</p>
								<p>Photos</p>
								<p>Most recent</p>
							</div>
						</section> --}}

						<section class="box-typical">
							<header class="box-typical-header-sm bordered">Info</header>
							<div class="box-typical-inner">
								<p class="line-with-icon">
									<i class="font-icon fa fa-map-marker"></i>
									{{ $user->clocation }} , {{ Auth::user()->ccountry }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-envelope"></i>
									 
									{{ $user->email }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-birthday-cake"></i>
									{{ $user->dob}}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-user-circle"></i>
									{{ $user->gender }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-calendar-check-o"></i>
									{{ $user->created_at->diffForHumans() }}
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
	{{-- chat widget --}}
    <div style="position: fixed; right: 50px ; bottom: 20px;width: 350px; " hidden class="chat-widget">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>
                	{{ $user->name }}<i style="float: right; color:white"  class="fa fa-window-close-o" aria-hidden="true" id="minimize"></i>
					<i style="float: right; color:white" class="fa fa-window-minimize minimize">&nbsp &nbsp</i>
                </h4>
            </div>
            <div class="panel-body chat-widget-body" style="overflow: auto; max-height:300px;overflow-x:hidden;">
                <ul class="chat-widget-list">
                	{{-- Chat here --}}
                </ul>
            </div>
            <div class="panel-footer" >
				<input placeholder="Type a message..." type="text" name="" id='chat-text' style="width: 100% ;height:26px;padding: 15px;border:none">
				<div class="" style="background-color: white;padding: 5px ; color: lightblue">
					<i class="fa fa-paperclip">&nbsp</i>
					<i class="fa fa-camera" aria-hidden="true">&nbsp</i>
					<i class="fa fa-smile-o" aria-hidden="true">&nbsp</i>
					<i class="fa fa-paperclip" aria-hidden="true">&nbsp</i>
				</div>
            </div>
        </div>
    </div> 
    @include('layouts.footer')
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script> --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.1.2/sweetalert2.all.js"></script>
	<script src="/js/app.js"></script>



	 <script>
		$('.minimize').click(function(){
				$('.chat-widget-body').slideToggle("slow");
				$('.minimize').attr('class','fa fa-window-maximize');

		});

		$('.fa-window-close-o').click(function(){
			$('.chat-widget').attr('hidden','hidden');
		})

		$('.send-a-message').click(function(){
			$('.chat-widget').removeAttr('hidden');
		})

		function MessageSend() {
        var message = $('#chat-text').val();
        var data = {_token:'{{ csrf_token() }}',method:'post',message:message};
        var request = $.ajax({
        url: "/chatting/"+{{ $user->id }},
        type: "POST",
        data: data,
        dataType:"html",
        success: function()
        { 
       	$('.chat-widget-list').append('<li>'+
    		'<div style="float: right">'+
				'<div style=" border-right:4px solid blue;padding-right: 8px;margin-bottom: 5px">'+
					'<img src="/images/{{ Auth::user()->image }}" width="30" height="30" style=" float: right"class="img img-circle" alt="NoPic">'+
					'<span style="float: right;color:red">5 minutes ago&nbsp&nbsp</span><br>'+
					'<div style="margin-left:30px;word-wrap: break-word;">'+message+'</div>'+
				'</div> '+
				'<hr style="margin:5px">'+
			'</div>'+
			'</li>'
			);
        }
       });
	};


	 $(function() 
      {
        $("#chat-text").keydown(function(event)
        {
          if(event.keyCode == 13)
          	{
          		MessageSend();
  		        $(this).val('');
  		        // $('.chat-widget-body').scrollTop = 0;
          	};
        });
      });

	$('.send-a-message').click(function(){
	  var data = {_token:'{{ csrf_token() }}',method:'get'};
	  var request = $.ajax({
	  url: "/chatting/"+{{ $user->id }},
	  type: "get",
	  data: data,
	  dataType:"html",
	  success: function(msg)
	    { 
	        var send="";
	        var replies="";
	        '.chat-widget-list'
	        var response = JSON.parse(msg);
	        $('.chat-widget-list').empty();
	        if((response.messages).length != 0)
	        {
	          for(var i=0 ; i<(response.messages).length;i++)
	          {
	              if(response.messages[i].user_id != {{ Auth::id() }})
	              {
	                   // alert('send');
	                   $('.chat-widget-list').append('<li>'+
	                		'<div style="float: left">'+
								'<div style=" border-left:4px solid blue;padding-left: 8px;margin-bottom: 5px">'+
									'<img src="/images/{{ $user->image }}" width="30" height="30" class="img img-circle" alt="NoPic">'+
									'&nbsp<i style="color: gray" class="fa fa-clock-o">&nbsp</i>'+
									'<span style="color:blue">5 minutes ago</span>'+
									'<div style="margin-left:30px;word-wrap: break-word;">'+response.messages[i].body+'</div>'+
									'<hr style="margin:5px">'+
								'</div>'+						
							'</div>'+
							'</li>'
	                   	);
	              }
	              else
	              {
	                   $('.chat-widget-list').append('<li>'+
	                		'<div style="float: right">'+
								'<div style=" border-right:4px solid blue;padding-right: 8px;margin-bottom: 5px">'+
									'<img src="/images/{{ Auth::user()->image }}" width="30" height="30" style=" float: right"class="img img-circle" alt="NoPic">'+
									'<span style="float: right;color:red">5 minutes ago&nbsp&nbsp</span><br>'+
									'<div style="margin-left:30px;word-wrap: break-word;">'+response.messages[i].body+'</div>'+
								'</div> '+
								'<hr style="margin:5px">'+
							'</div>'+
							'</li>'
						);
	              }
	          }

	        }
	    }
	  });
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
        minLength: 2,
       
    });
});

	$(document).ready(function() {
	$('#follow-me').on('click',function(e) {

		var following_user_id =  {{ $user->id }} ;
		var data = {following_user_id:following_user_id, _token:'{{ csrf_token() }}'};
		var request = $.ajax({
			url: "/follow/store",
			type: "POST",
			data: data,
			dataType:"html"
			});
		request.done(function( msg ) {
		    var response = JSON.parse(msg);
		    if(response.msg == "followed")
		    {
		    	$('#follow-me').empty().html("Un follow");
		    	$('.followers-count').empty().html(response.count);
		    }
		    if(response.msg == "unfollowed")
		    {
		    	$('#follow-me').empty().html("Follow");
		    	$('.followers-count').empty().html(response.count);
		    }
		});
		request.fail(function( jqXHR, textStatus ) {
		    console.log( "Request failed: " + testStatus );
		});
	});
});
</script>

	@yield('scripts')

</body>

</html>