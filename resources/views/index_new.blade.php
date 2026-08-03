<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            :root {
                --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            }

            body {
                min-height: 100vh;
                font-family: 'Inter', 'Instrument Sans', 'Segoe UI', system-ui, -apple-system, sans-serif;
                background: #f8fafc;
                color: #1e293b;
                margin: 0;
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
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
                width: 100%;
                display: flex;
                justify-content: center;
            }

            .index-container {
                max-width: 1000px;
                width: 100%;
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                border-radius: 24px;
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
                padding: 40px;
                border: 1px solid rgba(255, 255, 255, 0.3);
            }

            @media (prefers-color-scheme: dark) {
                .index-container {
                    background: rgba(30, 41, 59, 0.7);
                    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
                    border: 1px solid rgba(255, 255, 255, 0.05);
                }
            }

            .index-header h1 {
                font-size: 2.5rem;
                font-weight: 800;
                letter-spacing: -0.025em;
                color: inherit;
                margin-bottom: 10px;
            }

            .index-header p {
                color: #64748b;
                font-size: 1.1rem;
                margin-bottom: 30px;
            }

            @media (prefers-color-scheme: dark) {
                .index-header p {
                    color: #94a3b8;
                }
            }

            .feature-list {
                list-style: none;
                padding: 0;
                margin-bottom: 30px;
            }

            .feature-item {
                display: flex;
                align-items: center;
                gap: 15px;
                padding: 12px 0;
                border-bottom: 1px solid rgba(0,0,0,0.05);
                color: #475569;
            }

            @media (prefers-color-scheme: dark) {
                .feature-item {
                    border-bottom: 1px solid rgba(255,255,255,0.05);
                    color: #cbd5e1;
                }
            }

            .feature-link {
                color: #6366f1;
                text-decoration: none;
                font-weight: 600;
                transition: color 0.2s;
            }

            .feature-link:hover {
                color: #4f46e5;
                text-decoration: underline;
            }

            .textarea-section {
                background: rgba(255, 255, 255, 0.5);
                border-radius: 16px;
                padding: 25px;
                margin-bottom: 30px;
                border: 1px solid rgba(255, 255, 255, 0.5);
            }

            @media (prefers-color-scheme: dark) {
                .textarea-section {
                    background: rgba(30, 41, 59, 0.5);
                    border: 1px solid rgba(255, 255, 255, 0.05);
                }
            }

            .textarea-label {
                display: block;
                margin-bottom: 10px;
                font-weight: 600;
                font-size: 0.9rem;
                color: inherit;
            }

            .custom-textarea {
                width: 100%;
                padding: 12px;
                border-radius: 12px;
                border: 1px solid #e2e8f0;
                background: rgba(255, 255, 255, 0.8);
                color: #1e293b;
                font-family: inherit;
                transition: all 0.2s ease;
                resize: vertical;
                min-height: 130px;
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
                .custom-textarea:focus {
                    border-color: #a855f7;
                    box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.2);
                }
            }

            .btn-custom {
                padding: 10px 24px;
                border-radius: 12px;
                font-weight: 600;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                cursor: pointer;
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

            .btn-outline {
                background: transparent;
                color: #64748b;
                border: 1px solid #e2e8f0;
            }

            .btn-outline:hover {
                background: #f1f5f9;
                color: #1e293b;
                border-color: #cbd5e1;
            }

            @media (prefers-color-scheme: dark) {
                .btn-outline {
                    color: #94a3b8;
                    border-color: #334155;
                }
                .btn-outline:hover {
                    background: #1e293b;
                    color: #f1f5f9;
                    border-color: #475569;
                }
            }

            .index-nav {
                display: flex;
                gap: 12px;
                align-items: center;
            }
        </style>
    </head>
    <body>
        <div class="page-shell">
            <div class="index-container">
                @include('components.layout')

                <header class="index-header d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h1>{{ config('app.name', 'Laravel') }}</h1>
                        <p>index to your modern application ecosystem.</p>
                    </div>
                    @if (Route::has('login'))
                        <nav class="index-nav">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn-custom btn-primary-grad">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn-custom btn-outline">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn-custom btn-primary-grad">
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="index-content">
                            <h3 class="mb-3" style="font-weight: 700;">Let's get started</h3>
                            <p class="mb-4 text-muted">Laravel has an incredibly rich ecosystem. We suggest starting with the following resources to build your application.</p>
                            
                            <ul class="feature-list">
                                <li class="feature-item">
                                    <span>Read the <a href="https://laravel.com/docs" target="_blank" class="feature-link">Documentation</a></span>
                                </li>
                                <li class="feature-item">
                                    <span>Watch video tutorials at <a href="https://laracasts.com" target="_blank" class="feature-link">Laracasts</a></span>
                                </li>
                            </ul>

                            <div class="textarea-section">
                                <label for="message" class="textarea-label">Your Message</label>
                                <textarea 
                                    id="message" 
                                    name="message" 
                                    placeholder="Write your thoughts here..." 
                                    class="custom-textarea"
                                ></textarea>
                            </div>

                            <div class="d-flex justify-content-start gap-3 mt-4">
                                <a href="https://cloud.laravel.com" target="_blank" class="btn-custom btn-primary-grad">
                                    Deploy now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>