<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <title>Laravel Blog</title>
</head>
<body>
    <div class="wrapper">
        <h1>Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="POST" class="edit-post-wrapper">
            @csrf
            @method("PUT")
            <input type="text" name="title" value="{{$post->title}}">
            <textarea name="body">{{$post->body}}</textarea>
            <button>Save Changes</button>
        </form>
    </div>
</body>
</html>