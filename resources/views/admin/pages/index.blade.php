@extends('admin.layouts.app')

@section('title', 'Manage Pages')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-file-alt text-primary me-2"></i>Manage Pages
                </h2>
                <p class="page-subtitle">Update website page content and information</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-cog me-2"></i>
                        <span>Page Content Management</span>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show animated bounceIn" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="GET" class="modern-form">
                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Select Page <span class="text-danger">*</span></label>
                                <select name="type" class="selectpicker" onchange="this.form.submit()">
                                    <option value="" selected="selected">*** Select Page ***</option>
                                    <option value="terms" {{ $type == 'terms' ? 'selected' : '' }}>Terms and Conditions
                                    </option>
                                    <option value="privacy" {{ $type == 'privacy' ? 'selected' : '' }}>Privacy and Policy
                                    </option>
                                    <option value="aboutus" {{ $type == 'aboutus' ? 'selected' : '' }}>About Us</option>
                                    <option value="faqs" {{ $type == 'faqs' ? 'selected' : '' }}>FAQs</option>
                                </select>
                            </div>
                        </div>
                    </form>

                    @if ($type)
                        <form method="POST" action="{{ route('admin.pages.update', $type) }}" class="modern-form">
                            @csrf

                            <hr class="modern-divider">

                            <div class="section-header">
                                <h4><i class="fas fa-edit me-2"></i>Edit Page Content</h4>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label class="form-label">Selected Page</label>
                                    <div class="selected-page-display">
                                        @switch($type)
                                            @case('terms')
                                                <div class="page-type-badge">
                                                    <i class="fas fa-gavel me-2"></i>Terms and Conditions
                                                </div>
                                            @break

                                            @case('privacy')
                                                <div class="page-type-badge">
                                                    <i class="fas fa-shield-alt me-2"></i>Privacy And Policy
                                                </div>
                                            @break

                                            @case('aboutus')
                                                <div class="page-type-badge">
                                                    <i class="fas fa-info-circle me-2"></i>About US
                                                </div>
                                            @break

                                            @case('faqs')
                                                <div class="page-type-badge">
                                                    <i class="fas fa-question-circle me-2"></i>FAQs
                                                </div>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>

                            <div class="section-header mt-4">
                                <h5><i class="fas fa-language me-2"></i>English Content</h5>
                            </div>

                            <div class="form-row">
                                <div class="form-col">
                                    <label class="form-label">Page Name (English) <span class="text-danger">*</span></label>
                                    <input type="text" name="pagename" class="form-control"
                                        value="{{ old('pagename', $page->PageName ?? '') }}"
                                        placeholder="Enter page name in English" required>
                                    @error('pagename')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-col">
                                    <label class="form-label">Page Name (Arabic)</label>
                                    <input type="text" name="pagename_ar" class="form-control" dir="rtl"
                                        value="{{ old('pagename_ar', $page->PageName_ar ?? '') }}"
                                        placeholder="أدخل اسم الصفحة بالعربية">
                                    @error('pagename_ar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Page Content (English) <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="8" name="pgedetails" id="pgedetails"
                                    placeholder="Enter page content in English..." required>{{ old('pgedetails', $page->detail ?? '') }}</textarea>
                                <small class="form-text text-muted">Use rich text formatting for better presentation</small>
                                @error('pgedetails')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="section-header mt-4">
                                <h5><i class="fas fa-language me-2"></i>Arabic Content</h5>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Page Content (Arabic)</label>
                                <textarea class="form-control" rows="8" name="pgedetails_ar" id="pgedetails_ar" dir="rtl"
                                    placeholder="أدخل محتوى الصفحة بالعربية...">{{ old('pgedetails_ar', $page->detail_ar ?? '') }}</textarea>
                                <small class="form-text text-muted">استخدم تنسيق النص الغني لعرض أفضل</small>
                                @error('pgedetails_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <hr class="modern-divider">

                            <div class="form-group text-center">
                                <button type="submit" name="submit" value="Update" id="submit"
                                    class="btn btn-primary">
                                    <i class="fas fa-sync-alt me-1"></i> Update Page
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-file-alt fa-4x text-muted mb-3"></i>
                            <h4 class="text-muted">Select a Page to Edit</h4>
                            <p class="text-muted">Choose a page from the dropdown above to start editing content</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .page-type-badge {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
        }

        .selected-page-display {
            margin: 15px 0;
        }

        /* Textarea enhancements */
        #pgedetails,
        #pgedetails_ar {
            min-height: 300px;
            line-height: 1.6;
        }

        .section-header h5 {
            color: #495057;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 8px;
            margin-bottom: 15px;
        }

        /* RTL support for Arabic fields */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-text[dir="rtl"] {
            text-align: right;
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
                textarea.style.height = 'auto';
                textarea.style.height = (textarea.scrollHeight) + 'px';
            });

            // Form validation
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

                            if (fieldName === 'pagename') displayName = 'Page Name (English)';
                            else if (fieldName === 'pgedetails') displayName =
                                'Page Content (English)';

                            errorMessages.push(`${displayName} is required`);

                            // Highlight the field
                            field.style.borderColor = '#dc3545';
                            field.style.backgroundColor = '#f8d7da';
                        }
                    });

                    if (!isValid) {
                        e.preventDefault();
                        alert('Please fix the following errors:\n\n' + errorMessages.join('\n'));
                    }
                });

                // Reset field styles on input
                const inputs = form.querySelectorAll('input, textarea');
                inputs.forEach(input => {
                    input.addEventListener('input', function() {
                        this.style.borderColor = '';
                        this.style.backgroundColor = '';
                    });
                });
            }

            // Initialize any rich text editors if available
            if (typeof CKEDITOR !== 'undefined') {
                @if ($type)
                    CKEDITOR.replace('pgedetails', {
                        toolbar: 'Basic',
                        height: 300
                    });
                    CKEDITOR.replace('pgedetails_ar', {
                        toolbar: 'Basic',
                        height: 300
                    });
                @endif
            }
        });
    </script>
@endpush
