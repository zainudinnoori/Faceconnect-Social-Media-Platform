@extends('layouts.homemaster')
@section('profilecontent')

<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
	<form method="POST" action="/post" enctype="multipart/form-data" class="box-typical">
		{{ csrf_field() }}
		<textarea class="write-something" name="post_body" rows="3" placeholder="What`s on your mind"></textarea>
		
		<div class="box-typical-footer">
			<div class="tbl">
				<div class="tbl-row">
					<div class="tbl-cell">

						<div class="image-upload">
						    <label for="file-input">
							        <i style="color:lightblue" class="font-icon fa fa-picture-o"></i>
						    </label>
						    <input type="file" id="file-input" name="images[]" multiple >
						</div>

					</div>
					<div class="tbl-cell tbl-cell-action">
						<button type="submit" class="btn btn-rounded">Post</button>
					</div>
				</div>
			</div>
		</div>
	</form><!--.box-typical-->

		@foreach($posts as $post)
			<article class="box-typical profile-post" id="post-content{{ $post->id }}" >
				<div class="profile-post-header">
					<div class="user-card-row">
						<div class="tbl-row">
							<div class="tbl-cell tbl-cell-photo">
								<a href="#" >
									<img  src= images/{{ $post->user->image }} alt="">
								</a>
							</div>
							<div class="tbl-cell">
								<div class="user-card-row-name"><a href=user/{{ $post->user->id }}>{{ $post->user->name }}</a></div>
								<div class="color-blue-grey-lighter">{{ $post->created_at->diffForHumans() }}</div>
							</div>
						</div>
					</div>
					@if($post->user_id === Auth::id())
					<button data-post-id="{{ $post->id }}" title="Delete Post" style="background:none ;margin-right: 125px" class="shared delete_post">
						<i class="fa fa-trash-o"></i>
					</button> 

					<button id="{{ $post->id }}" title="Edit Post" style="background:none ;margin-right:155px" class="shared pencil-edit" >
						<i class="fa fa-pencil"></i>
					</button> 
					@endif
					<a href="post/{{ $post->id }}" title="Post Desc.." class="shared">
						Post description
					</a>	
				
					</div>
				<div class="profile-post-content">
					{{-- <p class="profile-post-content-note">Subminted a new post</p> --}}
					<textarea class="text_area_disabled" id="post_body_{{ $post->id }}" disabled>{{$post->body }}</textarea>
					<?php
							$photos=$post->photos;						
					?>
					@foreach($photos as $photo)
						<img style="display: inline" width="200px" data-toggle="modal" data-target="#myModal" height="200px" class="img img-responsive" src= 'images/{{ $photo->photo }}'>
					@endforeach
					
					<div id="disp-images-upload">
						
					</div>

{{-- 					<button class="btn btn-sm btn-default image-upload" hidden id="upload-photo-{{ $post->id }}" style="display: inline;margin-top: 5px">
						<label for="file-input">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</label>
						 <input type="file" id="file-input" onchange="readURL(this);" name="images_post_update[]" >
					</button> --}}
				<br>
					<button class="btn btn-sm btn-primary btn-group post-update" id="btn-update-post-{{ $post->id }}" hidden style="margin-top: 8px" data-post-id="{{ $post->id }}" >Update post</button>
					<button class="btn btn-sm btn-danger btn-group cancel-edit" btn-cancle-post-id='{{ $post->id }}' id="btn-cancel-edit-{{ $post->id }}" hidden style="margin-top: 8px">Cancle editing</button>


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
					<span class="likers" post-id='{{ $post->id }}' data-toggle="modal" data-target="#likeModal-{{ $post->id }}" style="margin-left: -10px;cursor: pointer" id="no_of_likes{{ $post->id }}">{{$count_like}}  Likes</span> 
					&nbsp&nbsp&nbsp
							  <div class="modal fade"  id="likeModal-{{ $post->id }}" role="dialog">
							    <div class="modal-dialog">
							      <!-- Modal content-->
							      <div class="modal-content col-md-5 col-sm-8 col-md-offset-3" >
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title" id="likers-modal-header-{{ $post->id }}"></h4>
							        </div>
							        <div class="modal-body"  style="max-height: 450px;overflow: auto; ">
							          <ul id="likers-modal-{{ $post->id }}">
	
							          </ul>
							        </div>
							        <div class="modal-footer">
							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        </div>
							      </div>
							      
							    </div>
							  </div>
  						

					<a class="meta-item">
						<i class="fa fa-comment"></i>&nbsp
						{{ $cCount=count($post->comments)  }} Comments
					</a>

				</div>



				<?php
					$comments = $post->comments->take(4);
				?>
				@foreach($comments as $comment )
				<div class="comment-rows-container hover-action scrollable-block" id="comment-block-{{ $comment->id }}">
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
								<textarea class="text_area_disabled" disabled id="comment-{{ $comment->id }}">{{ $comment->body }}</textarea>
							@if($comment->user->id === Auth::id())
								<button id="update-comment-{{ $comment->id }}" comment-id="{{ $comment->id }}" hidden class="btn btn-sm btn-default comment-update" style="margin-top: 5px" >Update</button>
								<button id="cancle-comment-{{ $comment->id }}" comment-id="{{ $comment->id }}" hidden class="btn btn-sm btn-danger comment-cancle" style="margin-top: 5px">X</button>

								<button comment-id="{{ $comment->id }}" class="comment-row-item-action edit edit-comment">
									<i class="fa fa-pencil"></i>
								</button>

								<button type="submit" class="comment-row-item-action del comment-delete" comment-id="{{ $comment->id}}">
									<i class="fa fa-trash-o"></i>
								</button>
							@endif

							</div>
						</div><!--.comment-row-item-->
				</div><!--.comment-rows-container-->
				@endforeach
				@if(count($post->comments)>4)
				<div style="margin-left: 25px;padding:10px;" ><a href="post/{{ $post->id }}" >{{ $cCount-4  }}&nbspother comments</a></div>
				@endif
				<form method="Post" action="post/comment">
				{{ csrf_field()}}
					<textarea class="text_area_enabled_comment 	" placeholder="Leave a comment" required  name="comment_body"></textarea>
					<input type="hidden" value={{ $post->id }} name="post_id">
					<div class="box-typical-footer">
						<div class="tbl">
							<div class="tbl-row">
								<div class="tbl-cell tbl-cell-action">
									<button type="submit" class="btn btn-rounded btn-danger">Post a comment</button>
								</div>
							</div>
						</div>
					</div>
				</form>
{{-- 				<article>
					@include('layouts.errors')
				</article> --}}
			</article>
			@endforeach

		</div>									
@endsection

 @section('scripts')
 <script type="text/javascript">
 	
		$('.delete_post').click(function(e){

			var post_id = $(this).attr('data-post-id');
			var data={post_id:post_id,_token:'{{ csrf_token()}}',method:'Delete'}
			$.ajax(
			{
				url:'post/'+post_id,
				type: 'DELETE',
				dataType: "JSON",
				data: data,
	            success: function ()
	            {	
			        $('#post-content'+post_id).fadeOut("slow");
	                Command: toastr["success"]("Your post has beed deleted !!! ", "Success..")
					toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": false,
					  "positionClass": "toast-bottom-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}
	            }
            });
      		// console.log("It failed");
    });

		
 	
 </script>

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

<script type="text/javascript">
	$(document).ready(function() {
			$('.store_like').on('click',function(e) {
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
		            $('#no_of_likes'+post_id).empty().html(response.no_of_likes+' Likes');
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

		var post_data = "";
        $('.pencil-edit').click(function(){
        	var edit_post_id= $(this).attr('id');
        	$('#post_body_'+edit_post_id).removeClass('text_area_disabled');
        	$('#post_body_'+edit_post_id).addClass('text_area_enabled');
        	$('#post_body_'+edit_post_id).removeAttr('disabled');
        	$('#post_body_'+edit_post_id).focus();
        	$('#btn-update-post-'+edit_post_id).removeAttr('hidden');
        	$('#btn-cancel-edit-'+edit_post_id).removeAttr('hidden');
        	$('#upload-photo-'+edit_post_id).removeAttr('hidden');
        	
        	post_data= $('#post_body_'+edit_post_id).val();

        });

		$('.cancel-edit').click(function updated(){
			var post_id = $(this).attr('btn-cancle-post-id');
			$('#post_body_'+post_id).removeClass('text_area_enabled');
			$('#post_body_'+post_id).addClass('text_area_disabled');
			$('#post_body_'+post_id).attr('disabled','disabled');
			$('#btn-update-post-'+post_id).attr('hidden','hidden');
        	$('#btn-cancel-edit-'+post_id).attr('hidden','hidden');
        	$('#upload-photo-'+post_id).attr('hidden','hidden');
			$('#post_body_'+post_id).empty();
			$('#post_body_'+post_id).val(post_data);


		});
		$('.post-update').click(function(e){

			var post_id = $(this).attr('data-post-id');
			var post_content= $('#post_body_'+post_id).val();
			var data={
				post_id:post_id,
				_token:'{{ csrf_token()}}',
				method:'PUT',
				post_content:post_content,
			}
			$.ajax(
			{
				url:'post/'+post_id,
				type: 'PUT',
				dataType: "JSON",
				data: data,
	            success: function ()
	            {	
	                Command: toastr["success"]("Your post has beed updated !!! ", "Success..")
					toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": false,
					  "positionClass": "toast-bottom-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}

	            }
            });
            post_data=$('#post_body_'+post_id).val();
            $('#post_body_'+post_id).removeClass('text_area_enabled');
			$('#post_body_'+post_id).addClass('text_area_disabled');
			$('#post_body_'+post_id).attr('disabled','disabled');
			$('#btn-update-post-'+post_id).attr('hidden','hidden');
        	$('#btn-cancel-edit-'+post_id).attr('hidden','hidden');
      		// console.log("It failed");
    });

	var commentContent="";
	$('.edit-comment').click(function(){
		var commentid=$(this).attr('comment-id');
		$('#comment-'+commentid).removeClass('text_area_disabled');
		$('#comment-'+commentid).addClass('text_area_enabled_comment');
		$('#comment-'+commentid).removeAttr('disabled');
		$('#update-comment-'+commentid).removeAttr('hidden');
		$('#cancle-comment-'+commentid).removeAttr('hidden');
		commentContent=$('#comment-'+commentid).val();
	});

	$('.comment-cancle').click(function(){
		var commentid=$(this).attr('comment-id');
		$('#comment-'+commentid).removeClass('text_area_enabled_comment');
		$('#comment-'+commentid).addClass('text_area_disabled');
		$('#comment-'+commentid).attr('disabled');
		$('#update-comment-'+commentid).attr('hidden','hidden');
		$('#cancle-comment-'+commentid).attr('hidden','hidden');
		$('#comment-'+commentid).empty();
		$('#comment-'+commentid).val(commentContent);
	});


	$('.comment-update').click(function(){
		var commentId = $(this).attr('comment-id');
		var commentBody= $('#comment-'+commentId).val();
		var data={
			commentId:commentId,
			_token:'{{ csrf_token() }}',
			method:'PUT',
			commentBody:commentBody,
			}
		$.ajax(
		{
			url:'post/comment/'+commentId,
			type: 'PUT',
			dataType: "JSON",
			data: data,
			success: function()
	            {
            	Command: toastr["success"]("Comment updated !!! ", "Success..")
				toastr.options = {
				  "closeButton": false,
				  "debug": false,
				  "newestOnTop": false,
				  "progressBar": false,
				  "positionClass": "toast-bottom-right",
				  "preventDuplicates": false,
				  "onclick": null,
				  "showDuration": "300",
				  "hideDuration": "1000",
				  "timeOut": "5000",
				  "extendedTimeOut": "1000",
				  "showEasing": "swing",
				  "hideEasing": "linear",
				  "showMethod": "fadeIn",
				  "hideMethod": "fadeOut"
				}
            	$('#comment-'+commentId).removeClass('text_area_enabled_comment');
				$('#comment-'+commentId).addClass('text_area_disabled');
				$('#comment-'+commentId).attr('disabled');
				$('#update-comment-'+commentId).attr('hidden','hidden');
				$('#cancle-comment-'+commentId).attr('hidden','hidden');
	            }

		});
		
	});


	$('.comment-delete').click(function(e){
			var commentId = $(this).attr('comment-id');
			var data={commentId:commentId,_token:'{{ csrf_token()}}',method:'Delete'}
			$.ajax(
			{
				url:'post/comment/'+commentId,
				type: 'DELETE',
				dataType: "JSON",
				data: data,
	            success: function ()
	            {	
			        $('#comment-block-'+commentId).fadeOut("slow");
	                Command: toastr["success"]("Comment deleted !!! ", "Success..")
					toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": false,
					  "positionClass": "toast-bottom-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}
	            }
            });
      		// console.log("It failed");
    });

    $('.likers').click(function(){
    	var postId= $(this).attr('post-id');
    	var data={postId:postId,token:'csrf_token()',method:'get'}
    	$.ajax(
			{
				url:'post/likers/'+postId,
				type: 'get',
				dataType: "JSON",
				data: data,
	            success: function (msg)
	            {	
	            	var likers="";
	            	for(i=0;i<(msg.likers).length;i++)
	            	{
		               	likerimage= '<img width="30px" class="img img-circle" height="30px" src=/images/'+msg.likers[i].image+'>&nbsp&nbsp&nbsp';
		               	likername= msg.likers[i].name+'&nbsp&nbsp<i style="color:red" class="fa fa-heart">&nbsp&nbspLiked</i><br><br>';
		               	likerid='<a href=/user/'+msg.likers[i].id+'>'+likerimage+likername+'</a>';
		               	
	               		likers=likers+likerid;
	            	}	
	            	if((msg.likers).length != 0 )
	            	{
	            		$('#likers-modal-'+msg.post_id).html(likers);
	            		$('#likers-modal-header-'+msg.post_id).html('Total  '+msg.no_of_likers+' Likes');
	            	}
	            	else
	            	{
	            		$('#likers-modal-'+msg.post_id).html('<p>No like</p>');
	            	}
	            }
	        });
    });


     //  	var counter= $('#disp-images-upload').length;
	    // function readURL(input) {
     //        if (input.files && input.files[0]) {
     //            var reader = new FileReader();
     //           //  var fp = $('#file-input');
     //          	// var count = fp[0].files.length;
	    //             reader.onload = function (e) {
	    //                 $('.image-display-'+counter)
	    //                     .attr('src', e.target.result)
	    //                     .width(150)
	    //                     .height(150);
	    //                     counter++;
	    //             };
	    //         $('#disp-images-upload').append('<img class="image-display-'+counter+'" src="#" alt="" /> ..<i class="fa fa-pencil"></i> ')
     //            reader.readAsDataURL(input.files[0]);
     //        }
     //    }

       
</script>
@endsection

