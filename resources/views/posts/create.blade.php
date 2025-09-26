<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;  
            margin: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 12px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);  
            border: 1px solid #ddd;  
        }

        h1 {
            margin-bottom: 20px;  
            font-size: 24px; 
            color: #333;  
        }

        label {
            display: block;
            margin-bottom: 8px;  
            font-weight: bold;
            font-size: 14px;
            color: #555;  
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;  
            margin-bottom: 15px;  
            border: 1px solid #ccc;  
            border-radius: 8px;  
            box-sizing: border-box;
            font-size: 14px;
        }

        textarea {
            resize: vertical;  
            min-height: 100px;  
        }

        button {
            padding: 10px 20px;  
            background-color: #007bff;
            border: none;
            border-radius: 8px;  
            color: #fff;
            font-size: 16px;  
            cursor: pointer;
            transition: background-color 0.3s ease;  
        }

        button:hover {
            background-color: #0056b3;  
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>

            <label for="body">Body:</label>
            <textarea id="body" name="body" rows="4" required>{{ old('body') }}</textarea>

            <button type="submit">Create Post</button>
        </form>
    </div>
</body>
</html>
