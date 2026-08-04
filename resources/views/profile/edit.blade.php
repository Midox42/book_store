<x-app-layout>
    <div style="background-color: var(--bg); min-height: calc(100vh - 80px); padding: 4rem 1rem; color: var(--fg); font-family: var(--font-body);">
        <div style="max-width: 800px; margin: 0 auto;" class="space-y-8">
            
            <div style="margin-bottom: 2.5rem; border-bottom: 1px solid var(--border); padding-bottom: 1.5rem;">
                <h1 style="font-family: var(--font-display); font-size: 3rem; font-weight: 400; margin-bottom: 0.5rem; color: var(--fg); letter-spacing: -0.02em;">My Profile</h1>
                <p style="color: var(--muted); font-size: 1.05rem;">Manage your account details, security credentials, and preferences.</p>
            </div>

            <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                @include('profile.partials.update-password-form')
            </div>

            <div style="background: var(--surface); border: 1px solid rgba(255,92,53,0.2); border-radius: 12px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
