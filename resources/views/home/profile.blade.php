@extends('layouts.profilemaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">

	@section('tabheader')
		<ul class="nav" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="#" role="tab" data-toggle="tab">
					<span class="nav-link-in">My Posts</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href='/setting' role="tab" data-toggle="tab">
					<span class="nav-link-in">setting</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href='{{ Route('pphotos') }}' role="tab" data-toggle="tab">
					<span class="nav-link-in">Photos</span>
				</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" href='{{ Route('pfollowers') }}'  role="tab" data-toggle="tab">
				<span class="nav-link-in">Followers</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link" href='{{ Route('pfollowings') }} ' role="tab" data-toggle="tab">
				<span class="nav-link-in">Followings</span>
			</a>
		</li>
	</ul>
	@endsection
	<form method="POST" action="/post" enctype="multipart/form-data" class="box-typical">
		{{ csrf_field() }}
		<textarea class="write-something" name="post_body"  placeholder="What`s on your mind"></textarea>
		<div class="box-typical-footer">
			<div class="tbl">
				<div class="tbl-row">
					<div class="tbl-cell">
						<div class="image-upload">
						    <label for="file-input">
							        <i style="color:lightblue" class="font-icon fa fa-picture-o"></i>
						    </label>
						    <input type="file" id="file-input" onchange="readURL(this);" name="images[]" multiple accept="image/*">
						</div>
					</div>
					<div class="tbl-cell tbl-cell-action">
						<button type="submit" class="btn btn-rounded">Post</button>
					</div>
				</div>
			</div>
		</div>
	</form><!--.box-typical-->
	@if(count($posts))
		<div id="FollowingPosts">
			@include('home.posts')
		</div>
		<div class="ajax-load text-center">
			<p style='background-color:white'><img src="/images/loading.gif">Loading More post</p>
		</div>
		@else
		<article class="box-typical profile-post">
			<div align="center"> <br>
				<h2 style="color: #999">It Looks You Are New Here..</h2>
				<h1><i class="fa fa-arrow-up"></i></h1>
				<h4 style="color: blue">Create a post</h4>
				<img src="/images/newuser.gif">
				<h4 style="margin-top:10px">Search For New Friends</h4>
				<div class="container">
					<div class="col-md-offset-3 col-lg-offset-3 col-sm-offset-1 col-sm-5 col-lg-5 col-md-5">
						<form id="searchthis" action="/search" style="float: left;" method="get">
							{{ csrf_field() }}
							<input id="namanyay-search-box" name="search_text" type="text" placeholder="Search for a friend"/>
							<input id="namanyay-search-btn" value="Go" type="submit"/>
						</form>
					</div>
				</div>
				<br>
		</article>
	@endif
</div>									
@endsection
@section('scripts')

@if(Session::has('PostShared'))
        <script type="text/javascript">
            swal(
              'Done!',
              '{{ session('PostShared') }}',
              'success'
            )
        </script>
    </script>
@endif

@if(!is_null(session('status')))
    {
		<script type="text/javascript">
        	Command: toastr["error"]("{{ session('status') }}", "Can't save your post:")
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-top-center",
			  "preventDuplicates": false,
			  "onclick": null,
			  "showDuration": "300",
			  "hideDuration": "1000",
			  "timeOut": "10000",
			  "extendedTimeOut": "1000",
			  "showEasing": "swing",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
			}
		</script>
	}
@endif
<script>
	var page = 1;
	$(window).scroll(function() {
	    if($(window).scrollTop() + $(window).height() >= $(document).height()) {
	        page++;
	        loadMoreData(page);
	    }
	});
</script>
@endsection