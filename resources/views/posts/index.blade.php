<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @foreach($posts as $post)
            <div class="post-header">
                <h1>{{ $post->title }}</h1>
                <img src="{{ $post->image_url }}" alt="Post Image" style="max-width: 100%; height: auto;">
                <p>{{ $post->body }}</p>
            </div>

            <div class="comments-section">
                <h2>Comments</h2>
                @if($post->comments->isEmpty())
                    <p>No comments available.</p>
                @else
                    <div class="comments-container">
                        @foreach($post->comments as $comment)
                            <div class="comment-item">{{ $comment->content }}</div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Add Comment Form -->
            <div class="form-container">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <label for="content">Comment:</label>
                    <textarea id="content" name="content" required></textarea>
                    <button type="submit">Post Comment</button>
                </form>
            </div>
        @endforeach
    </div>
</body>
</html>
