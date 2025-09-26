<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .post-section {
            margin-bottom: 30px;
        }

        .post-section h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .post-section p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .post-section img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .comments-section {
            padding: 20px;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .comments-section h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        .comment-item {
            background: #fff;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            transition: box-shadow 0.3s ease;
        }

        .comment-item:hover {
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .comment-item img {
            max-width: 50px;
            height: auto;
            margin-right: 15px;
            border-radius: 50%;
        }

        .comment-item strong {
            font-size: 16px;
            color: #333;
        }

        .comment-item p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .comment-item small {
            display: block;
            font-size: 12px;
            color: #999;
        }

        .reply-form {
            margin-top: 10px;
        }

        .reply-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .reply-form button {
            padding: 10px 15px;
            background-color: #007bff;  
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;  
        }

        .reply-form button:hover {
            background-color: #0056b3;
        }

        .reply-container {
            margin-left: 20px;
            margin-top: 10px;
            padding-left: 10px;
            border-left: 2px solid #ddd;
        }

        .reply-item {
            background: #f1f1f1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }

        .reply-item img {
            max-width: 30px;
            height: auto;
            margin-right: 10px;
            border-radius: 50%;
        }

        .form-container {
            margin-top: 20px;
        }

        .form-container label {
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-container textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            margin-bottom: 15px;
            font-size: 14px;
            width: 100%;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #007bff;  
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Post Section -->
        <div class="post-section">
            <img src="{{ asset('dist/assets/img/post10.jpg') }}" alt="Post Image">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
        </div>

        <!-- Comments Section -->
      
<div class="comments-section">
    <h2>Comments</h2>
    @if($comments->isEmpty())
        <p>No comments available.</p>
    @else
        <div class="comments-container">
            @foreach($comments as $comment)
                @if(is_null($comment->parent_id))  
                    <div class="comment-item">
                        <img src="{{ asset('dist/assets/img/author2.jpg') }}" alt="User Image">
                        <div>
                            <strong>{{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong>
                            <p>{{ $comment->content }}</p>
                            <small>{{ $comment->created_at->diffForHumans() }}</small>



                            <!-- Admin Debugging Information approval section -->
                            @if(auth()->check())
                            <p>User ID: {{ auth()->user()->id }}</p>
                            <p>Is Admin: {{ auth()->user()->is_admin ? 'Yes' : 'No' }}</p>
                        @endif
                        
                        <!-- Check if user is admin or has a specific username for approval -->
                        @if(auth()->user() && (auth()->user()->is_admin || auth()->user()->username === 'adminUser'))
                            <form action="{{ route('comments.approve', $comment->id) }}" method="POST" style="margin-top: 10px;">
                                @csrf
                                <button type="submit">Approve</button>
                            </form>
                        @endif
                        

                        

                            <!-- Reply Form -->
                            <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form">
                                @csrf
                                <textarea name="reply_content" required placeholder="Write a reply..."></textarea>
                                <button type="submit">Reply</button>
                            </form>

                            <!-- Display Replies -->
                            @if($comment->replies->count())
                                <div class="reply-container">
                                    @foreach($comment->replies as $reply)
                                        <div class="reply-item">
                                            <img src="{{ asset('dist/assets/img/author3.jpg') }}" alt="User Image">
                                            <div>
                                                <strong>{{ $reply->user ? $reply->user->name : 'Anonymous' }}</strong>
                                                <p>{{ $reply->content }}</p>
                                                <small>{{ $reply->created_at->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <!-- Add Comment Form -->
    <div class="form-container">
        <form action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf
            <label for="content">Comment:</label>
            <textarea id="content" name="content" required rows="4"></textarea>
            
            @if(auth()->check())
                <p><strong>Posting as: {{ auth()->user()->name }}</strong></p>
            @else
                <p>Please log in to comment.</p>
            @endif
            
            <button type="submit">Post Comment</button>
        </form>
    </div>
</div>

    </div>
</body>
</html>
