@extends('admin.layouts.app')

@section('title', 'Update Contact Info')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-address-book text-primary me-2"></i>Update Contact Information
                </h2>
                <p class="page-subtitle">Manage company contact details</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-edit me-2"></i>
                        <span>Contact Details</span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contact.update.submit') }}" class="modern-form">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show animated bounceIn" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-error alert-dismissible fade show animated shake" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Error!</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="section-header">
                            <h4><i class="fas fa-building me-2"></i>Company Information</h4>
                        </div>

                        <div class="section-header mt-4">
                            <h5><i class="fas fa-language me-2"></i>English Contact Information</h5>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Company Address (English) <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="address" id="address" rows="4"
                                placeholder="Enter company full address in English" required>{{ old('address', $contactInfo->Address ?? '') }}</textarea>
                            <small class="form-text text-muted">This address will be displayed on the contact page in
                                English</small>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="section-header mt-4">
                            <h5><i class="fas fa-language me-2"></i>Arabic Contact Information</h5>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Company Address (Arabic)</label>
                            <textarea class="form-control" name="address_ar" id="address_ar" rows="4" dir="rtl"
                                placeholder="أدخل عنوان الشركة الكامل باللغة العربية">{{ old('address_ar', $contactInfo->Address_ar ?? '') }}</textarea>
                            <small class="form-text text-muted" dir="rtl">سيتم عرض هذا العنوان في صفحة الاتصال باللغة
                                العربية</small>
                            @error('address_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="section-header mt-4">
                            <h5><i class="fas fa-globe me-2"></i>Global Contact Details</h5>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $contactInfo->EmailId ?? '') }}"
                                        placeholder="contact@company.com" required>
                                </div>
                                <small class="form-text text-muted">Primary contact email</small>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control" name="contactno" id="contactno"
                                        value="{{ old('contactno', $contactInfo->ContactNo ?? '') }}"
                                        placeholder="+1 (555) 123-4567" required>
                                </div>
                                <small class="form-text text-muted">Customer service phone number</small>
                                @error('contactno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <button class="btn btn-primary" name="submit" type="submit">
                                <i class="fas fa-save me-1"></i> Update Contact Information
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2">
                                <i class="fas fa-arrow-left me-1"></i> Back to Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .section-header h5 {
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 8px;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        /* RTL support for Arabic fields */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-text[dir="rtl"] {
            text-align: right;
        }

        .input-group-text {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
            }

            .form-col {
                width: 100%;
                margin-bottom: 15px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-resize textareas
            const textareas = document.querySelectorAll('textarea');
            textareas.forEach(textarea => {
                textarea.addEventListener('input', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });

                // Trigger initial resize
                setTimeout(() => {
                    textarea.style.height = 'auto';
                    textarea.style.height = (textarea.scrollHeight) + 'px';
                }, 100);
            });

            // Form validation with enhanced feedback
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const requiredFields = form.querySelectorAll('[required]');
                    let isValid = true;
                    let errorMessages = [];

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            isValid = false;
                            const fieldName = field.getAttribute('name');
                            let displayName = fieldName;

                            if (fieldName === 'address') displayName = 'Company Address (English)';
                            else if (fieldName === 'email') displayName = 'Email Address';
                            else if (fieldName === 'contactno') displayName = 'Contact Number';

                            errorMessages.push(`${displayName} is required`);

                            // Highlight the field
                            field.style.borderColor = '#dc3545';
                            field.style.backgroundColor = '#f8d7da';

                            // Add error class to parent
                            const formGroup = field.closest('.form-group, .form-col');
                            if (formGroup) {
                                formGroup.classList.add('has-error');
                            }
                        }
                    });

                    // Email validation
                    const emailField = form.querySelector('#email');
                    if (emailField && emailField.value.trim()) {
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(emailField.value)) {
                            isValid = false;
                            errorMessages.push('Please enter a valid email address');
                            emailField.style.borderColor = '#dc3545';
                            emailField.style.backgroundColor = '#f8d7da';
                        }
                    }

                    if (!isValid) {
                        e.preventDefault();

                        // Create a more user-friendly error message
                        const errorHtml = `
                            <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    ${errorMessages.map(error => `<li>${error}</li>`).join('')}
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;

                        // Remove existing alerts and add new one
                        const existingAlerts = form.querySelectorAll('.alert');
                        existingAlerts.forEach(alert => alert.remove());

                        form.insertAdjacentHTML('afterbegin', errorHtml);

                        // Scroll to the first error
                        const firstError = form.querySelector('[style*="border-color: #dc3545"]');
                        if (firstError) {
                            firstError.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                            firstError.focus();
                        }
                    }
                });

                // Reset field styles on input
                const inputs = form.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.style.borderColor = '';
                        this.style.backgroundColor = '';
                        const formGroup = this.closest('.form-group, .form-col');
                        if (formGroup) {
                            formGroup.classList.remove('has-error');
                        }
                    });
                });
            }

            // Character counter for textareas (optional)
            const addressTextarea = document.getElementById('address');
            const addressArTextarea = document.getElementById('address_ar');

            function updateCharCount(textarea, maxChars = 500) {
                const currentLength = textarea.value.length;
                const counter = textarea.nextElementSibling?.querySelector('.char-count') ||
                    createCharCounter(textarea, maxChars);

                counter.textContent = `${currentLength}/${maxChars} characters`;
                counter.style.color = currentLength > maxChars ? '#dc3545' : '#6c757d';
            }

            function createCharCounter(textarea, maxChars) {
                const counter = document.createElement('small');
                counter.className = 'char-count form-text text-muted mt-1';
                counter.textContent = `0/${maxChars} characters`;

                const formText = textarea.nextElementSibling;
                if (formText && formText.classList.contains('form-text')) {
                    formText.appendChild(counter);
                } else {
                    textarea.insertAdjacentElement('afterend', counter);
                }

                return counter;
            }

            if (addressTextarea) {
                addressTextarea.addEventListener('input', () => updateCharCount(addressTextarea));
                updateCharCount(addressTextarea);
            }

            if (addressArTextarea) {
                addressArTextarea.addEventListener('input', () => updateCharCount(addressArTextarea));
                updateCharCount(addressArTextarea);
            }
        });
    </script>
@endpush
