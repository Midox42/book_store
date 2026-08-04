<section>
    <header style="margin-bottom: 2rem;">
        <h2 style="font-family: var(--font-display); font-size: 2rem; font-weight: 400; color: #ef4444; letter-spacing: -0.01em;">
            {{ __('Delete Account') }}
        </h2>

        <p style="color: var(--muted); font-size: 0.95rem; margin-top: 0.25rem;">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.2); font-weight: 600; padding: 12px 24px; border-radius: 8px; cursor: pointer; transition: all 0.2s; font-family: var(--font-body); font-size: 15px;"
        onmouseover="this.style.background='rgba(239, 68, 68, 0.2)'"
        onmouseout="this.style.background='rgba(239, 68, 68, 0.1)'"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" style="padding: 2.5rem; background: var(--surface); border: 1px solid var(--border); border-radius: 12px; max-width: 500px; margin: auto;">
            @csrf
            @method('delete')

            <h2 style="font-family: var(--font-display); font-size: 1.75rem; color: var(--fg); margin-bottom: 0.75rem;">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p style="color: var(--muted); font-size: 0.95rem; margin-bottom: 1.5rem;">
                {{ __('Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: var(--muted); margin-bottom: 8px;">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    style="width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 8px; color: var(--fg); font-family: var(--font-body); font-size: 15px; outline: none;"
                    placeholder="{{ __('Password') }}"
                />
                @if($errors->userDeletion->get('password'))
                    <p style="color: #ef4444; font-size: 13px; margin-top: 6px;">{{ $errors->userDeletion->first('password') }}</p>
                @endif
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 1rem;">
                <button type="button" x-on:click="$dispatch('close')" style="background: transparent; color: var(--muted); padding: 10px 20px; border-radius: 8px; border: 1px solid var(--border); cursor: pointer; font-family: var(--font-body); font-weight: 600;">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" style="background: #ef4444; color: #fff; padding: 10px 24px; border-radius: 8px; border: none; cursor: pointer; font-family: var(--font-body); font-weight: 600;">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
