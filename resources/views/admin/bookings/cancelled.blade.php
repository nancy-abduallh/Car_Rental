@extends('admin.layouts.app')

@section('title', 'Cancelled Bookings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-times-circle text-danger me-2"></i>Cancelled Bookings
                </h2>
                <p class="page-subtitle">View all cancelled rental bookings</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-ban me-2"></i>
                        <span>Cancelled Bookings</span>
                    </div>
                    <div class="header-actions">
                        <a href="{{ route('admin.bookings') }}" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-list me-1"></i> All Bookings
                        </a>
                        <a href="{{ route('admin.bookings.confirmed') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-check-circle me-1"></i> Confirmed
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="cancelledBookingsTable" class="table table-hover table-striped modern-table"
                            cellspacing="0" width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Booking No.</th>
                                    <th>Vehicle</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Status (EN)</th>
                                    <th>Status (AR)</th>
                                    <th>Posting Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="customer-info">
                                                <div class="customer-name fw-bold">
                                                    {{ $booking->user->FullName ?? 'Customer Not Found' }}
                                                </div>
                                                <small class="text-muted">
                                                    {{ $booking->user->EmailId ?? ($booking->userEmail ?? 'N/A') }}
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="booking-number">#{{ $booking->BookingNumber }}</span>
                                        </td>
                                        <td>
                                            @if ($booking->vehicle && $booking->vehicle->brand)
                                                <a href="{{ route('admin.vehicles.edit', $booking->vid) }}"
                                                    class="vehicle-link">
                                                    <i class="fas fa-car text-info me-1"></i>
                                                    {{ $booking->vehicle->brand->BrandName }}
                                                    {{ $booking->vehicle->VehiclesTitle }}
                                                </a>
                                            @else
                                                <span class="text-muted">Vehicle not found</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $booking->FromDate }}</span>
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $booking->ToDate }}</span>
                                        </td>
                                        <td>
                                            <span class="status-badge status-cancelled">
                                                <i class="fas fa-times-circle me-1"></i>Cancelled
                                            </span>
                                        </td>
                                        <td>
                                            <span class="status-badge status-cancelled" dir="rtl">
                                                <i class="fas fa-times-circle me-1"></i>{{ $booking->Status_ar ?? 'ملغى' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $booking->PostingDate }}</span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                    class="btn btn-action btn-info" data-bs-toggle="tooltip"
                                                    title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
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
        document.addEventListener('DOMContentLoaded', function() {
            $('#cancelledBookingsTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search cancelled bookings...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ cancelled bookings",
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

@push('styles')
    <style>
        .status-badge {
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
            color: white;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .status-cancelled {
            background-color: #dc3545;
        }

        .date-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #6f42c1);
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #138496, #5a2d91);
            transform: translateY(-2px);
        }

        .vehicle-link {
            color: #495057;
            text-decoration: none;
            font-weight: 500;
        }

        .vehicle-link:hover {
            color: #007bff;
            text-decoration: underline;
        }

        .booking-number {
            font-weight: 600;
            color: #495057;
            background: #f8f9fa;
            padding: 0.25em 0.5em;
            border-radius: 0.25rem;
            font-family: 'Courier New', monospace;
        }

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
@endpush
