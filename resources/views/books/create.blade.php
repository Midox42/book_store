<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK store — Add New Book</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b0d12;
            --surface: #13161f;
            --surface-hover: #191d28;
            --fg: #f3f4f6;
            --muted: #9ca3af;
            --border: #1f2430;
            --accent: #ff5c35;
            --accent-glow: rgba(255, 92, 53, 0.25);
            --font-display: 'Instrument Serif', Georgia, serif;
            --font-body: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg);
            color: var(--fg);
            font-family: var(--font-body);
            font-size: 16px;
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navigation */
        header {
            position: sticky;
            top: 0;
            height: 84px;
            background: rgba(11, 13, 18, 0.9);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 64px;
            z-index: 100;
        }

        .logo {
            font-family: var(--font-display);
            font-size: 32px;
            font-weight: 400;
            letter-spacing: -0.01em;
            color: var(--fg);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span {
            color: var(--accent);
        }

        nav ul {
            display: flex;
            gap: 32px;
            list-style: none;
            align-items: center;
        }

        nav a {
            color: var(--muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
            transition: color 0.2s ease;
        }

        nav a:hover, nav a.active {
            color: var(--fg);
        }

        .nav-actions {
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--fg);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-outline:hover {
            border-color: var(--muted);
            background: var(--surface);
        }

        .btn-primary {
            background: var(--accent);
            border: none;
            color: #fff;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            box-shadow: 0 4px 16px var(--accent-glow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(255, 92, 53, 0.4);
        }

        /* Main Container */
        .main-container {
            flex: 1;
            max-width: 800px;
            width: 100%;
            margin: 64px auto;
            padding: 0 24px;
        }

        .page-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .page-header h1 {
            font-family: var(--font-display);
            font-size: 52px;
            font-weight: 400;
            letter-spacing: -0.02em;
            margin-bottom: 12px;
            color: var(--fg);
        }

        .page-header p {
            color: var(--muted);
            font-size: 17px;
        }

        /* Form Card */
        .form-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 48px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .form-group {
            margin-bottom: 28px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 10px;
            color: var(--fg);
            letter-spacing: 0.01em;
        }

        .form-label span.optional {
            color: var(--muted);
            font-weight: 400;
            font-size: 13px;
        }

        .form-control, .form-select {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 14px 18px;
            color: var(--fg);
            font-family: var(--font-body);
            font-size: 15px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            outline: none;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 36px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--border);
            padding: 48px 64px;
            background: var(--surface);
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            header {
                padding: 0 24px;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .form-card {
                padding: 24px;
            }
            .page-header h1 {
                font-size: 40px;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation -->
    <header data-od-id="main-nav">
        <a href="{{ route('index') }}" class="logo">
            BK store<span>.</span>
        </a>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('books') }}">Catalog</a></li>
                <li><a href="{{ route('about.us') }}">About</a></li>
                <li><a href="{{ route('books.create') }}" class="active">Add Book</a></li>
            </ul>
        </nav>
        <div class="nav-actions">
            <a href="#" class="btn-outline">Log In</a>
            <a href="#" class="btn-primary" style="padding: 10px 20px;">Sign Up</a>
        </div>
    </header>

    <!-- Main Container -->
    <main class="main-container" data-od-id="create-book-container">
        <div class="page-header">
            <h1>Add a New Book</h1>
            <p>Contribute a literary masterpiece or new release to the BK store catalog.</p>
        </div>

        <div class="form-card">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="e.g., The Architecture of Modern Thought" required maxlength="100">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="created_by" class="form-label">Author / Creator</label>
                        <input type="text" class="form-control" id="created_by" name="created_by" placeholder="e.g., Elena Vance" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre" name="genre" required>
                            <option value="" disabled selected>Select a genre</option>
                            <option value="Fiction">Fiction & Literature</option>
                            <option value="Sci-Fi">Sci-Fi & Futurism</option>
                            <option value="Design">Design & Architecture</option>
                            <option value="Philosophy">Philosophy & Mind</option>
                            <option value="Biography">Biography & Memoir</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price" class="form-label">Price ($)</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="28.00" required>
                    </div>
                    <div class="form-group">
                        <label for="cover_image" class="form-label">Cover Image File <span class="optional">(optional)</span></label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*" style="padding: 10px;">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="form-label">Synopsis & Description <span class="optional">(optional)</span></label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter a rich summary of the book's themes, characters, and impact..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-primary" style="flex: 1; padding: 14px;">Publish Book to Catalog</button>
                    <a href="{{ route('books') }}" class="btn-outline" style="padding: 14px 28px; text-align: center;">Cancel</a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2026 BK store. Crafted with the My Laravel Project design system.</p>
    </footer>

</body>
</html>
