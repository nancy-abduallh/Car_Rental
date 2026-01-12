@extends('admin.layouts.app')

@section('title', 'Create Brand')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-plus-circle text-primary me-2"></i>Create Brand
                </h2>
                <p class="page-subtitle">Add a new vehicle brand to the system</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-tag me-2"></i>
                        <span>Create New Brand</span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.brands.store') }}" class="modern-form">
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
                            <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Error!</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Brand Name (English) <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-lg" name="brand" id="brand"
                                        value="{{ old('brand') }}" required
                                        placeholder="Enter brand name (e.g., Toyota, Honda, BMW)">
                                    <small class="form-text text-muted">Enter the English name of the vehicle brand</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Brand Name (Arabic)</label>
                                    <input type="text" class="form-control form-control-lg" name="brand_ar"
                                        id="brand_ar" value="{{ old('brand_ar') }}" placeholder="أدخل اسم العلامة التجارية"
                                        dir="rtl">
                                    <small class="form-text text-muted">Enter the Arabic name of the vehicle brand
                                        (optional)</small>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <a href="{{ route('admin.brands') }}" class="btn btn-default me-3">
                                <i class="fas fa-arrow-left me-1"></i> Back to Brands
                            </a>
                            <button class="btn btn-primary" name="submit" type="submit">
                                <i class="fas fa-save me-1"></i> Create Brand
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        input[dir="rtl"] {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: right;
        }
    </style>
@endpush
