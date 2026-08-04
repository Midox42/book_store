<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-family: var(--font-display); font-size: 2rem; font-weight: 400; color: var(--fg); letter-spacing: -0.01em;">
            {{ __('Profile Information') }}
        </h2>

        <p style="color: var(--muted); font-size: 0.95rem; margin-top: 0.25rem;">
            {{ __("Update your account's profile information and username.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('patch')

        <div>
            <label for="name" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Full Name') }}</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='var(--border)'" />
            @error('name')
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="username" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Username') }}</label>
            <input id="username" name="username" type="text" value="{{ old('username', $user->username) }}" required autocomplete="username" style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='var(--border)'" />
            @error('username')
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Email Address (Uneditable)') }}</label>
            <div style="padding: 12px 16px; background: rgba(255,255,255,0.02); border: 1px solid var(--border); border-radius: 8px; color: var(--muted); font-size: 15px; display: flex; align-items: center; justify-content: space-between;">
                <span>{{ $user->email }}</span>
                <span style="font-size: 11px; background: rgba(255,255,255,0.06); padding: 2px 8px; border-radius: 4px; color: var(--muted);">Locked</span>
            </div>
            <input type="hidden" name="email" value="{{ $user->email }}">
        </div>

        <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem;">
            <button type="submit" style="background: var(--accent); color: #fff; font-weight: 600; padding: 12px 28px; border-radius: 8px; border: none; cursor: pointer; transition: opacity 0.2s; font-family: var(--font-body); font-size: 15px;" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">{{ __('Save Changes') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2500)"
                    style="color: #10b981; font-size: 14px; font-weight: 500;"
                >{{ __('Successfully saved.') }}</p>
            @endif
        </div>
    </form>
</section>
