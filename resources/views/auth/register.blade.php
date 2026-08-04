<x-guest-layout>
    <style>
        .form-input.is-valid {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.15) !important;
        }
        .form-input.is-invalid {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15) !important;
        }
        .validation-message {
            font-size: 12px;
            margin-top: 6px;
            display: none;
        }
        .validation-message.error {
            color: #ef4444;
            display: block;
        }
        .validation-message.success {
            color: #10b981;
            display: block;
        }
    </style>

    <div class="auth-header">
        <h1>Create Account</h1>
        <p>Join our community of book lovers & collectors</p>
    </div>

    <form method="POST" action="{{ route('register') }}" id="register-form">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="form-label">Full Name</label>
            <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="John Doe" />
            <div id="name-feedback" class="validation-message"></div>
            <x-input-error :messages="$errors->get('name')" class="error-message" />
        </div>

        <!-- Username -->
        <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input id="username" class="form-input" type="text" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="johndoe" />
            <div id="username-feedback" class="validation-message"></div>
            <x-input-error :messages="$errors->get('username')" class="error-message" />
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com" />
            <div id="email-feedback" class="validation-message"></div>
            <x-input-error :messages="$errors->get('email')" class="error-message" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <div id="password-feedback" class="validation-message"></div>
            <x-input-error :messages="$errors->get('password')" class="error-message" />
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            <div id="confirm-feedback" class="validation-message"></div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
        </div>

        <button type="submit" class="btn-submit">
            Create Account
        </button>

        <div style="text-align: center; margin-top: 24px; font-size: 13px; color: var(--muted);">
            Already have an account? <a href="{{ route('login') }}" class="form-link" style="color: var(--accent); font-weight: 600;">Log in</a>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('register-form');
            const nameInput = document.getElementById('name');
            const usernameInput = document.getElementById('username');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');

            // Helper functions for showing/hiding validation status
            const showSuccess = (input, feedbackId) => {
                input.classList.remove('is-invalid');
                input.classList.add('is-valid');
                const feedback = document.getElementById(feedbackId);
                if (feedback) {
                    feedback.textContent = 'Looks good!';
                    feedback.className = 'validation-message success';
                }
            };

            const showError = (input, feedbackId, message) => {
                input.classList.remove('is-valid');
                input.classList.add('is-invalid');
                const feedback = document.getElementById(feedbackId);
                if (feedback) {
                    feedback.textContent = message;
                    feedback.className = 'validation-message error';
                }
            };

            const clearStatus = (input, feedbackId) => {
                input.classList.remove('is-valid', 'is-invalid');
                const feedback = document.getElementById(feedbackId);
                if (feedback) {
                    feedback.textContent = '';
                    feedback.className = 'validation-message';
                }
            };

            // Validation logic for each field
            const validateName = () => {
                const val = nameInput.value.trim();
                if (val === '') {
                    clearStatus(nameInput, 'name-feedback');
                    return false;
                }
                if (val.length < 2) {
                    showError(nameInput, 'name-feedback', 'Name must be at least 2 characters.');
                    return false;
                }
                showSuccess(nameInput, 'name-feedback');
                return true;
            };

            const validateUsername = () => {
                const val = usernameInput.value.trim();
                if (val === '') {
                    clearStatus(usernameInput, 'username-feedback');
                    return false;
                }
                const regex = /^[a-zA-Z0-9_]{3,20}$/;
                if (!regex.test(val)) {
                    showError(usernameInput, 'username-feedback', 'Username must be 3-20 characters, containing only letters, numbers, or underscores.');
                    return false;
                }
                showSuccess(usernameInput, 'username-feedback');
                return true;
            };

            const validateEmail = () => {
                const val = emailInput.value.trim();
                if (val === '') {
                    clearStatus(emailInput, 'email-feedback');
                    return false;
                }
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regex.test(val)) {
                    showError(emailInput, 'email-feedback', 'Please enter a valid email address.');
                    return false;
                }
                showSuccess(emailInput, 'email-feedback');
                return true;
            };

            const validatePassword = () => {
                const val = passwordInput.value;
                if (val === '') {
                    clearStatus(passwordInput, 'password-feedback');
                    validateConfirmPassword();
                    return false;
                }
                if (val.length < 8) {
                    showError(passwordInput, 'password-feedback', 'Password must be at least 8 characters.');
                    validateConfirmPassword();
                    return false;
                }
                showSuccess(passwordInput, 'password-feedback');
                validateConfirmPassword();
                return true;
            };

            const validateConfirmPassword = () => {
                const val = confirmInput.value;
                const passVal = passwordInput.value;
                if (val === '') {
                    clearStatus(confirmInput, 'confirm-feedback');
                    return false;
                }
                if (val !== passVal) {
                    showError(confirmInput, 'confirm-feedback', 'Passwords do not match.');
                    return false;
                }
                showSuccess(confirmInput, 'confirm-feedback');
                return true;
            };

            // Attach event listeners for real-time validation as typing
            nameInput.addEventListener('input', validateName);
            usernameInput.addEventListener('input', validateUsername);
            emailInput.addEventListener('input', validateEmail);
            passwordInput.addEventListener('input', validatePassword);
            confirmInput.addEventListener('input', validateConfirmPassword);

            // Clear Laravel server-side errors on focus
            const inputs = [nameInput, usernameInput, emailInput, passwordInput, confirmInput];
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    const group = input.parentElement;
                    const laravelError = group.querySelector('.error-message');
                    if (laravelError) {
                        laravelError.style.display = 'none';
                    }
                });
            });

            // Prevent submission if form is invalid
            form.addEventListener('submit', (e) => {
                const isNameValid = validateName();
                const isUsernameValid = validateUsername();
                const isEmailValid = validateEmail();
                const isPasswordValid = validatePassword();
                const isConfirmValid = validateConfirmPassword();

                if (!(isNameValid && isUsernameValid && isEmailValid && isPasswordValid && isConfirmValid)) {
                    e.preventDefault();
                    // Focus on the first invalid field
                    const firstInvalid = document.querySelector('.form-input.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.focus();
                    }
                }
            });
        });
    </script>
</x-guest-layout>
