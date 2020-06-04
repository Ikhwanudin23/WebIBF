<html>
<head>
    <title>Pusher Test</title>
</head>
<body>
<h1>Pusher Test</h1>
<p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
</p>
<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('362f1f8218cb607ebc5d', {
        cluster: 'ap1',
        encrypted: true
    });

    var channel = pusher.subscribe('flood');
    channel.bind('App\\Events\\FloodEvent', function(data) {
        console.log(data)
        alert(JSON.stringify(data));
    });
</script>
</body>
</html>