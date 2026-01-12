@extends('admin.layouts.app')

@section('title', 'Post A Vehicle')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-plus-circle text-primary me-2"></i>Post A Vehicle
                </h2>
                <p class="page-subtitle">Add a new vehicle to your rental fleet</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-car me-2"></i>
                        <span>Vehicle Information</span>
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

                    @if ($errors->any())
                        <div class="alert alert-error alert-dismissible fade show animated shake" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Error!</strong> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.vehicles.store') }}" class="modern-form"
                        enctype="multipart/form-data" id="vehicleForm">
                        @csrf

                        <div class="section-header">
                            <h4><i class="fas fa-info-circle"></i>Basic Information</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Vehicle Title (English) <span class="text-danger">*</span></label>
                                <input type="text" name="vehicletitle" class="form-control form-control-lg" required
                                    placeholder="Enter vehicle title in English" value="{{ old('vehicletitle') }}">
                                @error('vehicletitle')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label class="form-label">Vehicle Title (Arabic)</label>
                                <input type="text" name="vehicletitle_ar" class="form-control form-control-lg"
                                    placeholder="أدخل عنوان المركبة بالعربية" value="{{ old('vehicletitle_ar') }}"
                                    dir="rtl">
                                @error('vehicletitle_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Select Brand <span class="text-danger">*</span></label>
                                <select class="selectpicker" name="brandname" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brandname') == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->BrandName }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brandname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vehicle Overview (English) <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="vehicalorcview" rows="4" required
                                placeholder="Describe the vehicle features and specifications in English">{{ old('vehicalorcview') }}</textarea>
                            @error('vehicalorcview')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vehicle Overview (Arabic)</label>
                            <textarea class="form-control" name="vehicalorcview_ar" rows="4" placeholder="صف مواصفات وميزات المركبة بالعربية"
                                dir="rtl">{{ old('vehicalorcview_ar') }}</textarea>
                            @error('vehicalorcview_ar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-cog"></i>Specifications & Pricing</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Price Per Day (EGP) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">EGP</span>
                                    <input type="text" name="priceperday" class="form-control" required
                                        placeholder="0.00" value="{{ old('priceperday') }}">
                                </div>
                                @error('priceperday')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Fuel Type (English) <span class="text-danger">*</span></label>
                                <select class="selectpicker" name="fueltype" required>
                                    <option value="">Select Fuel Type</option>
                                    <option value="Petrol" {{ old('fueltype') == 'Petrol' ? 'selected' : '' }}>Petrol
                                    </option>
                                    <option value="Diesel" {{ old('fueltype') == 'Diesel' ? 'selected' : '' }}>Diesel
                                    </option>
                                    <option value="CNG" {{ old('fueltype') == 'CNG' ? 'selected' : '' }}>CNG</option>
                                    <option value="Electric" {{ old('fueltype') == 'Electric' ? 'selected' : '' }}>
                                        Electric</option>
                                    <option value="Hybrid" {{ old('fueltype') == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                    </option>
                                </select>
                                @error('fueltype')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label class="form-label">Fuel Type (Arabic)</label>
                                <input type="text" name="fueltype_ar" class="form-control"
                                    placeholder="نوع الوقود بالعربية" value="{{ old('fueltype_ar') }}" dir="rtl">
                                @error('fueltype_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Model Year <span class="text-danger">*</span></label>
                                <input type="text" name="modelyear" class="form-control" required placeholder="YYYY"
                                    value="{{ old('modelyear') }}">
                                @error('modelyear')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-col">
                                <label class="form-label">Seating Capacity <span class="text-danger">*</span></label>
                                <input type="text" name="seatingcapacity" class="form-control" required
                                    placeholder="Number of seats" value="{{ old('seatingcapacity') }}">
                                @error('seatingcapacity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-images"></i>Vehicle Images</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <div class="file-input-group">
                                    <label class="form-label">Image 1 (Required) <span
                                            class="text-danger">*</span></label>
                                    <div class="file-input-wrapper">
                                        <input type="file" name="img1" class="form-control file-input" required
                                            accept="image/jpeg,image/png,image/jpg,image/gif" data-preview="preview1"
                                            id="img1">
                                        <div class="file-input-custom">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>
                                            <span class="file-input-text">Click to upload main image</span>
                                        </div>
                                    </div>
                                    <div class="image-preview-container" id="preview1">
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image text-muted"></i>
                                            <small class="d-block text-muted">No image selected</small>
                                        </div>
                                    </div>
                                    @error('img1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="file-input-group">
                                    <label class="form-label">Image 2 (Required) <span
                                            class="text-danger">*</span></label>
                                    <div class="file-input-wrapper">
                                        <input type="file" name="img2" class="form-control file-input" required
                                            accept="image/jpeg,image/png,image/jpg,image/gif" data-preview="preview2"
                                            id="img2">
                                        <div class="file-input-custom">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>
                                            <span class="file-input-text">Click to upload secondary image</span>
                                        </div>
                                    </div>
                                    <div class="image-preview-container" id="preview2">
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image text-muted"></i>
                                            <small class="d-block text-muted">No image selected</small>
                                        </div>
                                    </div>
                                    @error('img2')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="file-input-group">
                                    <label class="form-label">Image 3 (Required) <span
                                            class="text-danger">*</span></label>
                                    <div class="file-input-wrapper">
                                        <input type="file" name="img3" class="form-control file-input" required
                                            accept="image/jpeg,image/png,image/jpg,image/gif" data-preview="preview3"
                                            id="img3">
                                        <div class="file-input-custom">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>
                                            <span class="file-input-text">Click to upload interior image</span>
                                        </div>
                                    </div>
                                    <div class="image-preview-container" id="preview3">
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image text-muted"></i>
                                            <small class="d-block text-muted">No image selected</small>
                                        </div>
                                    </div>
                                    @error('img3')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <div class="file-input-group">
                                    <label class="form-label">Image 4 (Required) <span
                                            class="text-danger">*</span></label>
                                    <div class="file-input-wrapper">
                                        <input type="file" name="img4" class="form-control file-input" required
                                            accept="image/jpeg,image/png,image/jpg,image/gif" data-preview="preview4"
                                            id="img4">
                                        <div class="file-input-custom">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>
                                            <span class="file-input-text">Click to upload additional image</span>
                                        </div>
                                    </div>
                                    <div class="image-preview-container" id="preview4">
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image text-muted"></i>
                                            <small class="d-block text-muted">No image selected</small>
                                        </div>
                                    </div>
                                    @error('img4')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="file-input-group">
                                    <label class="form-label">Image 5 (Optional)</label>
                                    <div class="file-input-wrapper">
                                        <input type="file" name="img5" class="form-control file-input"
                                            accept="image/jpeg,image/png,image/jpg,image/gif" data-preview="preview5"
                                            id="img5">
                                        <div class="file-input-custom">
                                            <i class="fas fa-cloud-upload-alt me-2"></i>
                                            <span class="file-input-text">Click to upload extra image</span>
                                        </div>
                                    </div>
                                    <div class="image-preview-container" id="preview5">
                                        <div class="no-image-placeholder">
                                            <i class="fas fa-image text-muted"></i>
                                            <small class="d-block text-muted">No image selected</small>
                                        </div>
                                    </div>
                                    @error('img5')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-list-check"></i>Vehicle Features & Accessories</h4>
                        </div>

                        <div class="features-grid">
                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="airconditioner"
                                            name="airconditioner" value="1"
                                            {{ old('airconditioner') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="airconditioner">
                                            <i class="fas fa-snowflake me-2"></i>Air Conditioner
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powerdoorlocks"
                                            name="powerdoorlocks" value="1"
                                            {{ old('powerdoorlocks') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powerdoorlocks">
                                            <i class="fas fa-lock me-2"></i>Power Door Locks
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="antilockbrakingsys"
                                            name="antilockbrakingsys" value="1"
                                            {{ old('antilockbrakingsys') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="antilockbrakingsys">
                                            <i class="fas fa-car-burst me-2"></i>AntiLock Braking System
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="brakeassist"
                                            name="brakeassist" value="1" {{ old('brakeassist') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brakeassist">
                                            <i class="fas fa-car-brake me-2"></i>Brake Assist
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powersteering"
                                            name="powersteering" value="1"
                                            {{ old('powersteering') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powersteering">
                                            <i class="fas fa-steering-wheel me-2"></i>Power Steering
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="driverairbag"
                                            name="driverairbag" value="1"
                                            {{ old('driverairbag') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="driverairbag">
                                            <i class="fas fa-user-shield me-2"></i>Driver Airbag
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="passengerairbag"
                                            name="passengerairbag" value="1"
                                            {{ old('passengerairbag') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="passengerairbag">
                                            <i class="fas fa-user-shield me-2"></i>Passenger Airbag
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powerwindow"
                                            name="powerwindow" value="1" {{ old('powerwindow') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powerwindow">
                                            <i class="fas fa-window-maximize me-2"></i>Power Windows
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer"
                                            value="1" {{ old('cdplayer') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="cdplayer">
                                            <i class="fas fa-compact-disc me-2"></i>CD Player
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="centrallocking"
                                            name="centrallocking" value="1"
                                            {{ old('centrallocking') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="centrallocking">
                                            <i class="fas fa-key me-2"></i>Central Locking
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="crashcensor"
                                            name="crashcensor" value="1" {{ old('crashcensor') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="crashcensor">
                                            <i class="fas fa-exclamation-triangle me-2"></i>Crash Sensor
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="leatherseats"
                                            name="leatherseats" value="1"
                                            {{ old('leatherseats') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="leatherseats">
                                            <i class="fas fa-chair me-2"></i>Leather Seats
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <a href="{{ route('admin.vehicles') }}" class="btn btn-default me-3">
                                <i class="fas fa-arrow-left me-1"></i> Back to Vehicles
                            </a>
                            <button class="btn btn-default me-3" type="reset" id="resetForm">
                                <i class="fas fa-times me-1"></i> Reset
                            </button>
                            <button class="btn btn-primary" name="submit" type="submit">
                                <i class="fas fa-save me-1"></i> Save Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .features-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-item {
            padding: 10px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            border-color: #667eea;
            background: #fff;
        }

        .modern-checkbox .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .modern-checkbox .form-check-label {
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .file-input-group {
            margin-bottom: 20px;
        }

        .file-input-wrapper {
            position: relative;
            margin-bottom: 10px;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }

        .file-input-custom {
            padding: 12px 15px;
            border: 2px dashed #007bff;
            border-radius: 8px;
            background: #f8f9fa;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-input-custom:hover {
            background: #e9ecef;
            border-color: #0056b3;
        }

        .file-input-text {
            color: #495057;
            font-weight: 500;
        }

        .image-preview-container {
            margin-top: 15px;
            text-align: center;
        }

        .image-preview {
            max-width: 100%;
            max-height: 150px;
            border-radius: 8px;
            border: 2px solid #e9ecef;
            display: none;
        }

        .no-image-placeholder {
            padding: 20px;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            background: #f8f9fa;
            color: #6c757d;
        }

        .no-image-placeholder i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .preview-actions {
            margin-top: 10px;
        }

        .preview-actions .btn {
            margin: 0 5px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        /* RTL support for Arabic fields */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @media (max-width: 768px) {
            .feature-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .file-input-custom {
                padding: 10px;
            }

            .file-input-text {
                font-size: 0.9rem;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            const fileInputs = document.querySelectorAll('.file-input');

            fileInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const previewId = this.getAttribute('data-preview');
                    const previewContainer = document.getElementById(previewId);
                    const fileInputCustom = this.closest('.file-input-wrapper').querySelector(
                        '.file-input-custom');

                    if (file) {
                        // Validate file type
                        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                        if (!validTypes.includes(file.type)) {
                            alert('Please select a valid image file (JPEG, PNG, JPG, GIF)');
                            this.value = '';
                            return;
                        }

                        // Validate file size (2MB = 2097152 bytes)
                        if (file.size > 2097152) {
                            alert('File size must be less than 2MB');
                            this.value = '';
                            return;
                        }

                        const reader = new FileReader();

                        reader.onload = function(e) {
                            previewContainer.innerHTML = `
                        <img src="${e.target.result}" class="image-preview" alt="Preview">
                        <div class="preview-actions">
                            <button type="button" class="btn btn-sm btn-outline-danger remove-image" data-input="${previewId}">
                                <i class="fas fa-times me-1"></i> Remove
                            </button>
                        </div>
                    `;
                            previewContainer.querySelector('.image-preview').style.display =
                                'block';

                            // Update the custom file input text
                            fileInputCustom.innerHTML = `
                        <i class="fas fa-check-circle text-success me-2"></i>
                        <span class="file-input-text">${file.name}</span>
                        <small class="d-block text-muted">${(file.size / 1024).toFixed(2)} KB</small>
                    `;
                        }

                        reader.readAsDataURL(file);
                    }
                });
            });

            // Remove image functionality
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-image') || e.target.closest('.remove-image')) {
                    const button = e.target.classList.contains('remove-image') ? e.target : e.target
                        .closest('.remove-image');
                    const previewId = button.getAttribute('data-input');
                    const previewContainer = document.getElementById(previewId);
                    const fileInput = document.querySelector(`[data-preview="${previewId}"]`);
                    const fileInputCustom = fileInput.closest('.file-input-wrapper').querySelector(
                        '.file-input-custom');

                    // Reset file input
                    fileInput.value = '';

                    // Reset preview
                    previewContainer.innerHTML = `
                <div class="no-image-placeholder">
                    <i class="fas fa-image"></i>
                    <small class="d-block text-muted">No image selected</small>
                </div>
            `;

                    // Reset custom file input
                    const inputId = fileInput.id;
                    let defaultText = 'Click to upload extra image';

                    if (inputId === 'img1') defaultText = 'Click to upload main image';
                    else if (inputId === 'img2') defaultText = 'Click to upload secondary image';
                    else if (inputId === 'img3') defaultText = 'Click to upload interior image';
                    else if (inputId === 'img4') defaultText = 'Click to upload additional image';
                    else if (inputId === 'img5') defaultText = 'Click to upload extra image';

                    fileInputCustom.innerHTML = `
                <i class="fas fa-cloud-upload-alt me-2"></i>
                <span class="file-input-text">${defaultText}</span>
            `;
                }
            });

            // Form reset functionality
            document.getElementById('resetForm').addEventListener('click', function() {
                // Clear all image previews and file inputs
                const fileInputs = document.querySelectorAll('.file-input');
                fileInputs.forEach(input => {
                    input.value = '';
                    const previewId = input.getAttribute('data-preview');
                    const previewContainer = document.getElementById(previewId);
                    const fileInputCustom = input.closest('.file-input-wrapper').querySelector(
                        '.file-input-custom');

                    // Reset preview
                    previewContainer.innerHTML = `
                <div class="no-image-placeholder">
                    <i class="fas fa-image"></i>
                    <small class="d-block text-muted">No image selected</small>
                </div>
            `;

                    // Reset custom file input
                    const inputId = input.id;
                    let defaultText = 'Click to upload extra image';

                    if (inputId === 'img1') defaultText = 'Click to upload main image';
                    else if (inputId === 'img2') defaultText = 'Click to upload secondary image';
                    else if (inputId === 'img3') defaultText = 'Click to upload interior image';
                    else if (inputId === 'img4') defaultText = 'Click to upload additional image';
                    else if (inputId === 'img5') defaultText = 'Click to upload extra image';

                    fileInputCustom.innerHTML = `
                <i class="fas fa-cloud-upload-alt me-2"></i>
                <span class="file-input-text">${defaultText}</span>
            `;
                });
            });

            // Form validation for file inputs
            document.getElementById('vehicleForm').addEventListener('submit', function(e) {
                const requiredInputs = document.querySelectorAll('input[type="file"][required]');
                let isValid = true;
                let errorMessages = [];

                requiredInputs.forEach(input => {
                    if (!input.files || input.files.length === 0) {
                        isValid = false;
                        const inputId = input.id;
                        let fieldName = 'Image';

                        if (inputId === 'img1') fieldName = 'Image 1';
                        else if (inputId === 'img2') fieldName = 'Image 2';
                        else if (inputId === 'img3') fieldName = 'Image 3';
                        else if (inputId === 'img4') fieldName = 'Image 4';

                        errorMessages.push(`${fieldName} is required`);

                        // Highlight the file input
                        const fileInputCustom = input.closest('.file-input-wrapper').querySelector(
                            '.file-input-custom');
                        fileInputCustom.style.borderColor = '#dc3545';
                        fileInputCustom.style.backgroundColor = '#f8d7da';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fix the following errors:\n\n' + errorMessages.join('\n'));
                }
            });

            // Real-time validation feedback
            fileInputs.forEach(input => {
                input.addEventListener('change', function() {
                    const fileInputCustom = this.closest('.file-input-wrapper').querySelector(
                        '.file-input-custom');
                    // Reset styling when user selects a file
                    fileInputCustom.style.borderColor = '#28a745';
                    fileInputCustom.style.backgroundColor = '#d4edda';

                    // Reset to normal after 2 seconds
                    setTimeout(() => {
                        fileInputCustom.style.borderColor = '#007bff';
                        fileInputCustom.style.backgroundColor = '#f8f9fa';
                    }, 2000);
                });
            });
        });
    </script>
@endsection
