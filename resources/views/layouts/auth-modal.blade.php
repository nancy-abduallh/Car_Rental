{{-- 1. LOGIN Modal (opened by default) --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                {{-- Login Form with AJAX --}}
                <form id="loginForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="EmailId" class="form-control" placeholder="Enter your email"
                            required value="{{ old('EmailId') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="Password" class="form-control" placeholder="Enter password"
                            required>
                    </div>

                    {{-- Error message container --}}
                    <div id="loginErrors" class="alert alert-danger d-none"></div>

                    <button type="submit" class="btn btn-login w-100 mb-3">Login</button>
                </form>

                <p class="mt-2 text-center">
                    Don't have an account?
                    <a href="#" class=" fw-bold primary-color-link" data-bs-toggle="modal"
                        data-bs-target="#registerModal" data-bs-dismiss="modal">
                        Signup Here
                    </a>
                </p>
                <p class="mb-0 text-center fw-bold">
                    <a href="{{ route('password.forgot.form') }}">Forgot Password?</a>
                </p>
            </div>
        </div>
    </div>
</div>


{{-- 2. REGISTER Modal (opened via link inside Login Modal) --}}
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                {{-- Add ID to the form and remove action/method for AJAX handling --}}
                <form id="registerForm">
                    @csrf
                    <div class="mb-1">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="FullName" class="form-control" placeholder="Your full name"
                            required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Email</label>
                        <input type="email" name="EmailId" class="form-control" placeholder="Your email" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Password</label>
                        <input type="password" name="Password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-1">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="Password_confirmation" class="form-control"
                            placeholder="Re-enter password" required>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" name="terms_agreement"
                            id="termsAgreement" required>
                        <label class="form-check-label" for="termsAgreement">
                            I agree with <a href="#" class="primary-color-link">Terms and Conditions</a>
                        </label>
                    </div>

                    {{-- Error message container --}}
                    <div id="registerErrors" class="alert alert-danger d-none"></div>

                    <button type="submit" class="btn btn-register w-100">Register</button>
                </form>

                <p class="mt-2 text-center mb-2">
                    Already have an account?
                    <a href="#" class="fw-bold primary-color-link" data-bs-toggle="modal"
                        data-bs-target="#loginModal" data-bs-dismiss="modal">
                        Login Here
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        const loginErrors = document.getElementById('loginErrors');

        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                loginErrors.classList.add('d-none');
                loginErrors.innerHTML = '';

                const formData = new FormData(this);

                fetch('{{ route('login.process') }}', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(async (response) => {
                        const data = await response.json();

                        if (data.success) {
                            toastr.success(data.message || 'Login successful');
                            window.location.href = '{{ route('home') }}';
                        } else {
                            loginErrors.classList.remove('d-none');

                            if (data.message) {
                                loginErrors.innerHTML = `<p class="mb-0">${data.message}</p>`;
                            } else if (data.errors) {
                                let html = '';
                                for (const key in data.errors) {
                                    const val = data.errors[key];
                                    html +=
                                        `<p class="mb-0">${Array.isArray(val) ? val[0] : val}</p>`;
                                }
                                loginErrors.innerHTML = html;
                            } else {
                                loginErrors.innerHTML =
                                    '<p class="mb-0">Login failed. Please try again.</p>';
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        loginErrors.classList.remove('d-none');
                        loginErrors.innerHTML =
                            '<p class="mb-0">An unexpected error occurred. Please try again.</p>';
                    });
            });
        }

        const loginModal = document.getElementById('loginModal');
        if (loginModal) {
            loginModal.addEventListener('show.bs.modal', function() {
                loginErrors.classList.add('d-none');
                loginErrors.innerHTML = '';
                loginForm.reset();
            });
        }
    });
</script>
