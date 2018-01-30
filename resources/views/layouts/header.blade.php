
{{-- <input type="text" name="search_text" id="search_text" placeholder='Search Text'> --}}

<form id="searchthis" action="/search" style="float: left;" method="get">
	{{ csrf_field() }}
	<input id="namanyay-search-box" name="search_text" type="text" placeholder='{{ trans('lang.Search_for_a_friend') }}'/>
	<input id="namanyay-search-btn" value=@lang('lang.Go') type="submit"/>
</form>


<div class="col-md-1">
	<img class="img img-circle" src="/images/{{ Auth::user()->image }}" width="50px" height="50px">
</div>
<div style="float: left">&nbsp &nbsp
	<a href="/profile" style="color: black;">
		<strong>{{ Auth::user()->name }}</strong>
	</a>
</div>&nbsp &nbsp&nbsp &nbsp

<span>
	<a href="/home"><i class="fa fa-home fa-lg" style="color:blue" aria-hidden="true" title="{{ trans('lang.Home') }}"></i>
</span></a>&nbsp &nbsp

<span>
	<a href="/chatting"><i class="fa fa-comments fa-lg" style="color:red" aria-hidden="true" title="Messages!"></i></a>
</span>&nbsp &nbsp

<span id="notification-refresh">
		<?php 
			$notifications = Auth::user()->unreadnotifications;
		?>
      <i class="fa fa-globe fa-lg" style="color:blue" id="click" aria-hidden="true" title="Notifications!">
     
        <sup id="nCount" class="badge" style="color:white!important;background: #f45427;">{{ count($notifications) }} </sup></i>
</span>
  <div id="notification" > 
    <div class="row col-md-4 col-md-offset-5">
      <div class="panel panel-default">
        <div class="panel-heading"><b>
          {{Auth::user()->name}}</b> @lang('lang.notifications') 
        </div>
        <div class="panel-body">
            <?php $i=0 ?>
          @foreach(Auth::user()->notifications as $notification)
            @if($i != 5)
            <?php $i++ ?>
            <?php $u=App\User::find($notification->data['user_id']);?>

            <div class="panel-body"  style="background-color:rgb(248,248,248);margin: 2px">

              <div class="col-sm-1">
                <!-- rgb(220,220,220) -->
              <img src="/images/{{$u->image}}" class="img img-rounded" width="40px" height="40px" alt="noPic">
              </div> 
              <div class="col-md-offset-3">
             {{$notification->created_at->diffForHumans()}}<br>

              <strong>
                <a href="/user/{{$u->id}}">
                
                   {{$u->name}}
                </a>               
               </strong> 
               @if($notification->type === "App\Notifications\PostComment" )
                  <a style="color: black" href="post/{{$notification->data['user_id']}}">
                    Has Commented on your post &nbsp" 
                    <span style="color: darkred">
                      {{substr($notification->data['comment_body'],0,22)}}...
                    </span>"
                  </a>
                    @elseif($notification->type === "App\Notifications\FollowUser" )
                      is follwing you
                  @else
                    <a style="color: black" href="post/{{$notification->data['user_id']}}">
                     Has liked your post 
                   </a>
                @endif
             
             </div>
            </div>
     
            @endif
          @endforeach
        </div>
        <div class="panel-footer">
          see all
        </div>
      </div>
    </div>
  </div>

  <span class="col-sm-offset-3">
    @if(Auth::check())
      @if($impersonateStart ?? '')
        <a href="/stopImpersonate">
        <b>Stop Impersonate</b>
      </a>
      @else
      <div class="btn-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account&nbsp&nbsp<i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/profile">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp
                My Profile
          </a>
          <a class="dropdown-item" href="/setting"><i class="fa fa-cog" aria-hidden="true"></i>&nbsp
Profile Settings</a>
          <a class="dropdown-item" href="/photos"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp
            My Gallery
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/logout" style="color: red"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp
{{ trans('lang.Logout') }}</a>
        </div>
      </div>
            @endif
    @endif
  </span>











	
