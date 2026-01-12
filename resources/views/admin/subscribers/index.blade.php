@extends('admin.layouts.app')

@section('title', 'Manage Subscribers')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-bell text-primary me-2"></i>Manage Subscribers
                </h2>
                <p class="page-subtitle">View and manage newsletter subscribers</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-users me-2"></i>
                        <span>Subscriber Details</span>
                    </div>
                    <div class="subscriber-stats">
                        <span class="badge bg-success">{{ $subscribers->count() }} Subscribers</span>
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
                        <table id="subscribersTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Email Address</th>
                                    <th>Subscription Date</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscriber)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="subscriber-icon me-3">
                                                    <i class="fas fa-envelope text-info"></i>
                                                </div>
                                                <div>
                                                    <div class="subscriber-email fw-bold">{{ $subscriber->SubscriberEmail }}
                                                    </div>
                                                    <small class="text-muted">Active Subscriber</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="date-badge">
                                                <i class="fas fa-calendar me-1"></i>{{ $subscriber->PostingDate }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                <a href="{{ route('admin.subscribers.destroy', $subscriber->id) }}"
                                                    class="btn btn-action btn-danger"
                                                    onclick="return confirm('Are you sure you want to remove this subscriber?')"
                                                    data-bs-toggle="tooltip" title="Remove Subscriber">
                                                    <i class="fas fa-user-times"></i>
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
            $('#subscribersTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search subscribers...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ subscribers",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                "order": [
                    [2, 'desc']
                ]
            });

            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush
