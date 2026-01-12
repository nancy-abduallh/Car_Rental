@extends('admin.layouts.app')

@section('title', 'Booking Details')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-file-invoice text-primary me-2"></i>Booking Details
                </h2>
                <p class="page-subtitle">Complete booking information and management</p>
            </div>

            <div class="card modern-card animated fadeInUp" id="print">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-receipt me-2"></i>
                        <span>Booking #{{ $booking->BookingNumber }}</span>
                    </div>
                    <button onclick="window.print()" class="btn btn-light btn-sm no-print">
                        <i class="fas fa-print me-1"></i> Print
                    </button>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3 class="text-primary mb-2">Booking Confirmation</h3>
                        <p class="text-muted">Booking #{{ $booking->BookingNumber }}</p>
                    </div>

                    <!-- Customer Details -->
                    <div class="section-header mb-4">
                        <h4><i class="fas fa-user me-2"></i>Customer Information</h4>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Booking Number</label>
                                <div class="info-value">#{{ $booking->BookingNumber }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Customer Name</label>
                                <div class="info-value">{{ $booking->user->FullName ?? 'Customer Not Found' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Email Address</label>
                                <div class="info-value">{{ $booking->user->EmailId ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Contact Number</label>
                                <div class="info-value">{{ $booking->user->ContactNo ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Address</label>
                                <div class="info-value">{{ $booking->user->Address ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">City</label>
                                <div class="info-value">{{ $booking->user->City ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-card">
                                <label class="info-label">Country</label>
                                <div class="info-value">{{ $booking->user->Country ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="section-header mb-4">
                        <h4><i class="fas fa-calendar-alt me-2"></i>Booking Details</h4>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Vehicle</label>
                                <div class="info-value">
                                    @if ($booking->vehicle && $booking->vehicle->brand)
                                        <a href="{{ route('admin.vehicles.edit', $booking->vid) }}" class="vehicle-link">
                                            <i class="fas fa-car me-1"></i>
                                            {{ $booking->vehicle->brand->BrandName }}
                                            {{ $booking->vehicle->VehiclesTitle }}
                                        </a>
                                        @if ($booking->vehicle->VehiclesTitle_ar)
                                            <div class="mt-1" dir="rtl">
                                                <small class="text-muted">
                                                    {{ $booking->vehicle->VehiclesTitle_ar }}
                                                </small>
                                            </div>
                                        @endif
                                    @else
                                        <span class="text-muted">Vehicle information not available</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Booking Date</label>
                                <div class="info-value">{{ $booking->PostingDate }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">From Date</label>
                                <div class="info-value date-highlight">{{ $booking->FromDate }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">To Date</label>
                                <div class="info-value date-highlight">{{ $booking->ToDate }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Total Days</label>
                                <div class="info-value">{{ $booking->totalnodays }} days</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Daily Rate</label>
                                <div class="info-value">
                                    EGP{{ $booking->vehicle->PricePerDay ?? '0.00' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Summary -->
                    <div class="section-header mb-4">
                        <h4><i class="fas fa-calculator me-2"></i>Pricing Summary</h4>
                    </div>

                    <div class="pricing-summary">
                        <div class="pricing-row">
                            <span>Daily Rate × {{ $booking->totalnodays }} days</span>
                            <span>EGP{{ $booking->grandTotal }}</span>
                        </div>
                        <div class="pricing-total">
                            <span>Grand Total</span>
                            <span class="total-amount">EGP{{ $booking->grandTotal }}</span>
                        </div>
                    </div>

                    <!-- Status Information -->
                    <div class="section-header mb-4">
                        <h4><i class="fas fa-info-circle me-2"></i>Status Information</h4>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Booking Status (English)</label>
                                <div class="info-value">
                                    @if ($booking->Status == 0)
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-clock me-1"></i>Pending Confirmation
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Booking Status (Arabic)</label>
                                <div class="info-value">
                                    @if ($booking->Status == 0)
                                        <span class="status-badge status-pending" dir="rtl">
                                            <i class="fas fa-clock me-1"></i>{{ $booking->Status_ar ?? 'قيد الانتظار' }}
                                        </span>
                                    @elseif($booking->Status == 1)
                                        <span class="status-badge status-confirmed" dir="rtl">
                                            <i class="fas fa-check-circle me-1"></i>{{ $booking->Status_ar ?? 'مؤكد' }}
                                        </span>
                                    @else
                                        <span class="status-badge status-cancelled" dir="rtl">
                                            <i class="fas fa-times-circle me-1"></i>{{ $booking->Status_ar ?? 'ملغى' }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card">
                                <label class="info-label">Last Updated</label>
                                <div class="info-value">{{ $booking->LastUpdationDate ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    @if ($booking->message)
                        <div class="section-header mb-4">
                            <h4><i class="fas fa-comment me-2"></i>Customer Message</h4>
                        </div>
                        <div class="info-card">
                            <label class="info-label">Message from Customer</label>
                            <div class="info-value message-content">
                                {{ $booking->message }}
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    @if ($booking->Status == 0)
                        <div class="action-section text-center mt-4 no-print">
                            <form method="POST" action="{{ route('admin.bookings.confirm', $booking->id) }}"
                                class="d-inline me-3">
                                @csrf
                                <button type="submit" class="btn btn-success"
                                    onclick="return confirm('Are you sure you want to confirm this booking?')">
                                    <i class="fas fa-check-circle me-1"></i> Confirm Booking
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.bookings.cancel', $booking->id) }}"
                                class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to cancel this booking?')">
                                    <i class="fas fa-times-circle me-1"></i> Cancel Booking
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .info-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid var(--primary);
        }

        .info-label {
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
            margin-bottom: 5px;
            display: block;
        }

        .info-value {
            font-size: 1.1rem;
            color: #495057;
        }

        .vehicle-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .vehicle-link:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        .date-highlight {
            color: var(--primary);
            font-weight: 600;
        }

        .pricing-summary {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            margin: 0 auto;
        }

        .pricing-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .pricing-total {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-top: 2px solid var(--primary);
            font-weight: 600;
            font-size: 1.2rem;
        }

        .total-amount {
            color: var(--primary);
        }

        .action-section {
            padding: 20px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 8px;
        }

        .status-badge {
            padding: 0.5em 1em;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 0.25rem;
            color: white;
            display: inline-flex;
            align-items: center;
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

        .message-content {
            background: white;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
            font-style: italic;
        }

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Ensure form buttons look consistent */
        .action-section form {
            display: inline-block;
        }

        @media print {
            .no-print {
                display: none !important;
            }

            .action-section {
                display: none !important;
            }
        }
    </style>
@endpush
