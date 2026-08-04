<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BK store') }} — Account</title>

    <!-- Fonts -->
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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
            gap: 12px;
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
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            border-color: var(--fg);
            background: rgba(255, 255, 255, 0.05);
        }

        /* Main Container */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 24px;
        }

        .auth-card {
            width: 100%;
            max-width: 460px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-header h1 {
            font-family: var(--font-display);
            font-size: 36px;
            font-weight: 400;
            color: var(--fg);
            margin-bottom: 8px;
        }

        .auth-header p {
            color: var(--muted);
            font-size: 14px;
        }

        /* Form elements */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--fg);
            margin-bottom: 8px;
            letter-spacing: 0.02em;
        }

        .form-input {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--fg);
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 14px;
            font-family: var(--font-body);
            transition: all 0.2s ease;
            outline: none;
        }

        .form-input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px var(--accent-glow);
        }

        .form-checkbox {
            accent-color: var(--accent);
            width: 16px;
            height: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-link {
            color: var(--muted);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .form-link:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            background: var(--accent);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 14px 24px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 20px var(--accent-glow);
            margin-top: 8px;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 25px var(--accent-glow);
            opacity: 0.95;
        }

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 6px;
        }

        /* Footer */
        footer {
            background: #08090d;
            border-top: 1px solid var(--border);
            padding: 40px 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        footer p {
            color: var(--muted);
            font-size: 13px;
        }

        .footer-links {
            display: flex;
            gap: 24px;
            list-style: none;
        }

        .footer-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 13px;
            transition: color 0.2s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        @media (max-width: 768px) {
            header {
                padding: 0 24px;
            }
            nav ul {
                display: none;
            }
            footer {
                padding: 30px 24px;
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="announcement-bar">
        <span>New Release</span> Explore our curated collection of award-winning literature & design monographs.
    </div>

    <header>
        <a href="{{ route('index') }}" class="logo">BK store<span>.</span></a>
        <nav>
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('books') }}">Catalog</a></li>
                <li><a href="{{ route('about.us') }}">About Us</a></li>
            </ul>
        </nav>
        <div class="nav-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-outline">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn-outline" style="{{ request()->routeIs('login') ? 'border-color: var(--accent); color: var(--accent);' : '' }}">Login</a>
                <a href="{{ route('register') }}" class="btn">Sign Up</a>
            @endauth
        </div>
    </header>

    <main>
        <div class="auth-card">
            {{ $slot }}
        </div>
    </main>

    <footer>
        <a href="{{ route('index') }}" class="logo" style="font-size: 24px;">BK store<span>.</span></a>
        <p>&copy; 2026 BK store Publishing. All rights reserved.</p>
        <ul class="footer-links">
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('books') }}">Catalog</a></li>
            <li><a href="{{ route('about.us') }}">About Us</a></li>
        </ul>
    </footer>
</body>
</html>
