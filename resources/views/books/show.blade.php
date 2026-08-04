<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK store — Book Details</title>
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
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 15px;
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

        .main-container {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 64px auto;
            padding: 0 64px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 60px;
            align-items: start;
        }

        .book-cover-showcase {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 48px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 480px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
            position: relative;
        }

        .book-mockup {
            width: 260px;
            height: 380px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f2f5 100%);
            border-radius: 4px 12px 12px 4px;
            padding: 32px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #111111;
            box-shadow: -20px 30px 60px rgba(0,0,0,0.6);
            border-left: 16px solid var(--accent);
        }

        .book-mockup h2 {
            font-family: var(--font-display);
            font-size: 38px;
            line-height: 1;
            text-align: center;
            margin: auto 0;
        }

        .book-info-section {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .book-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            width: fit-content;
        }

        .book-info-section h1 {
            font-family: var(--font-display);
            font-size: 56px;
            font-weight: 400;
            line-height: 1;
            color: var(--fg);
        }

        .book-author-meta {
            font-size: 18px;
            color: var(--muted);
            font-weight: 500;
        }

        .book-description {
            font-size: 16px;
            color: var(--muted);
            line-height: 1.8;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 24px 0;
        }

        .action-row {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-top: 12px;
        }

        footer {
            border-top: 1px solid var(--border);
            padding: 48px 64px;
            background: var(--surface);
            text-align: center;
            color: var(--muted);
            font-size: 14px;
            margin-top: auto;
        }

        @media (max-width: 1024px) {
            .detail-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            header {
                padding: 0 24px;
            }
            .main-container {
                padding: 40px 24px;
            }
        }
    </style>
</head>
<body>

    <header>
        <a href="{{ route('index') }}" class="logo">
            BK store<span>.</span>
        </a>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('books') }}">Catalog</a></li>
                <li><a href="{{ route('about.us') }}">About</a></li>
                <li><a href="{{ route('books.create') }}">Add Book</a></li>
            </ul>
        </nav>
        <div class="nav-actions">
            <a href="#" class="btn-outline">Log In</a>
            <a href="#" class="btn-primary" style="padding: 10px 20px;">Sign Up</a>
        </div>
    </header>

    <main class="main-container">
        <div class="detail-grid">
            <div class="book-cover-showcase">
                @if($book->cover_image)
                    <div style="width: 260px; height: 380px; border-radius: 12px; overflow: hidden; box-shadow: -20px 30px 60px rgba(0,0,0,0.6); background: #000;">
                        <img src="{{ asset('/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @else
                    <div class="book-mockup">
                        <div style="font-size: 11px; font-weight: 700; color: #6b7280; text-transform: uppercase;">Vol. #{{ $book->id }}</div>
                        <h2>{{ $book->title }}</h2>
                        <div style="font-size: 11px; font-weight: 700; color: var(--accent); text-align: right;">BK store</div>
                    </div>
                @endif
            </div>

            <div class="book-info-section">
                <div class="book-badge">
                    <span>✦</span> First Collector's Edition
                </div>
                <h1>{{ $book->title }}</h1>
                <div class="book-author-meta">Created & Curated by <span style="color: var(--accent); font-weight: 700;">{{ $book->created_by }}</span></div>

                <div style="font-family: var(--font-display); font-size: 38px; color: var(--accent); font-weight: 600; margin: 8px 0;">
                    ${{ number_format($book->price ?? 29.99, 2) }}
                </div>

                <div class="book-description">
                    <p>{{ $book->description ?? 'No detailed synopsis has been provided for this volume yet. Each edition is carefully crafted with archival-grade paper, Smyth-sewn binding, and bespoke typography.' }}</p>
                </div>

                <div class="action-row">
                    <button type="button" class="btn-primary" onclick="alert('Successfully added {{ addslashes($book->title) }} to your reading collection!')">Add to Reading Cart</button>
                    <a href="{{ route('books') }}" class="btn-outline" style="padding: 12px 28px;">← Back to Catalog</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 BK store. Crafted with the My Laravel Project design system.</p>
    </footer>

</body>
</html>
