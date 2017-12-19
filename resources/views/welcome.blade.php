<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

@foreach ($user->notifications as $notification) 
    {{$notification->type}}
    {{$notification->notifiable_id}}</br>
 
@endforeach


@foreach ($user->unreadNotifications as $notification) 
     {{$notification->type}}</br>
@endforeach


</body>
</html>