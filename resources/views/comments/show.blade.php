<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Comment</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
        }
        .button {
            display: inline-block;
            padding: 8px 16px;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            border: none;
        }
        .button-back {
            background-color: #007bff;  
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Comment</h1>

        <p><strong>ID:</strong> {{ $comment->id }}</p>
        <p><strong>Content:</strong> {{ $comment->content }}</p>
        <p><strong>Post ID:</strong> {{ $comment->post_id }}</p>

        <a href="{{ route('posts.show', $comment->post_id) }}" class="button button-back">Back to Post</a>
    </div>
</body>
</html>
