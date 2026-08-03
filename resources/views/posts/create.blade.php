<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    @include('components.layout')

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="mb-4">Create a New Post</h2>

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required maxlength="100">
                            </div>

                            <div class="mb-3">
                                <label for="created_by" class="form-label">Created By</label>
                                <input type="text" class="form-control" id="created_by" name="created_by" required maxlength="100">
                            </div>

                            <div class="mb-2">
                                <label for="description" class="form-label">Description <span class="text-muted">(optional)</span></label>
                                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Create Post</button>
                                <a href="{{ route('posts') }}" class="btn btn-outline-secondary">Cancel</a>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
