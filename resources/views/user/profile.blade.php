@extends('layouts.master')
@section('profilecontent')


<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
	@section('tabheader')
		<ul class="nav" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" href="/profile" role="tab" data-toggle="tab">
					<span class="nav-link-in">My Posts</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href='/setting' role="tab" data-toggle="tab">
					<span class="nav-link-in">setting</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/photos" role="tab" data-toggle="tab">
					<span class="nav-link-in">Photos</span>
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
						<button type="button" class="btn-icon">
							<i class="fa fa-globe"></i>
						</button>
						<button type="button" class="btn-icon">
							<i class="font-icon fa-globe"></i>
						</button>
						<button type="button" class="btn-icon">
							<i class=" fa fa-globe"></i>
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
								<div class="user-card-row-name"><a href="#">{{ $post->user->name }}</a></div>
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
				</div>
				<div class="box-typical-footer profile-post-meta">
					<a href="#" class="meta-item">
						<i class="fa fa-heart"></i>
						45 Like
					</a>
					<a href="#" class="meta-item">
						<i class="fa fa-comment"></i>
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

<<<<<<< HEAD
								
=======
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
									dob
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-user-circle"></i>
									{{ Auth::user()->gender }}
								</p>
								<p class="line-with-icon">
									<i class="font-icon fa fa-calendar-check-o"></i>
									{{ Auth::user()->created_at->diffForHumans() }}
								</p>

>>>>>>> a10d48bda64d1528661d68467a2849338a9dab95
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
<<<<<<< HEAD
								</div>
								<div class="tbl comment-row-item-header">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-name">Adam Oliver</div>
										<div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
=======
								</li>
							</ul>
						</div><!--.tabs-section-nav-->

						<div class="tab-content no-styled profile-tabs">
							<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">


								<form method="POST" action="/post" enctype="multipart/form-data" class="box-typical">
									{{ csrf_field() }}
									<textarea class="write-something" name="post_body"  placeholder="What`s on your mind"></textarea>
									<div class="box-typical-footer">
										<div class="tbl">
											<div class="tbl-row">
												<div class="tbl-cell">
													<button type="button" class="btn-icon">
													<i class="font-icon fa fa-picture-o"></i>
													</button>
													<button type="button" class="btn-icon">
												<i class="font-icon fa fa-video-camera "></i>
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
													<div class="user-card-row-name"><a href="#">{{ $post->user->name }}</a></div>
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
									</div>
									<div class="box-typical-footer profile-post-meta">
										<a href="#" class="meta-item">
											<i class="fa fa-heart"></i>
											45 Like
										</a>
										<a href="#" class="meta-item">
											<i class="fa fa-comment"></i>
											18 Comment
										</a>
									</div>
									<div class="comment-rows-container hover-action scrollable-block">
										<div class="comment-row-item">
											<div class="avatar-preview avatar-preview-32">
												<a href="#">
													<img src="images/photo-64-2.jpg" alt="">
												</a>
											</div>
											<div class="tbl comment-row-item-header">
												<div class="tbl-row">
													<div class="tbl-cell tbl-cell-name">Eric Fox</div>
													<div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
												</div>
											</div>
											<div class="comment-row-item-content">
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
												<button type="button" class="comment-row-item-action edit">
													<i class="fa fa-pencil"></i>
												</button>
												<button type="button" class="comment-row-item-action del">
													<i class="fa fa-trash-o"></i>
												</button>
											</div>
										</div><!--.comment-row-item-->

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
												<p>Yes!</p>
												<button type="button" class="comment-row-item-action edit">
													<i class="fa fa-pencil"></i>
												</button>
												<button type="button" class="comment-row-item-action del">
													<i class="fa fa-trash-o"></i>
												</button>
											</div>
										</div><!--.comment-row-item-->

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
									</div><!--.comment-rows-container-->
									<input type="text" class="write-something" placeholder="Leave a comment"/>
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
								</article>
								@endforeach
								@foreach($posts as $post)
								<article class="box-typical profile-post">
									<div class="profile-post-header">
										<div class="user-card-row">
											<div class="tbl-row">
												<div class="tbl-cell tbl-cell-photo">
													<a href="#">
														<img src=images/{{ $post->user->image }} alt="no Pic">
													</a>
												</div>
												<div class="tbl-cell">
													<div class="user-card-row-name"><a href="#">{{ $post->user->name }}</a></div>
													<div class="color-blue-grey-lighter">{{ $post->created_at->diffForHumans() }}</div>
												</div>
											</div>
										</div>
										<a href="#" class="shared">
											<i class="fa fa-share-alt"></i>
										</a>
									</div>
									<div class="profile-post-content">
										<p class="profile-post-content-note">Added 4 new pictures</p>
										<p>{{ $post->body }} </p>
										<div class="profile-post-gall-fluid profile-post-gall-grid" data-columns>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-1.jpg">
													<img src="img/gall-img-1.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-2.jpg">
													<img src="img/gall-img-2.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-3.jpg">
													<img src="img/gall-img-3.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-4.jpg">
													<img src="img/gall-img-4.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-5.jpg">
													<img src="img/gall-img-5.jpg" alt="">
												</a>
											</div>
											<div class="col">
												<a class="fancybox" rel="gall-1" href="images/gall-img-6.jpg">
													<img src="images/gall-img-6.jpg" alt="">
												</a>
											</div>
										</div>
									</div>
									<div class="box-typical-footer profile-post-meta">
										<a href="#" class="meta-item">
											<i class="fa fa-heart"></i>
											45 Like
										</a>
										<a href="#" class="meta-item">
											<i class="fa fa-comment"></i>
											18 Comment
										</a>
>>>>>>> a10d48bda64d1528661d68467a2849338a9dab95
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
								<div class="tbl-cell">
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
								</div>
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