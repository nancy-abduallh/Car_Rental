@extends('admin.layouts.app')

@section('title', 'Vehicle Image ' . $imageNumber)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-image text-primary me-2"></i>Update Image {{ $imageNumber }}
                </h2>
                <p class="page-subtitle">Update vehicle image for {{ $vehicle->VehiclesTitle }}</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-sync-alt me-2"></i>
                        <span>Update Vehicle Image</span>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Debug info --}}
                    @if (app()->environment('local'))
                        <div class="alert alert-info">
                            <strong>Debug Info:</strong><br>
                            Vehicle ID: {{ $vehicle->id }}<br>
                            Image Number: {{ $imageNumber }}<br>
                            Current Image: {{ $vehicle->{"Vimage{$imageNumber}"} }}
                        </div>
                    @endif

                    <form method="POST"
                        action="{{ route('admin.vehicles.update.image', ['id' => $vehicle->id, 'imageNumber' => $imageNumber]) }}"
                        class="modern-form" enctype="multipart/form-data" id="updateImageForm">
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show animated bounceIn" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Validation Error!</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Current Image {{ $imageNumber }}</label>
                                @php
                                    $imageField = "Vimage{$imageNumber}";
                                    $currentImage = $vehicle->$imageField;
                                @endphp
                                @if ($currentImage)
                                    <div class="image-preview-container">
                                        <img src="{{ asset('img/vehicleimages/' . $currentImage) }}?v={{ time() }}"
                                            class="image-preview current-image" alt="Current Image {{ $imageNumber }}"
                                            style="max-width: 400px; max-height: 300px; border: 2px solid #dee2e6; border-radius: 8px;">
                                        <p class="text-muted mt-2">Current vehicle image</p>
                                        <p class="text-info">
                                            <small>File: {{ $currentImage }}</small>
                                        </p>
                                    </div>
                                @else
                                    <div class="alert alert-warning">
                                        <i class="fas fa-exclamation-triangle me-2"></i>
                                        No image currently set for this position
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Upload New Image {{ $imageNumber }} <span
                                        class="text-danger">*</span></label>
                                <div class="file-input-group">
                                    <label class="file-input-label" for="newImageInput">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Choose New Image</span>
                                        <small class="d-block text-muted">Click to select new image file</small>
                                    </label>
                                    <input type="file" name="img{{ $imageNumber }}" class="form-control file-input"
                                        required accept="image/*" id="newImageInput">
                                </div>
                                <small class="form-text text-muted">Recommended: JPG, PNG format, max 2MB</small>

                                <!-- New Image Preview -->
                                <div class="new-image-preview mt-3" id="newImagePreview" style="display: none;">
                                    <label class="form-label">New Image Preview:</label>
                                    <div class="image-preview-container">
                                        <img src="" class="image-preview new-image-preview-img"
                                            alt="New Image Preview"
                                            style="max-width: 400px; max-height: 300px; border: 2px solid #28a745; border-radius: 8px;">
                                        <p class="text-success mt-2">
                                            <i class="fas fa-eye me-1"></i>This is how your new image will look
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}" class="btn btn-default me-3">
                                <i class="fas fa-arrow-left me-1"></i> Back to Edit
                            </a>
                            <button class="btn btn-primary" name="update" type="submit" id="submitButton">
                                <i class="fas fa-sync-alt me-1"></i> Update Image
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .image-preview-container {
            text-align: center;
            margin: 15px 0;
        }

        .current-image {
            border: 2px solid #dee2e6;
        }

        .new-image-preview-img {
            border: 2px solid #28a745;
        }

        .file-input-label {
            cursor: pointer;
            padding: 20px;
            border: 2px dashed #007bff;
            border-radius: 8px;
            text-align: center;
            background: #f8f9fa;
            transition: all 0.3s ease;
        }

        .file-input-label:hover {
            background: #e9ecef;
            border-color: #0056b3;
        }

        .file-input {
            display: none;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newImageInput = document.getElementById('newImageInput');
            const newImagePreview = document.getElementById('newImagePreview');
            const newImagePreviewImg = document.querySelector('.new-image-preview-img');
            const currentImage = document.querySelector('.current-image');
            const submitButton = document.getElementById('submitButton');
            const form = document.getElementById('updateImageForm');
            const fileInputLabel = document.querySelector('.file-input-label');

            // Click on label triggers file input
            fileInputLabel.addEventListener('click', function() {
                newImageInput.click();
            });

            // Live preview of new image
            newImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];

                if (file) {
                    // Validate file size (2MB = 2097152 bytes)
                    if (file.size > 2097152) {
                        alert('File size must be less than 2MB');
                        this.value = '';
                        return;
                    }

                    // Validate file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                    if (!validTypes.includes(file.type)) {
                        alert('Please select a valid image file (JPEG, PNG, JPG, GIF)');
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        newImagePreviewImg.src = e.target.result;
                        newImagePreview.style.display = 'block';

                        // Scroll to preview
                        newImagePreview.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }

                    reader.readAsDataURL(file);
                } else {
                    newImagePreview.style.display = 'none';
                }
            });

            // Form submission feedback
            form.addEventListener('submit', function(e) {
                // Basic validation
                if (!newImageInput.files || newImageInput.files.length === 0) {
                    e.preventDefault();
                    alert('Please select an image file before submitting.');
                    return;
                }

                // Disable button and show loading state
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Updating...';
            });

            // If there's a success message, highlight the current image
            @if (session('success'))
                if (currentImage) {
                    currentImage.style.border = '3px solid #28a745';
                    currentImage.style.boxShadow = '0 0 10px rgba(40, 167, 69, 0.5)';

                    // Remove highlight after 3 seconds
                    setTimeout(function() {
                        currentImage.style.border = '2px solid #dee2e6';
                        currentImage.style.boxShadow = 'none';
                    }, 3000);
                }
            @endif
        });
    </script>
@endsection
