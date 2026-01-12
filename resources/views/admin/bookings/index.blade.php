@extends('admin.layouts.app')

@section('title', 'Manage Bookings')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-calendar-alt text-primary me-2"></i>Manage Bookings
                </h2>
                <p class="page-subtitle">View and manage all rental bookings</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-list-alt me-2"></i>
                        <span>Booking Information</span>
                    </div>
                    <div class="booking-filters">
                        <a href="{{ route('admin.bookings.confirmed') }}" class="btn btn-success btn-sm me-2">
                            <i class="fas fa-check-circle me-1"></i> Confirmed
                        </a>
                        <a href="{{ route('admin.bookings.cancelled') }}" class="btn btn-danger btn-sm">
                            <i class="fas fa-times-circle me-1"></i> Cancelled
                        </a>
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

                    <div class="table-responsive">
                        <table id="bookingsTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Vehicle</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Message</th>
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
                                            @if ($booking->message)
                                                <span class="message-preview" data-bs-toggle="tooltip"
                                                    title="{{ $booking->message }}">
                                                    {{ Str::limit($booking->message, 30) }}
                                                </span>
                                            @else
                                                <span class="text-muted">No message</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($booking->Status == 0)
                                                <span class="status-badge status-pending">
                                                    <i class="fas fa-clock me-1"></i>Pending
                                                </span>
                                            @elseif($booking->Status == 1)
                                                <span class="status-badge status-confirmed">
                                                    <i class="fas fa-check-circle me-1"></i>Confirmed
                                                </span>
                                            @else
                                                <span class="status-badge status-cancelled">
                                                    <i class="fas fa-times-circle me-1"></i>Cancelled
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($booking->Status == 0)
                                                <span class="status-badge status-pending" dir="rtl">
                                                    <i
                                                        class="fas fa-clock me-1"></i>{{ $booking->Status_ar ?? 'قيد الانتظار' }}
                                                </span>
                                            @elseif($booking->Status == 1)
                                                <span class="status-badge status-confirmed" dir="rtl">
                                                    <i
                                                        class="fas fa-check-circle me-1"></i>{{ $booking->Status_ar ?? 'مؤكد' }}
                                                </span>
                                            @else
                                                <span class="status-badge status-cancelled" dir="rtl">
                                                    <i
                                                        class="fas fa-times-circle me-1"></i>{{ $booking->Status_ar ?? 'ملغى' }}
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $booking->PostingDate }}</span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                                    class="btn btn-action btn-info me-2" data-bs-toggle="tooltip"
                                                    title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @if ($booking->Status == 0)
                                                    <form method="POST"
                                                        action="{{ route('admin.bookings.confirm', $booking->id) }}"
                                                        class="d-inline me-2">
                                                        @csrf
                                                        <button type="submit" class="btn btn-action btn-success"
                                                            onclick="return confirm('Are you sure you want to confirm this booking?')"
                                                            data-bs-toggle="tooltip" title="Confirm Booking">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </form>
                                                    <form method="POST"
                                                        action="{{ route('admin.bookings.cancel', $booking->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-action btn-danger"
                                                            onclick="return confirm('Are you sure you want to cancel this booking?')"
                                                            data-bs-toggle="tooltip" title="Cancel Booking">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </form>
                                                @endif
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
            $('#bookingsTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search bookings...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ bookings",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                }
            });

            // Initialize tooltips
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

        .status-pending {
            background-color: #ffc107;
        }

        .status-confirmed {
            background-color: #28a745;
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

        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #218838, #1e9e8a);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545, #e83e8c);
            color: white;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #c82333, #d91a7a);
            transform: translateY(-2px);
        }

        .message-preview {
            cursor: pointer;
            color: #6c757d;
            font-style: italic;
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

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
@endpush
