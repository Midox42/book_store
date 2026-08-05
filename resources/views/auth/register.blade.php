<x-guest-layout>
    <div class="auth-header">
        <h1>Create Account</h1>
        <p>Join our community of book lovers & collectors</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Full Name</label>
            <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="full name" />
            <x-input-error :messages="$errors->get('name')" class="error-message" />
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input id="username" class="form-input" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="username" />
            <x-input-error :messages="$errors->get('username')" class="error-message" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com" />
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <button type="submit" class="btn-submit">
            Create Account
        </button>

        <div style="text-align: center; margin-top: 24px; font-size: 13px; color: var(--muted);">
            Already have an account? <a href="{{ route('login') }}" class="form-link" style="color: var(--accent); font-weight: 600;">Log in</a>
        </div>
    </form>
</x-guest-layout>
