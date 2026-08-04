<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BK store — Book Catalog</title>
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

        .main-container {
            flex: 1;
            max-width: 1440px;
            width: 100%;
            margin: 0 auto;
            padding: 60px 64px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 48px;
        }

        .page-header h1 {
            font-family: var(--font-display);
            font-size: 52px;
            font-weight: 400;
            letter-spacing: -0.02em;
            color: var(--fg);
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 16px;
        }

        .search-filter-bar {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 40px;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .search-input {
            flex: 1;
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px 18px;
            color: var(--fg);
            font-family: var(--font-body);
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s;
        }

        .search-input:focus {
            border-color: var(--accent);
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .book-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            position: relative;
        }

        .book-card:hover {
            border-color: var(--accent);
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .book-card-thumb {
            height: 260px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f2f5 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            box-shadow: inset 2px 0 10px rgba(0,0,0,0.1);
            border-left: 12px solid var(--accent);
        }

        .book-card-thumb h3 {
            font-family: var(--font-display);
            font-size: 32px;
            color: #111111;
            text-align: center;
            line-height: 1;
        }

        .book-card-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .book-genre {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--accent);
        }

        .book-card-info h4 {
            font-size: 20px;
            font-weight: 650;
            color: var(--fg);
            line-height: 1.3;
        }

        .book-card-info p {
            color: var(--muted);
            font-size: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .book-author {
            font-size: 13px;
            color: var(--muted);
            font-weight: 500;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            background: var(--border);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--fg);
            transition: all 0.2s ease;
        }

        .book-card:hover .btn-icon {
            background: var(--accent);
            color: #fff;
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
            .books-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            header {
                padding: 0 24px;
            }
            .main-container {
                padding: 40px 24px;
            }
        }

        @media (max-width: 640px) {
            .books-grid {
                grid-template-columns: 1fr;
            }
            nav ul {
                display: none;
            }
        }
    </style>
</head>
<body>
    
    @include('components.navbar')

    <main class="main-container">
        <div class="page-header">
            <div>
                <h1>Complete Catalog</h1>
                <p>Browse our handpicked collection of literature, design monographs, and speculative fiction.</p>
            </div>
            <a href="{{ route('books.create') }}" class="btn-primary">+ Add New Book</a>
        </div>

        <div class="search-filter-bar">
            <form action="{{ route('books') }}" method="GET" style="display: flex; width: 100%; gap: 16px; align-items: center;">
                <input type="text" class="search-input" name="search" value="{{ request('search') }}" placeholder="Search by book title, author, or description...">
                <button type="submit" class="btn-primary" style="padding: 12px 28px;">Search</button>
                @if(request('search'))
                    <a href="{{ route('books') }}" class="btn-outline" style="padding: 12px 24px; text-align: center;">Reset</a>
                @endif
            </form>
        </div>

        <div class="books-grid">
            @foreach($books as $book)
                <a href="{{ route('books.show', $book->id) }}" class="book-card">
                    @if($book->cover_image)
                    <div style="height: 260px; border-radius: 10px; overflow: hidden; background: #000; position: relative;">
                        
                        <img src="{{ asset('/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                    
                    </div>
                    <div class="book-card-info" style="margin-top: 4px;">
                        <span class="book-genre">By {{ $book->created_by }}</span>
                        <h4>{{ $book->title }}</h4>
                        <p>{{ $book->description ?? 'No synopsis provided for this volume yet.' }}</p>
                    </div>
                    @else
                    <div class="book-card-thumb">
                        <h3>{{ $book->title }}</h3>
                    </div>
                    <div class="book-card-info">
                        <span class="book-genre">Literature & Art</span>
                        <h4>{{ $book->title }}</h4>
                        <p>{{ $book->description ?? 'No synopsis provided for this volume yet.' }}</p>
                    </div>
                    @endif
                    <div class="book-card-footer">
                        <span class="book-author">${{ number_format($book->price ?? 45.00, 2) }}</span>
                        <div class="btn-icon">→</div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>

    <footer>
        <p>&copy; 2026 BK store. Crafted with the My Laravel Project design system.</p>
    </footer>

</body>
</html>
