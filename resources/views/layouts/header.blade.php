
{{-- <input type="text" name="search_text" id="search_text" placeholder='Search Text'> --}}
<div class="row">
<form id="searchthis" action="/search" style="float: left;" method="get">
	{{ csrf_field() }}
	<input id="namanyay-search-box" name="search_text" type="text" placeholder="Search for a friend"/>
	<input id="namanyay-search-btn" value="Go" type="submit"/>
</form>


<div class="col-md-1">
	<img class="img img-circle img-responsive" src=/images/{{ Auth::user()->image }} width="50px" height="50px">
</div>
<div style="float: left">&nbsp &nbsp
	<a href="/profile" style="color: black;">
		<strong>{{ Auth::user()->name }}</strong>
	</a>
</div>&nbsp &nbsp&nbsp &nbsp

<span>
	<a href="/home"><i class="fa fa-home fa-lg" style="color:blue" aria-hidden="true" title="Home"></i>
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
          {{Auth::user()->name}}</b> look your notifications 
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
<a href="logout">
	<b>Logout</b>
</a>
</span>
@endif
</div>









	
