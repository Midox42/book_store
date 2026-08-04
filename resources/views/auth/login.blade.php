<x-guest-layout>
    <div class="auth-header">
        <h1>Welcome Back</h1>
        <p>Sign in to your BK store account</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
            <label for="remember_me" style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span style="font-size: 13px; color: var(--muted);">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="form-link" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit" class="btn-submit">
            Log In
        </button>

        <div style="text-align: center; margin-top: 24px; font-size: 13px; color: var(--muted);">
            Don't have an account? <a href="{{ route('register') }}" class="form-link" style="color: var(--accent); font-weight: 600;">Sign up</a>
        </div>
    </form>
</x-guest-layout>
