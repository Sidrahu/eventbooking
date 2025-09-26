<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
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
        .button-submit {
            background-color: #28a745;  
        }
        .button-cancel {
            background-color: #007bff;  
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Comment</h1>

        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="4" cols="50" required>{{ old('content', $comment->content) }}</textarea>
            </div>

            <button type="submit" class="button button-submit">Update Comment</button>
            <a href="{{ route('posts.show', $comment->post_id) }}" class="button button-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
