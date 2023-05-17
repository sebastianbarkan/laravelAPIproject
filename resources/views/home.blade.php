<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <title>Laravel Blog</title>
</head>
<body>
    <div class="wrapper"> 
    @auth
    <div class="login-wrapper">
        <p>Congrats logged in</p>
        <form action="/logout" method="POST" >
            @csrf
            <button>Log Out</button>
        </form>
    </div>

    <div>
        <h2>Create a New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body content..."></textarea>
            <button>Save Post</button>
        </form>
    </div>

    <div>
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div>
            <h3>{{$post['title']}} by {{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>
    @else
    <div class="auth-wrapper">
        <h2>Login</h2>
        <form action="/login" method="POST" class="auth-form">
            @csrf
            <input name="loginname" type="text" placeholder="name"> 
            <input name="loginpassword" type="password" placeholder="password">
            <button>Login</button>
        </form>
    </div>
    <div class="auth-wrapper">
        <h2>register</h2>
        <form action="/register" method="POST" class="auth-form">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    @endauth
    </div>
</body>
</html>