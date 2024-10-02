<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Post Details</h1>

        <h3>{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        
        <!-- User ID and Admin ID fields removed -->
        
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
</body>
</html>
