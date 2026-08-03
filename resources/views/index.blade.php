<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotheca — Discover Extraordinary Books</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b0d12;
            --surface: #13161f;
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
        }

        /* Announcement Bar */
        .announcement-bar {
            background: linear-gradient(90deg, rgba(255,92,53,0.15), rgba(255,92,53,0.05));
            border-bottom: 1px solid var(--border);
            padding: 10px 24px;
            text-align: center;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            color: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .announcement-bar span {
            background: var(--accent);
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 11px;
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
            gap: 40px;
            list-style: none;
        }

        nav a {
            color: var(--fg);
            text-decoration: none;
            font-size: 14px;
            font-weight: 550;
            transition: color 0.2s ease;
            letter-spacing: -0.01em;
            text-transform: none;
            padding: 8px 12px;
            border-radius: 6px;
        }

        nav a:hover, nav a.active {
            color: var(--accent);
            background: var(--surface);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .btn {
            background: var(--accent);
            color: #ffffff;
            border: none;
            border-radius: 50px;
            padding: 12px 28px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            box-shadow: 0 4px 20px var(--accent-glow);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px var(--accent-glow);
            opacity: 0.95;
        }

        .btn-outline {
            background: transparent;
            color: var(--fg);
            border: 1px solid var(--border);
            box-shadow: none;
            border-radius: 50px;
            padding: 12px 28px;
        }

        .btn-outline:hover {
            background: var(--surface);
            border-color: var(--muted);
            box-shadow: none;
        }

        /* Hero Section - Inspired by agency layout */
        .hero {
            padding: 100px 64px 120px 64px;
            max-width: 1440px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 80px;
            align-items: center;
            position: relative;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            gap: 32px;
            z-index: 2;
        }

        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 8px 16px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            width: fit-content;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero-tag span {
            width: 8px;
            height: 8px;
            background: var(--accent);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent);
        }

        h1 {
            font-family: var(--font-display);
            font-size: clamp(64px, 7vw, 104px);
            font-weight: 400;
            letter-spacing: -0.02em;
            line-height: 0.95;
            color: var(--fg);
        }

        h1 i {
            color: var(--accent);
            font-style: italic;
        }

        .hero p {
            font-size: 18px;
            color: var(--muted);
            max-width: 540px;
            line-height: 1.7;
            font-weight: 400;
        }

        .hero-ctas {
            display: flex;
            gap: 20px;
            align-items: center;
            margin-top: 12px;
        }

        .stats-row {
            display: flex;
            gap: 48px;
            margin-top: 24px;
            padding-top: 32px;
            border-top: 1px solid var(--border);
        }

        .stat-item h3 {
            font-family: var(--font-display);
            font-size: 38px;
            color: var(--fg);
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-item p {
            font-size: 13px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        /* Animated Hero Book Showcase */
        .hero-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            perspective: 1400px;
        }

        .book-stage {
            width: 380px;
            height: 540px;
            position: relative;
            transform-style: preserve-3d;
            animation: floatBook 8s ease-in-out infinite;
        }

        @keyframes floatBook {
            0%, 100% { transform: translateY(0) rotateX(6deg) rotateY(-12deg) rotateZ(1deg); }
            50% { transform: translateY(-24px) rotateX(10deg) rotateY(-18deg) rotateZ(-1deg); }
        }

        .book-3d {
            width: 100%;
            height: 100%;
            position: absolute;
            transform-style: preserve-3d;
            border-radius: 6px;
            box-shadow: -30px 40px 80px rgba(0,0,0,0.7), 0 0 50px var(--accent-glow);
            transition: transform 0.5s ease;
        }

        .book-face-front {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #ffffff 0%, #f0f2f5 100%);
            border-radius: 4px 12px 12px 4px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #111111;
            backface-visibility: hidden;
            border-left: 18px solid #d4502b;
            box-shadow: inset 4px 0 15px rgba(0,0,0,0.1);
        }

        .book-spine-effect {
            position: absolute;
            left: -18px;
            top: 0;
            width: 18px;
            height: 100%;
            background: linear-gradient(90deg, #b03818, #d4502b);
            border-radius: 4px 0 0 4px;
            transform-origin: right;
            transform: rotateY(-90deg);
        }

        .book-pages-effect {
            position: absolute;
            right: -16px;
            top: 4px;
            width: 16px;
            height: calc(100% - 8px);
            background: linear-gradient(90deg, #e5e7eb, #ffffff, #d1d5db);
            transform-origin: left;
            transform: rotateY(90deg);
            border-radius: 0 4px 4px 0;
        }

        .cover-top {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #6b7280;
        }

        .cover-main {
            text-align: center;
            margin: auto 0;
        }

        .cover-main h2 {
            font-family: var(--font-display);
            font-size: 52px;
            line-height: 0.95;
            margin-bottom: 12px;
            color: #111111;
        }

        .cover-main p {
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #d4502b;
        }

        .cover-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            font-weight: 700;
            color: #374151;
            border-top: 1px solid rgba(0,0,0,0.1);
            padding-top: 16px;
        }

        /* Floating Badge Accent */
        .float-badge {
            position: absolute;
            bottom: 40px;
            right: -30px;
            background: var(--surface);
            border: 1px solid var(--border);
            padding: 16px 24px;
            border-radius: 16px;
            backdrop-filter: blur(12px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            gap: 16px;
            z-index: 10;
            animation: floatBadge 6s ease-in-out infinite alternate;
        }

        @keyframes floatBadge {
            0% { transform: translateY(0); }
            100% { transform: translateY(-12px); }
        }

        .float-badge-icon {
            width: 44px;
            height: 44px;
            background: var(--accent);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
        }

        .float-badge-text h4 {
            font-size: 15px;
            font-weight: 700;
            color: var(--fg);
        }

        .float-badge-text p {
            font-size: 12px;
            color: var(--muted);
        }

        /* Curated Book Section below */
        .section-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 80px 64px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 48px;
        }

        .section-title-group span {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: var(--accent);
            display: block;
            margin-bottom: 8px;
        }

        .section-title-group h2 {
            font-family: var(--font-display);
            font-size: 48px;
            font-weight: 400;
            letter-spacing: -0.02em;
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
        }

        .book-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
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
            height: 280px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f2f5 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            box-shadow: inset 2px 0 10px rgba(0,0,0,0.1);
            border-left: 10px solid #d4502b;
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
            font-size: 18px;
            font-weight: 650;
            color: var(--fg);
            line-height: 1.3;
        }

        .book-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 16px;
            border-top: 1px solid var(--border);
        }

        .book-price {
            font-size: 18px;
            font-weight: 700;
            color: var(--fg);
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

        /* Footer */
        footer {
            border-top: 1px solid var(--border);
            padding: 80px 64px 40px 64px;
            max-width: 1440px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 60px;
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--muted);
            font-size: 14px;
            border-top: 1px solid var(--border);
            padding-top: 30px;
        }

        @media (max-width: 1024px) {
            .hero {
                grid-template-columns: 1fr;
                padding: 60px 24px;
            }
            header {
                padding: 0 24px;
            }
            .section-container {
                padding: 60px 24px;
            }
            .books-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .hero-visual {
                margin-top: 40px;
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

    <div class="announcement-bar">
        <span>New Release</span> Explore our curated collection of award-winning literature & design monographs.
    </div>

    <header>
        <a href="{{ route('index') }}" class="logo">Bibliotheca<span>.</span></a>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}" class="active">Home</a></li>
                <li><a href="{{ route('books') }}">Catalog</a></li>
                <li><a href="{{ route('about.us') }}">About Us</a></li>
            </ul>
        </nav>
        <div class="nav-actions" style="display: flex; gap: 12px; align-items: center;">
            <a href="#" class="btn-outline" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--fg); border: 1px solid var(--border); transition: all 0.2s;">Login</a>
            <a href="#" class="btn" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--accent); color: #fff; transition: all 0.2s;">Sign Up</a>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-tag">
                <span></span> Curated Literary Editions
            </div>
            <h1>Where Stories Take <i>Form.</i></h1>
            <p>Immerse yourself in world-class typography, design monographs, and timeless fiction. Crafted for discerning readers and collectors.</p>
            <div class="hero-ctas">
                <a href="{{ route('books') }}" class="btn">Explore Catalog</a>
                <a href="{{ route('about.us') }}" class="btn-outline">Our Philosophy</a>
            </div>
            <div class="stats-row">
                <div class="stat-item">
                    <h3>1,250+</h3>
                    <p>Curated Volumes</p>
                </div>
                <div class="stat-item">
                    <h3>98%</h3>
                    <p>Collector Satisfaction</p>
                </div>
                <div class="stat-item">
                    <h3>24h</h3>
                    <p>Express Dispatch</p>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="book-stage">
                <div class="book-3d">
                    <div class="book-spine-effect"></div>
                    <div class="book-pages-effect"></div>
                    <div class="book-face-front" @if(isset($heroBook) && $heroBook->cover_image) style="padding: 0; background: #000; overflow: hidden; border-left: none;" @endif>
                        @if(isset($heroBook) && $heroBook->cover_image)
                            <img src="{{ Storage::url($heroBook->cover_image) }}" alt="{{ $heroBook->title }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px 12px 12px 4px;">
                        @else
                            <div class="cover-top">
                                <span>Vol. {{ $heroBook->id ?? '01' }}</span>
                                <span>{{ $heroBook->created_by ?? 'Featured Author' }}</span>
                            </div>
                            <div class="cover-main">
                                <h2>{{ $heroBook->title ?? 'The Architecture of Light' }}</h2>
                                <p>{{ \Illuminate\Support\Str::limit($heroBook->description ?? 'Spatial Aesthetics', 40) }}</p>
                            </div>
                            <div class="cover-footer">
                                <span>Bibliotheca Press</span>
                                <span>${{ number_format($heroBook->price ?? 48.00, 2) }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @if(isset($heroBook) && $heroBook->cover_image)
            <div style="margin-top: 24px; text-align: center;">
                <h2 style="font-family: var(--font-display); font-size: 32px; color: var(--fg); margin-bottom: 4px;">{{ $heroBook->title }}</h2>
                <p style="color: var(--muted); font-size: 14px;">By {{ $heroBook->created_by }} &bull; ${{ number_format($heroBook->price, 2) }}</p>
            </div>
            @endif
            <div class="float-badge">
                <div class="float-badge-icon">★</div>
                <div class="float-badge-text">
                    <h4>{{ $heroBook->created_by ?? "Editor's Choice" }}</h4>
                    <p>Author</p>
                </div>
            </div>
        </div>
    </section>

    <div class="section-container" id="featured-books">
        <div class="section-header">
            <div class="section-title-group">
                <span>Handpicked Selection</span>
                <h2>Featured Masterpieces</h2>
            </div>
            <a href="{{ route('books') }}" class="btn-outline">View Full Catalog →</a>
        </div>

        <div class="books-grid">
            @forelse($books as $book)
            <a href="{{ route('books.show', $book->id) }}" class="book-card">
                @if($book->cover_image)
                <div style="height: 280px; border-radius: 10px; overflow: hidden; background: #000; position: relative;">
                    <img src="{{ asset('/' . $book->cover_image) }}" alt="{{ $book->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="margin-top: 4px;">
                    <h4 style="font-size: 18px; font-weight: 650; color: var(--fg);">{{ $book->title }}</h4>
                    <p style="color: var(--muted); font-size: 13px; margin-top: 2px;">{{ \Illuminate\Support\Str::limit($book->description, 45) }}</p>
                </div>
                @else
                <div class="book-card-thumb" style="border-left-color: #ff5c35;">
                    <h3>{{ $book->title }}</h3>
                </div>
                <div class="book-card-info">
                    <span class="book-genre">{{ $book->created_by }}</span>
                    <h4>{{ \Illuminate\Support\Str::limit($book->description, 50) }}</h4>
                </div>
                @endif
                <div class="book-card-footer">
                    <span class="book-price">${{ number_format($book->price ?? 45.00, 2) }}</span>
                    <div class="btn-icon">→</div>
                </div>
            </a>
            @empty
            <p style="color: var(--muted); grid-column: span 4; text-align: center; padding: 40px;">No books available yet.</p>
            @endforelse
        </div>

        @if($books->hasPages())
        <div style="margin-top: 40px; display: flex; justify-content: center; align-items: center; gap: 16px;">
            @if($books->onFirstPage())
                <span class="btn-outline" style="opacity: 0.5; cursor: not-allowed; padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--muted); border: 1px solid var(--border);">Previous</span>
            @else
                <a href="{{ $books->previousPageUrl() }}#featured-books" class="btn-outline" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--fg); border: 1px solid var(--border); transition: all 0.2s;">Previous</a>
            @endif

            <span style="color: var(--muted); font-size: 14px;">Page {{ $books->currentPage() }} of {{ $books->lastPage() }}</span>

            @if($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}#featured-books" class="btn-outline" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--fg); border: 1px solid var(--border); transition: all 0.2s;">Next</a>
            @else
                <span class="btn-outline" style="opacity: 0.5; cursor: not-allowed; padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--muted); border: 1px solid var(--border);">Next</span>
            @endif
        </div>
        @endif
    </div>

    <footer>
        <div class="footer-top">
            <a href="{{ route('index') }}" class="logo">Bibliotheca<span>.</span></a>
            <nav>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li><a href="{{ route('books') }}">Catalog</a></li>
                    <li><a href="{{ route('about.us') }}">About</a></li>
                    <li><a href="{{ route('books', $heroBook->id ?? 1) }}">Featured</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2026 Bibliotheca Press. All rights reserved.</p>
            <p>Designed with precision and exceptional typography.</p>
        </div>
    </footer>

</body>
</html>
