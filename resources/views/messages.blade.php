<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat realtime socket</title>
</head>
<body>
<div id="data">
    @foreach($messages as $message)
        <p id="{{$message->id}}">
            <strong>{{$message->author}}</strong>: {{$message->content}}
        </p>
    @endforeach
</div>
<div>
    <form action="" method="post">
        @csrf
        Name: <input type="text" name="author"/>
        <br>
        <br>
        Content: <textarea name="content" rows="5" style="width: 100%;"></textarea>
        <button type="submit" name="send">Send</button>
    </form>
</div>
<script
    src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script>
    // ket noi port node 6001
    var socket = io('http://localhost:6001');

    //lắng nghe
    socket.on('chat:message', function(data) {
        console.log(data)
        if ($('#'+data.id.length == 0)) {
            $('#data').append('<p>\n' +
            '            <strong>{{data.author}}</strong>: {{data.content}}\n' +
            '        </p>')
        } else {
            console.log('Đã có tin nhắn');
        }
    })
</script>
</body>
</html>
