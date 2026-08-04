<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-family: var(--font-display); font-size: 2rem; font-weight: 400; color: var(--fg); letter-spacing: -0.01em;">
            {{ __('Update Password') }}
        </h2>

        <p style="color: var(--muted); font-size: 0.95rem; margin-top: 0.25rem;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" oninput="this.style.borderColor='var(--border)'" style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid {{ $errors->updatePassword->has('current_password') ? '#ef4444' : 'var(--border)' }}; border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='{{ $errors->updatePassword->has('current_password') ? '#ef4444' : 'var(--border)' }}'" />
            @if($errors->updatePassword->get('current_password'))
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $errors->updatePassword->first('current_password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='var(--border)'" />
            @if($errors->updatePassword->get('password'))
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $errors->updatePassword->first('password') }}</p>
            @endif
        </div>

        <div>
            <label for="update_password_password_confirmation" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='var(--border)'" />
            @if($errors->updatePassword->get('password_confirmation'))
                <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $errors->updatePassword->first('password_confirmation') }}</p>
            @endif
        </div>

        <div style="display: flex; align-items: center; gap: 1rem; margin-top: 0.5rem; position: relative;">
            <button type="submit" style="background: var(--surface); color: var(--fg); font-weight: 600; padding: 12px 28px; border-radius: 8px; border: 1px solid var(--border); cursor: pointer; transition: all 0.2s; font-family: var(--font-body); font-size: 15px;" onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='var(--border)'">{{ __('Update Password') }}</button>

            @if (session('status') === 'password-updated')
                <div id="password-success-toast" style="position: fixed; bottom: 30px; right: 30px; background: #10b981; color: #ffffff; padding: 14px 24px; border-radius: 12px; font-weight: 600; font-size: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.3); z-index: 9999; display: flex; align-items: center; gap: 10px; animation: slideIn 0.3s ease forwards;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                    <span>Password successfully updated!</span>
                </div>
                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('password-success-toast');
                        if (toast) {
                            toast.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                            toast.style.opacity = '0';
                            toast.style.transform = 'translateY(10px)';
                            setTimeout(() => toast.remove(), 400);
                        }
                    }, 3500);
                </script>
            @endif
        </div>
    </form>
</section>
