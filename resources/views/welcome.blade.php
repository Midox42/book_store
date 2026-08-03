<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - BlogHub</title>

        <!-- Fonts & Styles -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://unpkg.com/feather-icons"></script>
        <style>
            :root {
                --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            }

            body {
                min-height: 100vh;
                font-family: 'Inter', system-ui, -apple-system, sans-serif;
                background: #f8fafc;
                color: #1e293b;
                margin: 0;
                padding: 0;
            }

            @media (prefers-color-scheme: dark) {
                body {
                    background: #0f172a;
                    color: #f1f5f9;
                }
            }

            .page-shell {
                position: relative;
                padding: 2rem 1rem;
            }

            .welcome-container {
                max-width: 1200px;
                margin: 0 auto;
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-radius: 24px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
                padding: 40px;
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            @media (prefers-color-scheme: dark) {
                .welcome-container {
                    background: rgba(30, 41, 59, 0.7);
                    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
                    border: 1px solid rgba(255, 255, 255, 0.05);
                }
            }

            h1 {
                font-size: 2.5rem;
                font-weight: 800;
                letter-spacing: -0.025em;
                color: inherit;
                display: flex;
                align-items: center;
                gap: 15px;
            }

            h1::after {
                content: '';
                flex-grow: 1;
                height: 1px;
                background: rgba(0,0,0,0.05);
            }

            @media (prefers-color-scheme: dark) {
                h1::after {
                    background: rgba(255,255,255,0.05);
                }
            }

            .feature-card {
                background: rgba(255, 255, 255, 0.5);
                border-radius: 16px;
                padding: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.5);
                height: 100%;
                transition: all 0.3s ease;
            }

            .feature-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 12px 30px rgba(0,0,0,0.08);
            }

            @media (prefers-color-scheme: dark) {
                .feature-card {
                    background: rgba(30, 41, 59, 0.5);
                    border: 1px solid rgba(255, 255, 255, 0.05);
                }
            }

            .btn-custom {
                padding: 10px 20px;
                border-radius: 10px;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                border: none;
            }

            .btn-primary-grad {
                background: var(--primary-gradient);
                color: white;
                box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
            }

            .btn-primary-grad:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
                color: white;
            }

            .btn-success-custom {
                background-color: #10b981;
                color: white;
                box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
            }

            .btn-success-custom:hover {
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
                color: white;
            }

            .textarea-section {
                background: rgba(255, 255, 255, 0.5);
                border-radius: 16px;
                padding: 2rem;
                margin-top: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.5);
            }

            @media (prefers-color-scheme: dark) {
                .textarea-section {
                    background: rgba(30, 41, 59, 0.5);
                    border: 1px solid rgba(255, 255, 255, 0.05);
                }
            }

            .custom-textarea {
                width: 100%;
                padding: 14px;
                border-radius: 12px;
                border: 1px solid rgba(0,0,0,0.1);
                background: rgba(255, 255, 255, 0.8);
                color: inherit;
                font-family: inherit;
                transition: all 0.2s ease;
                resize: vertical;
                min-height: 120px;
            }

            .custom-textarea:focus {
                outline: none;
                border-color: #6366f1;
                box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
            }

            @media (prefers-color-scheme: dark) {
                .custom-textarea {
                    background: rgba(15, 23, 42, 0.5);
                    border-color: #334155;
                    color: #f1f5f9;
                }
            }
        </style>
    </head>
    <body>
        <div class="page-shell">
            <div class="welcome-container">
            @include('components.layout')

                <div class="d-flex justify-content-between align-items-center mb-5 mt-3">
                    <div>
                        <h1 class="mb-2"><i data-feather="layout"></i> BlogHub Ecosystem</h1>
                        <p class="fs-5">Welcome to your modern blogging application and community hub.</p>
                    </div>
                </div>

                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="text-primary mb-3">
                                <i data-feather="file-text" style="width: 32px; height: 32px;"></i>
                            </div>
                            <h2 class="h4 mb-3 fw-bold">Posts Management</h2>
                            <p class="mb-4">View, create, edit, and delete blog posts seamlessly with our modern management interface.</p>
                            <a href="{{ route('posts') }}" class="btn-custom btn-primary-grad w-100">
                                <i data-feather="list" style="width: 16px; height: 16px;"></i> Go to Posts
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="text-success mb-3">
                                <i data-feather="info" style="width: 32px; height: 32px;"></i>
                            </div>
                            <h2 class="h4 mb-3 fw-bold">About Us</h2>
                            <p class="mb-4">Discover the story behind BlogHub, our mission, inspiration, and community values.</p>
                            <a href="{{ route('about.us') }}" class="btn-custom btn-success-custom w-100">
                                <i data-feather="users" style="width: 16px; height: 16px;"></i> View About Us
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="text-info mb-3">
                                <i data-feather="book-open" style="width: 32px; height: 32px;"></i>
                            </div>
                            <h2 class="h4 mb-3 fw-bold">Laravel Ecosystem</h2>
                            <p class="">Explore official documentation and tutorials to learn more about building robust applications with Laravel.</p>
                            <a href="https://laravel.com/docs" target="_blank" class=" btn-custom w-100" style="background: #334155; color: white;">
                                <i data-feather="external-link" style="width: 16px; height: 16px;"></i> Documentation
                            </a>
                    </div>
                    </div>
        </div>

                <div class="textarea-section">
                    <label for="message" class="form-label fw-bold mb-2"><i data-feather="edit-3" style="width: 16px; height: 16px;" class="me-1"></i> Quick Message & Thoughts</label>
                    <textarea
                        id="message"
                        name="message"
                        placeholder="Write your quick thoughts, notes, or ideas here..."
                        class="custom-textarea"
                    ></textarea>
        </div>
            </div>
        </div>

        <script>
            feather.replace();
        </script>
    </body>
</html>

