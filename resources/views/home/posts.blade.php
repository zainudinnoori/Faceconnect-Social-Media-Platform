@foreach($posts as $post)
@if(is_null($post->parent_id))
	<article class="box-typical profile-post" id="post-content{{ $post->id }}" >
		<div class="profile-post-header">
			<div class="user-card-row">
				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-photo">
						<a href="#" >
							<img  src= /images/{{ $post->user->image }} alt="">
						</a>
					</div>
					<div class="tbl-cell">
						<div class="user-card-row-name"><a href=/user/{{ $post->user->id }}>{{ $post->user->name }}</a></div>
						<div class="color-blue-grey-lighter">{{ $post->created_at->diffForHumans() }}</div>
					</div>
				</div>
			</div>
			@if($post->user_id === Auth::id())
			<button data-post-id="{{ $post->id }}" title="Delete Post" style="background:none ;margin-right: 145px" class="shared delete_post">
				<i class="fa fa-trash-o"></i>
			</button> 

			<button id="{{ $post->id }}" title="Edit Post" style="background:none ;margin-right:175px" class="shared pencil-edit" >
				<i class="fa fa-pencil"></i>
			</button> 
			@endif
			<a href="/post/{{ $post->id }}" title="Post Desc.." style="margin-right:20px" class="shared">
				{{ trans('lang.Post_description') }}
			</a>
			<form method="POST" action={{ route('sharepost',$post->id) }}>
				{{ csrf_field()	}}
				<button title="Share" style="background: transparent;" class="shared">
					<i class="fa fa-share-alt"></i>
				</button> 
			</form>
		</div>

		<div class="profile-post-content">
			{{-- <p class="profile-post-content-note">Subminted a new post</p> --}}
			<textarea class="text_area_disabled" id="post_body_{{ $post->id }}" disabled>{{$post->body }}</textarea>
			@foreach($post->photos as $photo)
				<img style="display: inline" width="200px" data-toggle="modal" data-target="#showimage-{{ $photo->id }}" height="200px" class="img img-responsive show-orginal-image" src= "/images/{{ $photo->photo.'_tumbinal'.$photo->extension }}" name="{{ $photo->photo}}" extension="{{ $photo->extension }}">
				  <div class="modal fade" id="showimage-{{ $photo->id }}" role="dialog">
				    <div class="modal-dialog">
				      <div class="modal-content-orginal">
				      </div>
				    </div>
				  </div>
			@endforeach
			
			<div id="disp-images-upload"></div>
			<br>
			<button class="btn btn-sm btn-primary btn-group post-update" id="btn-update-post-{{ $post->id }}" hidden style="margin-top: 8px" data-post-id="{{ $post->id }}" >@lang('lang.Update_post')</button>
			<button class="btn btn-sm btn-danger btn-group cancel-edit" btn-cancle-post-id='{{ $post->id }}' id="btn-cancel-edit-{{ $post->id }}" hidden style="margin-top: 8px">@lang('lang.Cancle_editing')</button>
		</div>
		@else
		<?php
			$sharedPost = $Post::find($post->parent_id);
			$shareUser = $User::find($sharedPost->user_id);
		?>
		<article class="box-typical profile-post" id="post-content{{ $post->id }}" >
		<div class="profile-post-header">
			<div class="user-card-row">
				<div class="tbl-row">
					<div class="tbl-cell tbl-cell-photo">
						<a href="/user/{{ $post->user->id }}" >
							<img  src= '/images/{{ $post->user->image }}' alt="">
						</a>
					</div>
					<div class="tbl-cell">
						<div class="user-card-row-name"><a href=user/{{ $post->user->id }}>{{ $post->user->name }}</a> 
							<span class="color-blue-grey-lighter"> Has Shared </span> 
							@if($shareUser->id === $post->user->id)
								His 
							@else
								<a href="/user/{{ $shareUser->id }}">{{ $shareUser->name }}'s </a>
							@endif
							<span class="color-blue-grey-lighter"> Post</span>
						</div>
						<div class="color-blue-grey-lighter">{{ $post->created_at->diffForHumans() }}</div>
					</div>
				</div>
			</div>
			@if($post->user_id === Auth::id())
			<button data-post-id="{{ $post->id }}" title="{{ trans('lang.Delete_Post') }}" style="background:none ;margin-right: 145px" class="shared delete_post">
				<i class="fa fa-trash-o"></i>
			</button> 
			@endif
			<a href="post/{{ $post->id }}" title="Post Desc.." style="margin-right:20px" class="shared">
				@lang('lang.Post_description')
			</a>
		</div>
		<div class="profile-post-content">
			{{-- <p class="profile-post-content-note">Subminted a new post</p> --}}
			<textarea class="text_area_disabled" id="post_body_{{ $post->id }}" disabled>{{$sharedPost->body }}</textarea>
			@foreach($sharedPost->photos as $photo)
				<img style="display: inline" width="200px" data-toggle="modal" data-target="#showimage-{{ $photo->id }}" height="200px" class="img img-responsive show-orginal-image" src= "/images/{{ $photo->photo.'_tumbinal'.$photo->extension }}" name="{{ $photo->photo}}" extension="{{ $photo->extension }}">
				  <div class="modal fade" id="showimage-{{ $photo->id }}" role="dialog">
				    <div class="modal-dialog">
				      <div class="modal-content-orginal">
				      </div>
				    </div>
				  </div>
			@endforeach
			
			<div id="disp-images-upload"></div>
			<br>
			<button class="btn btn-sm btn-primary btn-group post-update" id="btn-update-post-{{ $post->id }}" hidden style="margin-top: 8px" data-post-id="{{ $post->id }}" >@lang('lang.Update_post')</button>
			<button class="btn btn-sm btn-danger btn-group cancel-edit" btn-cancle-post-id='{{ $post->id }}' id="btn-cancel-edit-{{ $post->id }}" hidden style="margin-top: 8px">@lang('lang.Cancle_editing')</button>
		</div>
		@endif

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
			<span class="likers" post-id='{{ $post->id }}' data-toggle="modal" data-target="#likeModal-{{ $post->id }}" style="margin-left: -10px;cursor: pointer" id="no_of_likes{{ $post->id }}">
				{{$count_like}}  @lang('lang.Likes')
			</span> 
			&nbsp&nbsp&nbsp
			  <div class="modal fade"  id="likeModal-{{ $post->id }}" role="dialog">
			    <div class="modal-dialog">
			      <!-- Modal content-->
			      <div class="modal-content col-md-6 col-sm-8 col-md-offset-3" >
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
				{{ $cCount=count($post->comments)  }} @lang('lang.Comments')
			</a>
		</div>
		@foreach($post->comments->take(4) as $comment )
		<div class="comment-rows-container hover-action scrollable-block" id="comment-block-{{ $comment->id }}">
			<div class="comment-row-item">
				<div class="avatar-preview avatar-preview-32">
					<a href="/user/{{ $comment->user->id }}">
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
					<button id="update-comment-{{ $comment->id }}" comment-id="{{ $comment->id }}" hidden class="btn btn-sm btn-default comment-update" style="margin-top: 5px" >@lang('lang.Update')</button>
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
		<div style="margin-left: 25px;padding:10px;" ><a href="post/{{ $post->id }}" >{{ $cCount-4  }}&nbsp @lang('lang.other_comments')</a></div>
		@endif
		<form method="Post" action="/post/comment">
		{{ csrf_field()}}
			<textarea class="text_area_enabled_comment 	" placeholder="{{ trans('lang.Leave_a_comment') }}" required  name="comment_body"></textarea>
			<input type="hidden" value={{ $post->id }} name="post_id">
			<div class="box-typical-footer">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell tbl-cell-action">
							<button type="submit" class="btn btn-rounded btn-danger">@lang('lang.Post_a_comment')</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</article>
	@endforeach