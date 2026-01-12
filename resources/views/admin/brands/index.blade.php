@extends('admin.layouts.app')

@section('title', 'Manage Brands')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-tags text-primary me-2"></i>Manage Brands
                </h2>
                <p class="page-subtitle">View and manage all vehicle brands</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-list me-2"></i>
                        <span>Brand List</span>
                    </div>
                    <a href="{{ route('admin.brands.create') }}" class="btn btn-success btn-add">
                        <i class="fas fa-plus me-1"></i> Add New Brand
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show animated bounceIn" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <strong>Success!</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show animated shake" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="brandsTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Brand Name (English)</th>
                                    <th>Brand Name (Arabic)</th>
                                    <th>Creation Date</th>
                                    <th>Updation Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="brand-icon me-3">
                                                    <i class="fas fa-tag text-warning"></i>
                                                </div>
                                                <span class="brand-name fw-bold">{{ $brand->BrandName }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($brand->BrandName_ar)
                                                <div class="d-flex align-items-center">
                                                    <div class="brand-icon me-3">
                                                        <i class="fas fa-tag text-info"></i>
                                                    </div>
                                                    <span class="brand-name fw-bold"
                                                        dir="rtl">{{ $brand->BrandName_ar }}</span>
                                                </div>
                                            @else
                                                <span class="text-muted">Not set</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $brand->CreationDate }}</span>
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $brand->UpdationDate }}</span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                                    class="btn btn-action btn-edit me-2" data-bs-toggle="tooltip"
                                                    title="Edit Brand">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-action btn-delete"
                                                        onclick="return confirm('Are you sure you want to delete this brand?')"
                                                        data-bs-toggle="tooltip" title="Delete Brand">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .brand-name[dir="rtl"] {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .date-badge {
            background: #f8f9fa;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.85rem;
            color: #6c757d;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#brandsTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search brands...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ brands",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                }
            });

            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
