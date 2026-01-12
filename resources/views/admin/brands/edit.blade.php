@extends('admin.layouts.app')

@section('title', 'Update Brand')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-edit text-primary me-2"></i>Update Brand
                </h2>
                <p class="page-subtitle">Modify brand information</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-tag me-2"></i>
                        <span>Update Brand</span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.brands.update', $brand->id) }}" class="modern-form">
                        @csrf
                        @method('PUT')

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
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ old('brand', $brand->BrandName) }}" name="brand" id="brand" required
                                        placeholder="Enter brand name">
                                    <small class="form-text text-muted">Update the English name of the vehicle brand</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Brand Name (Arabic)</label>
                                    <input type="text" class="form-control form-control-lg"
                                        value="{{ old('brand_ar', $brand->BrandName_ar) }}" name="brand_ar" id="brand_ar"
                                        placeholder="أدخل اسم العلامة التجارية" dir="rtl">
                                    <small class="form-text text-muted">Update the Arabic name of the vehicle brand
                                        (optional)</small>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="info-header">
                                        <i class="fas fa-calendar-plus me-2"></i>
                                        Creation Date
                                    </div>
                                    <div class="info-content">
                                        {{ $brand->CreationDate }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="info-header">
                                        <i class="fas fa-calendar-check me-2"></i>
                                        Last Updated
                                    </div>
                                    <div class="info-content">
                                        {{ $brand->UpdationDate ?? 'Not updated yet' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <a href="{{ route('admin.brands') }}" class="btn btn-default me-3">
                                <i class="fas fa-arrow-left me-1"></i> Back to Brands
                            </a>
                            <button class="btn btn-primary" name="submit" type="submit">
                                <i class="fas fa-sync-alt me-1"></i> Update Brand
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

        .info-card {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            border-left: 4px solid #007bff;
        }

        .info-header {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .info-content {
            color: #6c757d;
            font-size: 0.85rem;
        }
    </style>
@endpush
