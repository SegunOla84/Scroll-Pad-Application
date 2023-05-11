<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

    @auth
    <div class="content">
       



        <p class="head2">Welcome! Write something worth reading….</p>
        <form action='/logout' method="POST">
            @csrf
            <button class="button">logout</button>
        </form>

        <div>
            <h2 class="head">Create A New Post</h2>
            <form action="/posted" method="POST">
                @csrf
            <input type="text" name="title" class="input-area" placeholder="Title" rows="4" cols="30"><br>
            <textarea name="body" class="input-area"  placeholder="Body Content..." rows="10" cols="100"></textarea><br>
            <button class="button">Save Post</button>
            </form>
        </div>
    
        <div>
            <h2>Feeds</h2>
            @foreach ($posts as $post)
              <div class="pad">
                <h3>{{$post['title']}}</h3>
                    {{$post['body']}} <br>
                    <br>
                    <br>
                    
                    (posted by {{$post->user->name}})
                    <p><a href="/ed-post/{{$post->id}}">Edit</a></p>
                    
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button2">Delete</button>
                    </form> 
              </div>  
            @endforeach

        
            
        </div>

    </div>  


    @else

    <div class="forms">

        <div class="reg">                      
        
          <form action="/register" method="POST">
          @csrf
            <input name='name' class="input-area"  type='text' placeholder="name">
                <input name='email' class="input-area"  type='email' placeholder="email">
                    <input name='password' class="input-area"  type='password' placeholder="password">
                          <button class="button">Register</button>
                            </form>
        </div>

        <div class="log">
           
            <form action="/login" method="POST">
                 @csrf
                      <input name='login_name' class="input-area"  type='text' placeholder="name">
                        <input name='login_password' class="input-area"  type='password' placeholder="password">
                             <button class="button" >Login</button>
                                </form>
        </div>                                
    </div>                                
        
            
        

        <div class="content">

            <div class="img">
            <img src="/images/scroll1.jpg" alt="welcome image">
            </div>

            <div class="title">SCROLL PAD</div>

            <h2 class="head">Recent Feeds</h2>
            @foreach ($posts as $post)
              <div class="pad">
                <h3>{{$post['title']}}</h3>
                    {{$post['body']}}
              </div>  
            @endforeach

           
        </div>
    @endauth

    
</body>
</html>