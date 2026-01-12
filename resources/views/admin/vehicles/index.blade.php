@extends('admin.layouts.app')

@section('title', 'Manage Vehicles')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-car text-primary me-2"></i>Manage Vehicles
                </h2>
                <p class="page-subtitle">View and manage all vehicles in your fleet</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-list-alt me-2"></i>
                        <span>Vehicle Details</span>
                    </div>
                    <a href="{{ route('admin.vehicles.create') }}" class="btn btn-success btn-add">
                        <i class="fas fa-plus me-1"></i> Add New Vehicle
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
                        <div class="alert alert-danger alert-dismissible fade show animated bounceIn" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>Error!</strong> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="vehiclesTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Vehicle Title (EN)</th>
                                    <th>Vehicle Title (AR)</th>
                                    <th>Brand</th>
                                    <th>Price Per Day</th>
                                    <th>Fuel Type (EN)</th>
                                    <th>Fuel Type (AR)</th>
                                    <th>Model Year</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="vehicle-icon me-2">
                                                    <i class="fas fa-car text-info"></i>
                                                </div>
                                                <span class="vehicle-title">{{ $vehicle->VehiclesTitle }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="vehicle-icon me-2"
                                                    style="background: linear-gradient(135deg, #28a745, #20c997);">
                                                    <i class="fas fa-car text-white"></i>
                                                </div>
                                                <span class="vehicle-title"
                                                    dir="rtl">{{ $vehicle->VehiclesTitle_ar ?? 'N/A' }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-brand">{{ $vehicle->brand->BrandName }}</span>
                                        </td>
                                        <td>
                                            <span class="price-badge">EGP{{ $vehicle->PricePerDay }}</span>
                                        </td>
                                        <td>
                                            <span class="fuel-badge fuel-{{ strtolower($vehicle->FuelType) }}">
                                                <i class="fas fa-gas-pump me-1"></i>{{ $vehicle->FuelType }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="fuel-badge fuel-{{ strtolower($vehicle->FuelType) }}"
                                                dir="rtl">
                                                <i class="fas fa-gas-pump me-1"></i>{{ $vehicle->FuelType_ar ?? 'N/A' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="year-badge">{{ $vehicle->ModelYear }}</span>
                                        </td>
                                        <td>
                                            <span class="status-badge status-available">
                                                <i class="fas fa-circle me-1"></i>Available
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <a href="{{ route('admin.vehicles.edit', $vehicle->id) }}"
                                                    class="btn btn-action btn-edit" data-bs-toggle="tooltip"
                                                    title="Edit Vehicle">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- Individual Delete Form for each vehicle --}}
                                                <form action="{{ route('admin.vehicles.destroy', $vehicle->id) }}"
                                                    method="POST" class="d-inline ms-2 delete-form"
                                                    id="delete-form-{{ $vehicle->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-action btn-delete delete-btn"
                                                        data-vehicle-id="{{ $vehicle->id }}"
                                                        data-vehicle-title="{{ $vehicle->VehiclesTitle }}"
                                                        data-bs-toggle="tooltip" title="Delete Vehicle">
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

@push('scripts')
    <script>
        window.csrfToken = "{{ csrf_token() }}";
        window.vehiclesBaseUrl = "{{ url('/admin/vehicles') }}";
    </script>
@endpush

@push('styles')
    <style>
        .delete-form {
            display: inline-block;
        }

        .btn-action {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .btn-edit:hover {
            background: linear-gradient(135deg, #218838, #1e9e8a);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }

        .btn-delete {
            background: linear-gradient(135deg, #dc3545, #e83e8c);
            color: white;
        }

        .btn-delete:hover {
            background: linear-gradient(135deg, #c82333, #d91a7a);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .table-row-hover {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef) !important;
            transform: scale(1.01);
            transition: all 0.3s ease;
        }

        .fuel-petrol {
            background-color: #28a745 !important;
        }

        .fuel-diesel {
            background-color: #007bff !important;
        }

        .fuel-cng {
            background-color: #6f42c1 !important;
        }

        .fuel-electric {
            background-color: #17a2b8 !important;
        }

        .fuel-hybrid {
            background-color: #fd7e14 !important;
        }

        .fuel-badge,
        .status-badge,
        .year-badge,
        .price-badge,
        .badge.bg-brand {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
            color: white;
        }

        .status-available {
            background-color: #28a745;
        }

        .status-unavailable {
            background-color: #dc3545;
        }

        .price-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            font-weight: 700;
        }

        .badge.bg-brand {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .vehicle-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* SweetAlert2 customization */
        .swal2-popup {
            border-radius: 12px;
        }

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
@endpush
