<header style="position: sticky; top: 0; height: 84px; background: rgba(11, 13, 18, 0.9); backdrop-filter: blur(16px); border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; padding: 0 64px; z-index: 100;">
    <a href="{{ url('/') }}" class="logo" style="font-family: var(--font-display); font-size: 32px; font-weight: 400; letter-spacing: -0.01em; color: var(--fg); text-decoration: none; display: flex; align-items: center; gap: 8px;">
        BK<span style="color: var(--accent);">store</span>
    </a>
    <nav>
        <ul style="display: flex; gap: 40px; list-style: none; margin: 0; padding: 0;">
            <li><a href="{{ url('/') }}" style="color: {{ request()->is('/') ? 'var(--accent)' : 'var(--fg)' }}; text-decoration: none; font-size: 14px; font-weight: 550; padding: 8px 12px; border-radius: 6px; background: {{ request()->is('/') ? 'var(--surface)' : 'transparent' }};">Home</a></li>
            <li><a href="{{ route('books') }}" style="color: {{ request()->routeIs('books') ? 'var(--accent)' : 'var(--fg)' }}; text-decoration: none; font-size: 14px; font-weight: 550; padding: 8px 12px; border-radius: 6px; background: {{ request()->routeIs('books') ? 'var(--surface)' : 'transparent' }};">Catalog</a></li>
            <li><a href="{{ route('about.us') }}" style="color: {{ request()->is('about-us*') ? 'var(--accent)' : 'var(--fg)' }}; text-decoration: none; font-size: 14px; font-weight: 550; padding: 8px 12px; border-radius: 6px; background: {{ request()->is('about-us*') ? 'var(--surface)' : 'transparent' }};">About Us</a></li>
            @auth
                <li><a href="{{ route('books.create') }}" style="color: {{ request()->is('books/create') ? 'var(--accent)' : 'var(--fg)' }}; text-decoration: none; font-size: 14px; font-weight: 550; padding: 8px 12px; border-radius: 6px; background: {{ request()->is('books/create') ? 'var(--surface)' : 'transparent' }};">Upload Your Book</a></li>
            @endauth
        </ul>
    </nav>
    <div class="nav-actions" style="display: flex; align-items: center; gap: 20px;">
        @auth
            <a href="{{ route('cart.index') }}" style="font-size: 14px; font-weight: 600; color: var(--fg); display: flex; align-items: center; gap: 6px; text-decoration: none; padding: 6px 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                Cart
                @php
                    $cartCount = Auth::user()->cart ? Auth::user()->cart->items()->sum('quantity') : 0;
                @endphp
                @if($cartCount > 0)
                    <span style="background: #ff5c35; color: #fff; font-size: 11px; padding: 1px 6px; border-radius: 10px; font-weight: 600;">{{ $cartCount }}</span>
                @endif
            </a>
            <a href="{{ route('profile.edit') }}" style="font-size: 14px; font-weight: 600; color: var(--fg); display: flex; align-items: center; gap: 8px; text-decoration: none; padding: 6px 12px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: var(--accent);"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                {{ Auth::user()->name }}
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                @csrf
                <button type="submit" style="background: transparent; border: 1px solid var(--border); color: var(--fg); padding: 8px 16px; font-size: 13px; font-weight: 550; font-family: inherit; border-radius: 8px; cursor: pointer; transition: all 0.2s;" onmouseover="this.style.borderColor='var(--accent)'; this.style.color='var(--accent)';" onmouseout="this.style.borderColor='var(--border)'; this.style.color='var(--fg)';">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="display: inline-flex; align-items: center; justify-content: center; padding: 10px 22px; background: transparent; border: 1px solid var(--border); color: var(--fg); font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; transition: all 0.2s;">Login</a>
            <a href="{{ route('register') }}" style="display: inline-flex; align-items: center; justify-content: center; padding: 10px 22px; background: #ff5c35; color: #ffffff; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 14px; font-weight: 600; border-radius: 8px; text-decoration: none; transition: background 0.2s;">Sign Up</a>
        @endauth
    </div>
</header>
