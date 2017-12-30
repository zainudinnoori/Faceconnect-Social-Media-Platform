@extends('layouts.homemaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
			<article class="box-typical profile-post">
				<div class="profile-post-header">
					<div class="user-card-row">
						<div class="tbl-row">
							<div class="tbl-cell tbl-cell-photo">
								<a href="#">
									<img src= /images/{{ $post->user->image }} alt="">
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
						<img width="200px" height="200px" class="img img-responsive" src= /images/{{ $photo->photo }}>
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

					<a class="meta-item store_like" data-user_id="{{ \Auth::id() }}" 
						data-post-id="{{ $post->id }}" id='like_{{ $post->id }}'>

						@if($is_liked == true)
						<i class="fa fa-heart" style="color:red"></i>
						@else
						<i class="fa fa-heart" style="color:gray"></i>
						@endif
						
					</a> 
					<span style="margin-left: -10px" id="no_of_likes{{ $post->id }}">{{$count_like}}</span> Likes &nbsp&nbsp

					<a class="meta-item">
						<i class="fa fa-comment"></i>&nbsp 
						{{ count($post->comments) }} Comments
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
									<img src= /images/{{ $comment->user->image }} alt="noPic">
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
				</div><!--.comment-rows-container-->
				@endforeach

				<form method="Post" action="comment">
				{{ csrf_field()}}
					<textarea class="write-something" placeholder="Leave a comment" name="comment_body"></textarea>
					<input type="hidden" value={{ $post->id }} name="post_id">
					<div class="box-typical-footer">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell tbl-cell-action">
									<button type="submit" class="btn btn-rounded">Send</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</article>
		</div>									
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
			$('.store_like').on('click',function(e) {
				console.log('this');
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
		            $('#no_of_likes'+post_id).empty().html(response.no_of_likes);
		            if(response.msg === "Liked")
		            {
		            	$('#like_'+post_id).empty().html('<i class="fa fa-heart" style="color:red">');
		            }
		            else
		            {
		            	$('#like_'+post_id).empty().html('<i class="fa fa-heart" style="color:gray">');
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

