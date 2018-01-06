<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('5d1933e6ff957eaf5944', {
      cluster: 'ap2',
      encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      
      $('#called').text('clicked once');
      alert(data.message);
    });
  </script>
  <body>
    <h1 id="called"></h1>
  </body>
</head>