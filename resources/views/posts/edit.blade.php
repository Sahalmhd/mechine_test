<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control" required>{{ $post->body }}</textarea>
            </div>

            <!-- Hidden inputs for user_id and admin_id -->
            <input type="hidden" name="user_id" id="user_id" value="{{ $post->user_id }}">
            <input type="hidden" name="admin_id" id="admin_id" value="{{ $post->admin_id }}">

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
</body>
</html>
