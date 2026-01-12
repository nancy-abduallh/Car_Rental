@extends('admin.layouts.app')

@section('title', 'Registered Users')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-users text-primary ml-5"></i>Registered Users
                </h2>
                <p class="page-subtitle">View all registered user accounts</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-user-friends me-2"></i>
                        <span>User Accounts</span>
                    </div>
                    <div class="user-stats">
                        <span class="badge bg-success">{{ $users->count() }} Users</span>
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
                        <table id="usersTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>User (EN)</th>
                                    <th>User (AR)</th>
                                    <th>Contact Info</th>
                                    <th>Location (EN)</th>
                                    <th>Location (AR)</th>
                                    <th>Registration Date</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="user-info">
                                                <div class="user-avatar-sm ">
                                                    <i class="fas fa-user-circle text-primary"></i>
                                                </div>
                                                <div>
                                                    <div class="user-name fw-bold">{{ $user->FullName }}</div>
                                                    <div class="user-email text-muted">{{ $user->EmailId }}</div>
                                                    @if ($user->dob)
                                                        <small class="text-muted">DOB: {{ $user->dob }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="user-info">
                                                <div class="user-avatar-sm "
                                                    style="background: linear-gradient(135deg, #28a745, #20c997);">
                                                    <i class="fas fa-user-circle text-white"></i>
                                                </div>
                                                <div>
                                                    <div class="user-name fw-bold" dir="rtl">
                                                        {{ $user->FullName_ar ?? 'N/A' }}</div>
                                                    <div class="user-email text-muted">{{ $user->EmailId }}</div>
                                                    @if ($user->dob)
                                                        <small class="text-muted" dir="rtl">تاريخ الميلاد:
                                                            {{ $user->dob }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="contact-info">
                                                <div class="contact-item">
                                                    <i class="fas fa-phone text-success me-1"></i>
                                                    <span>{{ $user->ContactNo ?? 'N/A' }}</span>
                                                </div>
                                                <div class="contact-item mt-1">
                                                    <i class="fas fa-envelope text-primary me-1"></i>
                                                    <span class="email-text">{{ $user->EmailId }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="location-info">
                                                @if ($user->Address)
                                                    <div class="location-item">
                                                        <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                        <span>{{ Str::limit($user->Address, 25) }}</span>
                                                    </div>
                                                @endif
                                                <div class="location-details mt-1">
                                                    @if ($user->City)
                                                        <span class="city-badge">{{ $user->City }}</span>
                                                    @endif
                                                    @if ($user->Country)
                                                        <span class="country-badge">{{ $user->Country }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="location-info" dir="rtl">
                                                @if ($user->Address_ar)
                                                    <div class="location-item">
                                                        <i class="fas fa-map-marker-alt text-success me-1"></i>
                                                        <span>{{ Str::limit($user->Address_ar, 25) }}</span>
                                                    </div>
                                                @else
                                                    <div class="text-muted">N/A</div>
                                                @endif
                                                <div class="location-details mt-1">
                                                    @if ($user->City_ar)
                                                        <span class="city-badge"
                                                            style="background: linear-gradient(135deg, #28a745, #20c997);">{{ $user->City_ar }}</span>
                                                    @endif
                                                    @if ($user->Country_ar)
                                                        <span class="country-badge"
                                                            style="background: linear-gradient(135deg, #28a745, #20c997);">{{ $user->Country_ar }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="date-badge">
                                                <i class="fas fa-calendar me-1"></i>{{ $user->RegDate }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <span class="status-badge status-active">
                                                    <i class="fas fa-user-check me-1"></i>Active
                                                </span>
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
        .user-info {
            display: flex;
            align-items: center;
        }

        .user-avatar-sm {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .user-name {
            color: var(--primary) !important;
            margin-bottom: 2px;
            line-height: 1.2;
        }

        .user-email {
            font-size: 0.85rem;
            line-height: 1.2;
        }

        .contact-info {
            line-height: 1.4;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
            margin-right: 10px !important;
        }

        .email-text {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .location-info {
            line-height: 1.4;
        }

        .location-item {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
        }

        .location-details {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .city-badge,
        .country-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .date-badge {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .status-active {
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
        }

        /* RTL support for Arabic text */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Table responsive adjustments */
        .modern-table td {
            vertical-align: middle;
            padding: 12px 8px;
        }

        /* Hover effects */
        .modern-table tbody tr:hover {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            transform: translateY(-1px);
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive design */
        @media (max-width: 1400px) {
            .user-avatar-sm {
                width: 35px;
                height: 35px;
                font-size: 1.3rem;
            }

            .user-name {
                font-size: 0.9rem;
            }

            .user-email {
                font-size: 0.8rem;
            }
        }

        @media (max-width: 1200px) {
            .modern-table {
                font-size: 0.9rem;
            }

            .user-avatar-sm {
                width: 32px;
                height: 32px;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 992px) {
            .table-responsive {
                border: 1px solid #dee2e6;
            }

            .modern-table {
                min-width: 1000px;
            }

            .user-info {
                min-width: 180px;
            }

            .location-info {
                min-width: 150px;
            }
        }

        @media (max-width: 768px) {
            .user-stats {
                display: none;
            }

            .page-subtitle {
                font-size: 0.9rem;
            }
        }

        /* Animation enhancements */
        .animated.fadeInLeft {
            animation-duration: 0.5s;
        }

        /* Badge enhancements */
        .badge.bg-success {
            background: linear-gradient(135deg, #28a745, #20c997) !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable with enhanced options
            $('#usersTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search users...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ users",
                    "infoEmpty": "No users available",
                    "infoFiltered": "(filtered from _MAX_ total users)",
                    "zeroRecords": "No matching users found",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                "order": [
                    [6, 'desc'] // Sort by Registration Date (column index 6) descending
                ],
                "responsive": true,
                "autoWidth": false,
                "drawCallback": function(settings) {
                    // Add animation to newly drawn rows
                    $('.modern-table tbody tr').addClass('animated fadeInLeft');
                },
                "initComplete": function(settings, json) {
                    // Add custom filter for Arabic/English content
                    const table = this;
                    const api = new $.fn.dataTable.Api(settings);

                    // Add custom CSS for DataTable elements
                    $('.dataTables_length select').addClass('form-select form-select-sm');
                    $('.dataTables_filter input').addClass('form-control form-control-sm');
                }
            });

            // Add enhanced hover effects
            $('.modern-table tbody tr').hover(
                function() {
                    $(this).css('transform', 'translateY(-2px)');
                    $(this).css('box-shadow', '0 4px 12px rgba(0,0,0,0.15)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                    $(this).css('box-shadow', 'none');
                }
            );

            // Add click to expand user details (optional feature)
            $('.user-info').on('click', function() {
                const userRow = $(this).closest('tr');
                const userEmail = $(this).find('.user-email').text();

                // You can implement a modal or expandable row here
                console.log('User email:', userEmail);
                // Example: window.location.href = '/admin/users/' + encodeURIComponent(userEmail);
            });

            // Tooltip for truncated text
            $('[data-bs-toggle="tooltip"]').tooltip();

            // Auto-refresh data every 30 seconds (optional)
            setInterval(function() {
                const table = $('#usersTable').DataTable();
                table.ajax.reload(null, false); // false means don't reset user paging
            }, 30000);
        });
    </script>
@endpush
