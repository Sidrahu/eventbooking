<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
        }

        .comment-list {
            margin-top: 20px;
        }

        .comment {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .comment-actions {
            margin-top: 10px;
        }

        .button {
            display: inline-block;
            padding: 4px 8px;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            border: none;
        }

        .button-view {
            background-color: #007bff; 
        }

        .button-edit { 
        }

        .button-delete {
            background-color: #dc3545;  
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Comments</h1>
        <div class="comment-list">
    
            @foreach($comments as $comment)
                <div class="comment">
                    <p>{{ $comment->content }}</p>
                    <div class="comment-actions">
                        <a href="{{ route('comments.show', $comment->id) }}" class="button button-view">View</a>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="button button-edit">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
