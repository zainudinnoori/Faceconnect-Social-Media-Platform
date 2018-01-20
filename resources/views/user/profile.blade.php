@extends('layouts.usermaster')
@section('profilecontent')


<div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
    @section('tabheader')
        <ul class="nav" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="/profile" role="tab" data-toggle="tab">
                    <span class="nav-link-in">Posts</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user/{{ $user->id }}/photos" role="tab" data-toggle="tab">
                    <span class="nav-link-in">Photos</span>
                </a>
            </li>
    @endsection
    @if(count($posts))
        <div id="FollowingPosts">
           @include('home.posts')
        </div>
        <div class="ajax-load text-center">
            <p style='background-color:white'><img src="/images/loading.gif">Loading More post</p>
        </div>
    @else
        <article class="box-typical profile-post">
            <h1 style="color: red" align="center">{{ $user->name }} Didn't Post Anything Yet</h1>
            <h1 align="center"><i class="fa fa-bars fa-1x" aria-hidden="true"></i></h1>
            <h3  style="color: #999" align="center">He has joined <span style="color: blue">faceconnet</span> {{ $user->created_at->diffForHumans() }}</h3>
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