<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://unpkg.com/feather-icons"></script>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
    }

    body {
        min-height: 100vh;
        font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
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

    .about-container {
        max-width: 850px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.3);
        overflow: hidden;
    }

    @media (prefers-color-scheme: dark) {
        .about-container {
            background: rgba(30, 41, 59, 0.7);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }
    }

    .about-header {
        text-align: center;
        padding: 60px 30px;
        background: var(--primary-gradient);
        color: white;
    }

    .about-header h1 {
        font-size: 3rem;
        font-weight: 800;
        margin: 0;
        letter-spacing: -0.05em;
    }

    .content-area {
        padding: 40px;
    }

    .about-text {
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 20px;
        color: #475569;
    }

    @media (prefers-color-scheme: dark) {
        .about-text {
            color: #cbd5e1;
        }
    }

    h2.section-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    h2.section-title::after {
        content: '';
        flex-grow: 1;
        height: 2px;
        background: var(--primary-gradient);
        border-radius: 2px;
    }

    footer {
        text-align: center;
        padding: 40px;
        border-top: 1px solid rgba(0,0,0,0.05);
    }

    @media (prefers-color-scheme: dark) {
        footer {
            border-top: 1px solid rgba(255,255,255,0.05);
        }
    }

    footer a {
        color: #6366f1;
        text-decoration: none;
        font-weight: 600;
    }

    footer a:hover {
        text-decoration: underline;
    }
</style>

@include('components.layout')

<div class="page-shell">
    <div class="about-container">
        <div class="about-header">
            <h1>About BlogHub</h1>
        </div>

        @if(!config('blog.hide_welcome'))
            <div class="content-area">
                <h2 class="section-title"><i data-feather="users"></i> Our Story</h2>
                <p class="about-text">Welcome to BlogHub, the vibrant community where creativity knows no bounds! Founded in 20XX by MidoX42 who started blogging over coffee, into a platform that empowers voices from every corner of the globe. Every post shared here isn't just digital ink on a screen—it's an authentic story waiting to inspire someone else.</p>

                @if(!empty(config('blog.blog_owner')['name']))
                    <h2 class="section-title mt-5"><i data-feather="user"></i> {{ config('blog.blog_owner')['name'] }}</h2>
                    <p class="about-text">{{ config('blog.blog_description') ?? 'We are a passionate team dedicated to sharing inspiring stories and meaningful content with our amazing community.' }}</p>
                @endif

                <h2 class="section-title mt-5"><i data-feather="heart"></i> Inspiration Over Perfection</h2>
                <p class="about-text">We believe that every voice deserves to be heard—whether it's sunset photography over the Nile or tech insights from Tokyo. Every story here isn't just digital ink on a screen—it's an authentic journey waiting to inspire someone else.</p>
            </div>
        @endif

        @if(!config('blog.hide_welcome'))
            <footer>
                @if(config('admin_email') && config('blog.blog_owner')['name'])
                    <p><strong>Contact:</strong> <a href="mailto:{{ config('admin_blog_email') }}">{{ config('admin_blog_email') }}</a></p>
                @endif
                <p class="mt-3 text-muted">© {{ date('Y') }} BlogHub. All rights reserved.</p>
            </footer>
        @endif
    </div>
</div>

<script>
    feather.replace();
</script>
