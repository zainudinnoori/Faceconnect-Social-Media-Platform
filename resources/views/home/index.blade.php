@extends('layouts.homemaster')
@section('profilecontent')
<style type="text/css">
.image-upload > input
{
    display: none;

}

</style>
<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
	<form method="POST" action="/post" enctype="multipart/form-data" class="box-typical">
		{{ csrf_field() }}
		<textarea class="write-something" name="post_body" rows="3" placeholder="What`s on your mind"></textarea>
		<img id="image-display" src="#" />
		<div class="box-typical-footer">
			<div class="tbl">
				<div class="tbl-row">
					<div class="tbl-cell">

						<div class="image-upload">
						    <label for="file-input">
							        <i style="color:lightblue" class="font-icon fa fa-picture-o"></i>
						    </label>
						    <input type="file" id="file-input" onchange="readURL(this);" name="images[]" multiple >
						</div>
						
    						
							{{-- <i class="font-icon fa fa-video-camera">
								
							</i> --}}

				
						</button>
					</div>
					<div class="tbl-cell tbl-cell-action">
						<button type="submit" class="btn btn-rounded">Send</button>
					</div>
				</div>
			</div>
		</div>
	</form><!--.box-typical-->
		@foreach($posts as $post)
			<article class="box-typical profile-post">
				<div class="profile-post-header">
					<div class="user-card-row">
						<div class="tbl-row">
							<div class="tbl-cell tbl-cell-photo">
								<a href="#">
									<img src= images/{{ $post->user->image }} alt="">
								</a>
							</div>
							<div class="tbl-cell">
								<div class="user-card-row-name"><a href=user/{{ $post->user->id }}>{{ $post->user->name }}</a></div>
								<div class="color-blue-grey-lighter">{{ $post->created_at->diffForHumans() }}</div>
							</div>
						</div>
					</div>
					<a href="#" class="shared">
						<i class="fa fa-share-alt"></i>
					</a>
				</div>
				<div class="profile-post-content">
					<p class="profile-post-content-note">Subminted a new post</p>
					<p>{{ $post->body }} </p>
					<?php
							$photos=$post->photos;						
					?>
					@foreach($photos as $photo)
						<img width="200px" height="200px" class="img img-responsive" src= images/{{ $photo->photo }}>
					@endforeach
				</div>


				<?php
		       		$like= $Like::where(['user_id'=> Auth::id() , 'post_id'=> $post->id])->first();
		       		$count_like=count($post->likes);
			        if(is_null($like))
			        {
			           $is_liked = false;
			        }
			        else
			        {
			           $is_liked = true;
			        }
				?>

				<div class="box-typical-footer profile-post-meta">

					<a href="#" class="meta-item" data-user_id="{{ \Auth::id() }}" 
						data-post-id="{{ $post->id }}" id="store_like">

						@if($is_liked == true)
						<i class="fa fa-heart" style="color:red"></i>
						@else
						<i class="fa fa-heart" style="color:gray"></i>
						@endif
						
					</a>
					<span style="margin-left: -10px" id="no_of_likes">{{$count_like}}</span>&nbsp&nbsp&nbsp

					<a href="#" class="meta-item">
						<i class="fa fa-comment"></i>&nbsp
						{{ count($post->comments) }}
					</a>

				</div>



				<?php
					$comments = $post->comments;
				?>
				@foreach($comments as $comment )
				<div class="comment-rows-container hover-action scrollable-block">
					<form>
						<div class="comment-row-item">
							<div class="avatar-preview avatar-preview-32">
								<a href="#">
									<img src= images/{{ $comment->user->image }} alt="noPic">
								</a>
							</div>
							<div class="tbl comment-row-item-header">
								<div class="tbl-row">
									<div class="tbl-cell tbl-cell-name">{{ $comment->user->name }}</div>
									<div class="tbl-cell tbl-cell-date">{{ $comment->created_at->diffForHumans() }}</div>
								</div>
							</div>
							<div class="comment-row-item-content">
								<p>{{ $comment->body }}</p>
								<button type="submit" class="comment-row-item-action edit">
									<i class="fa fa-pencil"></i>
								</button>
								<button type="submit" class="comment-row-item-action del">
									<i class="fa fa-trash-o"></i>
								</button>
							</div>
						</div><!--.comment-row-item-->
					</form>
				
{{-- 
					<div class="comment-row-item">
						<div class="avatar-preview avatar-preview-32">
							<a href="#">
								<img src="images/avatar-2-64.png" alt="">
							</a>
						</div>
						<div class="tbl comment-row-item-header">
							<div class="tbl-row">
								<div class="tbl-cell tbl-cell-name">Vasilisa</div>
								<div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
							</div>
						</div>
						<div class="comment-row-item-content">
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
							<button type="button" class="comment-row-item-action edit">
								<i class="fa fa-pencil"></i>
							</button>
							<button type="button" class="comment-row-item-action del">
								<i class="fa fa-trash-o"></i>
							</button>
							<div class="comment-row-item quote">
								<div class="avatar-preview avatar-preview-32">
									<a href="#">
										<img src="images/photo-64-2.jpg" alt="">
									</a>
								</div>
								<div class="tbl comment-row-item-header">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-name">Adam Oliver</div>
										<div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
									</div>
								</div>
								<div class="comment-row-item-content">
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet...</p>
								</div>
							</div><!--.comment-row-item-->
						</div>
					</div><!--.comment-row-item-->
 --}}

				</div><!--.comment-rows-container-->
				@endforeach

				<form method="Post" action="comment">
				{{ csrf_field()}}
					<textarea class="write-something" placeholder="Leave a comment" name="comment_body"></textarea>
					<input type="hidden" value={{ $post->id }} name="post_id">
					<div class="box-typical-footer">
						<div class="tbl">
							<div class="tbl-row">
								<!-- <div class="tbl-cell">
									<button type="button" class="btn-icon">
										<i class="font-icon font-icon-earth"></i>
									</button>
									<button type="button" class="btn-icon">
										<i class="font-icon font-icon-picture"></i>
									</button>
									<button type="button" class="btn-icon">
										<i class="font-icon font-icon-calend"></i>
									</button>
									<button type="button" class="btn-icon">
										<i class="font-icon font-icon-video-fill"></i>
									</button>
								</div> -->
								<div class="tbl-cell tbl-cell-action">
									<button type="submit" class="btn btn-rounded">Send</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</article>
			@endforeach
		</div>									
@endsection
@section('scripts')
<script type="text/javascript">
	var flag= false
	$(document).ready(function() {
		$('#store_like').on('click',function(e) {
		    var user_id = $(this).attr('data-user_id');
		    var post_id = $(this).attr('data-post-id');
		    var data = {user_id:user_id, post_id:post_id, _token:'{{ csrf_token() }}'};
		    var request = $.ajax({
		        url: "/like/store",
		        type: "POST",
		        data: data,
		        dataType:"html"
		        });
		        request.done(function( msg ) {
		            var response = JSON.parse(msg);
		            $('#no_of_likes').empty().html(response.no_of_likes);
		            if(response.msg === "Liked")
		            {
		            	$('#store_like').empty().html('<i class="fa fa-heart" style="color:red">');
		            }
		            else
		            {
		            	$('#store_like').empty().html('<i class="fa fa-heart" style="color:gray">');
		            }
		        });
		        request.fail(function( jqXHR, textStatus ) {
		            console.log( "Request failed: " + testStatus );
		        });
		    });
		});

	     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
               
                reader.onload = function (e) {
                    $('#image-display')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
					
</script>
@endsection

