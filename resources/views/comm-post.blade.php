<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Comment on Post</h1>

    <div style="background-color: gray; padding: 10px; margin: 10px">
        <h3>{{$post['title']}}</h3>
            {{$post['body']}} <br>
            <br>
            <br>
            
            (posted by {{$post->user->name}})
            
      </div>  

    <form action="/comments-text" method="POST">
        @csrf
        <textarea name="body" placeholder="type comment here..."></textarea>
        <button>Post Comment</button>
    </form>

</body>
</html>