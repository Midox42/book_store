<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us — Bibliotheca</title>
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

        /* Main Container */
        main {
            max-width: 1440px;
            margin: 0 auto;
            padding: 80px 64px;
        }

        /* Hero Section */
        .about-hero {
            text-align: center;
            max-width: 900px;
            margin: 0 auto 100px auto;
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
            margin-bottom: 24px;
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
            font-size: clamp(56px, 7vw, 88px);
            font-weight: 400;
            letter-spacing: -0.02em;
            line-height: 0.95;
            margin-bottom: 32px;
            color: var(--fg);
        }

        h1 span {
            font-style: italic;
            color: var(--accent);
        }

        .about-hero p {
            font-size: 20px;
            color: var(--muted);
            line-height: 1.6;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Story Grid Section */
        .story-section {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 80px;
            align-items: center;
            margin-bottom: 120px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 24px;
            padding: 60px;
        }

        .story-content h2 {
            font-family: var(--font-display);
            font-size: 48px;
            font-weight: 400;
            letter-spacing: -0.02em;
            margin-bottom: 24px;
            color: var(--fg);
            line-height: 1.05;
        }

        .story-content p {
            color: var(--muted);
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .story-visual {
            position: relative;
            background: linear-gradient(135deg, #1b202d 0%, #11141d 100%);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 40px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .stat-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .stat-item {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid var(--border);
            padding: 24px;
            border-radius: 12px;
            text-align: center;
        }

        .stat-number {
            font-family: var(--font-display);
            font-size: 40px;
            font-weight: 400;
            color: var(--fg);
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted);
            font-weight: 600;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        /* Pillars Section */
        .pillars-section {
            margin-bottom: 120px;
        }

        .section-header {
            text-align: center;
            max-width: 700px;
            margin: 0 auto 60px auto;
        }

        .section-header h2 {
            font-family: var(--font-display);
            font-size: 48px;
            font-weight: 400;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .section-header p {
            color: var(--muted);
            font-size: 16px;
        }

        .pillars-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
        }

        .pillar-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px;
            transition: all 0.3s ease;
        }

        .pillar-card:hover {
            border-color: var(--accent);
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        }

        .pillar-icon {
            width: 56px;
            height: 56px;
            background: rgba(255,92,53,0.1);
            border: 1px solid rgba(255,92,53,0.3);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 24px;
            margin-bottom: 24px;
        }

        .pillar-card h3 {
            font-family: var(--font-display);
            font-size: 28px;
            font-weight: 400;
            margin-bottom: 12px;
        }

        .pillar-card p {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.6;
        }

        /* Team Section */
        .team-section {
            margin-bottom: 100px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
        }

        .team-card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-4px);
            border-color: var(--muted);
        }

        .team-avatar {
            height: 200px;
            background: #1b202d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--font-display);
            font-size: 48px;
            font-weight: 400;
            color: var(--accent);
            border-bottom: 1px solid var(--border);
        }

        .team-info {
            padding: 24px;
        }

        .team-name {
            font-family: var(--font-display);
            font-size: 24px;
            font-weight: 400;
            margin-bottom: 4px;
            color: var(--fg);
        }

        .team-role {
            font-size: 12px;
            color: var(--accent);
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .team-bio {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* Footer */
        footer {
            background: var(--surface);
            border-top: 1px solid var(--border);
            padding: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer p {
            color: var(--muted);
            font-size: 14px;
        }

        .footer-links {
            display: flex;
            gap: 32px;
            list-style: none;
        }

        .footer-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: var(--fg);
        }

        @media (max-width: 1024px) {
            .story-section {
                grid-template-columns: 1fr;
                padding: 40px;
            }
            .pillars-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 0 24px;
            }
            nav ul {
                display: none;
            }
            main {
                padding: 40px 20px;
            }
            .pillars-grid, .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body data-od-id="about-page">
    
    <div class="announcement-bar">
        <span>Curated</span> Discover the Spring 2026 Masterpiece Collection — Free Worldwide Shipping
    </div>

    <!-- Navigation -->
    <header data-od-id="header">
        <a href="{{ route('welcome') }}" class="logo">
            Bibliotheca<span>.</span>
        </a>
        <nav data-od-id="nav">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a></li>
                <li><a href="{{ route('books') }}">Catalog</a></li>
                <li><a href="{{ route('about.us') }}" class="active">About Us</a></li>
            </ul>
        </nav>
        <div class="nav-actions" data-od-id="nav-actions" style="display: flex; gap: 12px; align-items: center;">
            <a href="#" class="btn-outline" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; color: var(--fg); border: 1px solid var(--border); transition: all 0.2s;">Login</a>
            <a href="#" class="btn" style="padding: 10px 20px; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; background: var(--accent); color: #fff; transition: all 0.2s;">Sign Up</a>
        </div>
    </header>

    <!-- Main Content -->
    <main data-od-id="main-content">
        <!-- Hero Section -->
        <section class="about-hero" data-od-id="about-hero">
            <div class="hero-tag">
                <span></span> Our Story & Mission
            </div>
            <h1>Crafting Sanctuaries for <span>Curious Minds</span></h1>
            <p>Bibliotheca was founded on a simple belief: extraordinary books deserve an extraordinary digital home. We curate timeless literature, cutting-edge sci-fi, and transformative non-fiction for readers who value depth, design, and discovery.</p>
        </section>

        <!-- Story Grid Section -->
        <section class="story-section" data-od-id="story-section">
            <div class="story-content" data-od-id="story-content">
                <h2>Built by Readers, for Readers</h2>
                <p>Started in 2024 by a collective of indie publishers, typographers, and lifelong bibliophiles, Bibliotheca bridges the gap between traditional literary curation and modern digital aesthetics.</p>
                <p>We reject the cluttered noise of modern online storefronts. Instead, every volume in our collection is hand-selected for its prose, physical craftsmanship, and ability to shift perspectives.</p>
                <div style="margin-top: 32px;">
                    <a href="books.html" class="btn">Explore Our Collection</a>
                </div>
            </div>
            <div class="story-visual" data-od-id="story-visual">
                <div style="font-family: var(--font-display); font-size: 24px; font-weight: 400; color: var(--fg); margin-bottom: 8px;">Milestones & Impact</div>
                <div class="stat-grid">
                    <div class="stat-item">
                        <div class="stat-number">4,200+</div>
                        <div class="stat-label">Curated Volumes</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Reader Satisfaction</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">45+</div>
                        <div class="stat-label">Global Publishers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">12k</div>
                        <div class="stat-label">Active Bibliophiles</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pillars Section -->
        <section class="pillars-section" data-od-id="pillars-section">
            <div class="section-header" data-od-id="section-header">
                <h2>Our Guiding Principles</h2>
                <p>The core tenets that shape every page we curate and every experience we design.</p>
            </div>
            <div class="pillars-grid" data-od-id="pillars-grid">
                <div class="pillar-card" data-od-id="pillar-curation">
                    <div class="pillar-icon">✦</div>
                    <h3>Uncompromising Curation</h3>
                    <p>We feature only works that challenge thought, provoke wonder, and stand the test of time. Quality always supersedes volume.</p>
                </div>
                <div class="pillar-card" data-od-id="pillar-design">
                    <div class="pillar-icon">❖</div>
                    <h3>Immersive Typography</h3>
                    <p>Books are art forms in themselves. We honor them with clean, distraction-free interfaces and breathtaking visual typography.</p>
                </div>
                <div class="pillar-card" data-od-id="pillar-community">
                    <div class="pillar-icon">◈</div>
                    <h3>Global Community</h3>
                    <p>Connecting curious minds across borders through shared literary journeys, author deep-dives, and thoughtful discussions.</p>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="team-section" data-od-id="team-section">
            <div class="section-header" data-od-id="section-header">
                <h2>Meet the Curators</h2>
                <p>The passionate minds behind Bibliotheca's collection and editorial vision.</p>
            </div>
            <div class="team-grid" data-od-id="team-grid">
                <div class="team-card" data-od-id="team-member-1">
                    <div class="team-avatar">EV</div>
                    <div class="team-info">
                        <div class="team-name">Elena Vance</div>
                        <div class="team-role">Founder & Editor-in-Chief</div>
                        <div class="team-bio">Former literary critic with a lifelong obsession for rare editions and typography.</div>
                    </div>
                </div>
                <div class="team-card" data-od-id="team-member-2">
                    <div class="team-avatar">MK</div>
                    <div class="team-info">
                        <div class="team-name">Marcus Kael</div>
                        <div class="team-role">Head of Curation</div>
                        <div class="team-bio">Sci-fi enthusiast and speculative fiction historian curating tomorrow's classics.</div>
                    </div>
                </div>
                <div class="team-card" data-od-id="team-member-3">
                    <div class="team-avatar">SL</div>
                    <div class="team-info">
                        <div class="team-name">Sophia Lin</div>
                        <div class="team-role">Lead Product Designer</div>
                        <div class="team-bio">Crafting digital reading sanctuaries with rigorous attention to detail and calm UX.</div>
                    </div>
                </div>
                <div class="team-card" data-od-id="team-member-4">
                    <div class="team-avatar">JD</div>
                    <div class="team-info">
                        <div class="team-name">Julian Drake</div>
                        <div class="team-role">Literary Relations</div>
                        <div class="team-bio">Bridging independent presses worldwide to bring unique voices to our catalog.</div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer data-od-id="footer">
        <a href="book-store-home.html" class="logo" style="font-size: 24px;">Bibliotheca<span>.</span></a>
        <p>&copy; 2026 Bibliotheca Publishing. All rights reserved.</p>
        <ul class="footer-links">
            <li><a href="book-store-home.html">Home</a></li>
            <li><a href="books.html">Catalog</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
    </footer>
</body>
</html>