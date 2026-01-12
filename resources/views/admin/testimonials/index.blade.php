@extends('admin.layouts.app')

@section('title', 'Manage Testimonials')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-comments text-primary me-2"></i>Manage Testimonials
                </h2>
                <p class="page-subtitle">Review and manage customer testimonials</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-star me-2"></i>
                        <span>Customer Testimonials</span>
                    </div>
                    <div class="testimonial-stats">
                        @php
                            $activeCount = $testimonials->where('status', 1)->count();
                            $inactiveCount = $testimonials->where('status', 0)->count();
                        @endphp
                        <span class="badge bg-success me-2">
                            <i class="fas fa-check-circle me-1"></i>{{ $activeCount }} Active
                        </span>
                        <span class="badge bg-warning">
                            <i class="fas fa-clock me-1"></i>{{ $inactiveCount }} Pending
                        </span>
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
                        <table id="testimonialsTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Customer (EN)</th>
                                    <th>Customer (AR)</th>
                                    <th>Email</th>
                                    <th>Testimonial (EN)</th>
                                    <th>Testimonial (AR)</th>
                                    <th>Posting Date</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="customer-avatar me-3">
                                                    <i class="fas fa-user-circle text-primary"></i>
                                                </div>
                                                <div class="customer-info">
                                                    <div class="customer-name fw-bold">{{ $testimonial->FullName }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="customer-avatar me-3"
                                                    style="background: linear-gradient(135deg, #28a745, #20c997);">
                                                    <i class="fas fa-user-circle text-white"></i>
                                                </div>
                                                <div class="customer-info">
                                                    <div class="customer-name fw-bold" dir="rtl">
                                                        {{ $testimonial->FullName_ar ?? 'N/A' }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="email-badge">{{ $testimonial->UserEmail }}</span>
                                        </td>
                                        <td>
                                            <div class="testimonial-content">
                                                <div class="testimonial-text" data-bs-toggle="tooltip"
                                                    title="{{ $testimonial->Testimonial }}">
                                                    {{ Str::limit($testimonial->Testimonial, 50) }}
                                                </div>
                                                @if (strlen($testimonial->Testimonial) > 50)
                                                    <small class="text-muted cursor-pointer" data-bs-toggle="modal"
                                                        data-bs-target="#testimonialModal{{ $testimonial->id }}">
                                                        <i class="fas fa-expand-alt me-1"></i>View full
                                                    </small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="testimonial-content">
                                                <div class="testimonial-text" data-bs-toggle="tooltip" dir="rtl"
                                                    title="{{ $testimonial->Testimonial_ar ?? 'N/A' }}">
                                                    {{ Str::limit($testimonial->Testimonial_ar ?? 'N/A', 50) }}
                                                </div>
                                                @if ($testimonial->Testimonial_ar && strlen($testimonial->Testimonial_ar) > 50)
                                                    <small class="text-muted cursor-pointer" data-bs-toggle="modal"
                                                        data-bs-target="#testimonialModal{{ $testimonial->id }}"
                                                        dir="rtl">
                                                        <i class="fas fa-expand-alt me-1"></i>عرض الكل
                                                    </small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="date-badge">
                                                <i class="fas fa-calendar me-1"></i>{{ $testimonial->PostingDate }}
                                            </span>
                                        </td>
                                        <td>
                                            @if ($testimonial->status == 0 || $testimonial->status === null)
                                                <span class="status-badge status-pending">
                                                    <i class="fas fa-clock me-1"></i>Pending
                                                </span>
                                            @else
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-check-circle me-1"></i>Active
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                @if ($testimonial->status == 0 || $testimonial->status === null)
                                                    <a href="{{ route('admin.testimonials.activate', $testimonial->id) }}"
                                                        class="btn btn-action btn-success me-2"
                                                        onclick="return confirm('Are you sure you want to activate this testimonial?')"
                                                        data-bs-toggle="tooltip" title="Activate Testimonial">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.testimonials.deactivate', $testimonial->id) }}"
                                                        class="btn btn-action btn-warning me-2"
                                                        onclick="return confirm('Are you sure you want to deactivate this testimonial?')"
                                                        data-bs-toggle="tooltip" title="Deactivate Testimonial">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                @endif
                                                <button class="btn btn-action btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#testimonialModal{{ $testimonial->id }}"
                                                    data-bs-toggle="tooltip" title="View Full Testimonial">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Testimonial Modal -->
                                    <div class="modal fade" id="testimonialModal{{ $testimonial->id }}" tabindex="-1"
                                        aria-labelledby="testimonialModalLabel{{ $testimonial->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header gradient-header">
                                                    <h5 class="modal-title"
                                                        id="testimonialModalLabel{{ $testimonial->id }}">
                                                        <i class="fas fa-comment me-2"></i>Testimonial Details
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="testimonial-modal-content">
                                                        <div class="customer-details mb-4">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="detail-item">
                                                                        <strong><i
                                                                                class="fas fa-user me-2 text-primary"></i>Name
                                                                            (EN)
                                                                            :</strong>
                                                                        <span>{{ $testimonial->FullName }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="detail-item">
                                                                        <strong><i
                                                                                class="fas fa-user me-2 text-success"></i>Name
                                                                            (AR):</strong>
                                                                        <span
                                                                            dir="rtl">{{ $testimonial->FullName_ar ?? 'N/A' }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="detail-item">
                                                                        <strong><i
                                                                                class="fas fa-envelope me-2 text-primary"></i>Email:</strong>
                                                                        <span>{{ $testimonial->UserEmail }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="detail-item">
                                                                        <strong><i
                                                                                class="fas fa-calendar me-2 text-primary"></i>Posted:</strong>
                                                                        <span>{{ $testimonial->PostingDate }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="detail-item">
                                                                        <strong><i
                                                                                class="fas fa-star me-2 text-primary"></i>Status:</strong>
                                                                        @if ($testimonial->status == 0 || $testimonial->status === null)
                                                                            <span class="badge bg-warning">Pending</span>
                                                                        @else
                                                                            <span class="badge bg-success">Active</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="testimonial-text-container mb-4">
                                                            <h6 class="section-title mb-3">
                                                                <i class="fas fa-language me-2"></i>English Testimonial
                                                            </h6>
                                                            <div class="testimonial-full-text p-4 bg-light rounded">
                                                                <p class="mb-0">{{ $testimonial->Testimonial }}</p>
                                                            </div>
                                                        </div>

                                                        @if ($testimonial->Testimonial_ar)
                                                            <div class="testimonial-text-container">
                                                                <h6 class="section-title mb-3">
                                                                    <i class="fas fa-language me-2"></i>Arabic Testimonial
                                                                </h6>
                                                                <div class="testimonial-full-text p-4 bg-light rounded"
                                                                    dir="rtl">
                                                                    <p class="mb-0">{{ $testimonial->Testimonial_ar }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="fas fa-times me-1"></i>Close
                                                    </button>
                                                    @if ($testimonial->status == 0 || $testimonial->status === null)
                                                        <a href="{{ route('admin.testimonials.activate', $testimonial->id) }}"
                                                            class="btn btn-success"
                                                            onclick="return confirm('Are you sure you want to activate this testimonial?')">
                                                            <i class="fas fa-check me-1"></i>Activate
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.testimonials.deactivate', $testimonial->id) }}"
                                                            class="btn btn-warning"
                                                            onclick="return confirm('Are you sure you want to deactivate this testimonial?')">
                                                            <i class="fas fa-times me-1"></i>Deactivate
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        .customer-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .customer-info {
            line-height: 1.4;
        }

        .customer-name {
            color: var(--dark);
            margin-bottom: 2px;
        }

        .email-badge {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .testimonial-content {
            max-width: 250px;
        }

        .testimonial-text {
            line-height: 1.4;
            margin-bottom: 5px;
            cursor: help;
        }

        .testimonial-modal-content {
            line-height: 1.6;
        }

        .detail-item {
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-item strong {
            color: var(--dark);
            min-width: 120px;
            display: inline-block;
        }

        .detail-item span {
            color: #6c757d;
        }

        .section-title {
            color: var(--primary);
            font-weight: 600;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 8px;
        }

        .testimonial-full-text {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid var(--primary);
            font-style: italic;
        }

        .testimonial-full-text[dir="rtl"] {
            border-left: none;
            border-right: 4px solid #28a745;
        }

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
            background: linear-gradient(135deg, #ffc107, #fd7e14);
        }

        .status-active {
            background: linear-gradient(135deg, #28a745, #20c997);
        }

        .date-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.35em 0.65em;
            font-size: 0.75em;
            font-weight: 600;
            border-radius: 0.25rem;
            display: inline-flex;
            align-items: center;
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

        .btn-success {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #218838, #1e9e8a);
            transform: translateY(-2px);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107, #fd7e14);
            color: white;
        }

        .btn-warning:hover {
            background: linear-gradient(135deg, #e0a800, #e36407);
            transform: translateY(-2px);
        }

        .btn-info {
            background: linear-gradient(135deg, #17a2b8, #6f42c1);
            color: white;
        }

        .btn-info:hover {
            background: linear-gradient(135deg, #138496, #5a2d91);
            transform: translateY(-2px);
        }

        .cursor-pointer {
            cursor: pointer;
        }

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Animation for modal */
        .modal.fade .modal-dialog {
            transform: translate(0, -50px);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: translate(0, 0);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .testimonial-content {
                max-width: 150px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 5px;
            }

            .btn-action {
                width: 32px;
                height: 32px;
            }

            .customer-avatar {
                width: 35px;
                height: 35px;
                font-size: 1.3rem;
            }

            .detail-item strong {
                min-width: 100px;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 576px) {
            .testimonial-content {
                max-width: 120px;
            }

            .customer-avatar {
                width: 30px;
                height: 30px;
                font-size: 1.1rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable
            $('#testimonialsTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search testimonials...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ testimonials",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                "order": [
                    [6, 'desc']
                ],
                "drawCallback": function(settings) {
                    // Reinitialize tooltips after table redraw
                    $('[data-bs-toggle="tooltip"]').tooltip();
                }
            });

            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();

            // Add hover effects to table rows
            $('.modern-table tbody tr').hover(
                function() {
                    $(this).addClass('table-row-hover');
                },
                function() {
                    $(this).removeClass('table-row-hover');
                }
            );

            // Enhanced modal functionality
            $('.modal').on('shown.bs.modal', function() {
                // Add animation to modal content
                const modalContent = $(this).find('.modal-content');
                modalContent.addClass('animate__animated animate__fadeInUp');

                // Remove animation class after animation completes
                setTimeout(() => {
                    modalContent.removeClass('animate__animated animate__fadeInUp');
                }, 500);
            });

            // Auto-adjust text areas in modal if any
            $('.testimonial-full-text').each(function() {
                const text = $(this).text();
                if (text.length > 500) {
                    $(this).css('max-height', '200px');
                    $(this).css('overflow-y', 'auto');
                }
            });
        });
    </script>
@endpush
