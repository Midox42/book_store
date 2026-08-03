<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .detail-card {
            max-width: 700px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 16px;
            background: white;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        }

        .label {
            font-weight: 600;
            color: #4b5563;
        }
    </style>
</head>
<body>
    @include('components.layout')

    <div class="container">
        <div class="detail-card">
            <h2 class="mb-4">Post Details</h2>
            <div class="mb-3">
                <div class="label">ID</div>
                <div>{{ $post->id }}</div>
            </div>
            <div class="mb-3">
                <div class="label">Title</div>
                <div>{{ $post->title }}</div>
            </div>
            <div class="mb-3">
                <div class="label">Description</div>
                <div>{{ $post->description }}</div>
            </div>
            <div class="mb-3">
                <div class="label">Created By</div>
                <div>{{ $post->created_by }}</div>
            </div>
            <a href="{{ route('posts') }}" class="btn btn-primary mt-3">Back to Posts</a>
        </div>
    </div>
</body>
</html>
