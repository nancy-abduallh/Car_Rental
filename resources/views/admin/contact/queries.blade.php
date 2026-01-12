@extends('admin.layouts.app')

@section('title', 'Manage Contact Us Queries')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-question-circle text-primary me-2"></i>Manage Contact Queries
                </h2>
                <p class="page-subtitle">Review and manage customer inquiries</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-inbox me-2"></i>
                        <span>Customer Inquiries</span>
                    </div>
                    <div class="query-stats">
                        @php
                            $unreadCount = $queries->where('status', 0)->count();
                            $readCount = $queries->where('status', 1)->count();
                        @endphp
                        <span class="badge bg-warning me-2">{{ $unreadCount }} Unread</span>
                        <span class="badge bg-success">{{ $readCount }} Read</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="queriesTable" class="table table-hover table-striped modern-table" cellspacing="0"
                            width="100%">
                            <thead class="table-gradient">
                                <tr>
                                    <th>#</th>
                                    <th>Contact Information</th>
                                    <th>Message Preview</th>
                                    <th>Posting Date</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($queries as $query)
                                    <tr class="animated fadeInLeft" style="animation-delay: {{ $loop->index * 0.05 }}s">
                                        <td class="fw-bold text-primary">{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="contact-info">
                                                <div class="contact-name fw-bold">{{ $query->name }}</div>
                                                <div class="contact-details">
                                                    <div class="contact-email">
                                                        <i class="fas fa-envelope text-primary me-1"></i>
                                                        {{ $query->EmailId }}
                                                    </div>
                                                    @if ($query->ContactNumber)
                                                        <div class="contact-phone">
                                                            <i class="fas fa-phone text-success me-1"></i>
                                                            {{ $query->ContactNumber }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="message-preview">
                                                {{ Str::limit($query->Message, 60) }}
                                                @if (strlen($query->Message) > 60)
                                                    <span class="text-muted" data-bs-toggle="tooltip"
                                                        title="{{ $query->Message }}">
                                                        <i class="fas fa-eye ms-1"></i>
                                                    </span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <span class="date-badge">{{ $query->PostingDate }}</span>
                                        </td>
                                        <td>
                                            @if ($query->status == 1)
                                                <span class="status-badge status-confirmed">
                                                    <i class="fas fa-check-circle me-1"></i>Read
                                                </span>
                                            @else
                                                <span class="status-badge status-pending">
                                                    <i class="fas fa-clock me-1"></i>Unread
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-buttons d-flex justify-content-center">
                                                @if ($query->status == 0)
                                                    <a href="{{ route('admin.contact.queries.mark.read', $query->id) }}"
                                                        class="btn btn-action btn-success me-2"
                                                        onclick="return confirm('Mark this query as read?')"
                                                        data-bs-toggle="tooltip" title="Mark as Read">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                @endif
                                                <span class="btn btn-action btn-info" data-bs-toggle="tooltip"
                                                    title="View Full Message"
                                                    onclick="showMessage('{{ $query->name }}', '{{ $query->Message }}')">
                                                    <i class="fas fa-eye"></i>
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

    <!-- Message Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header gradient-header">
                    <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="messageContent"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#queriesTable').DataTable({
                "language": {
                    "search": "<i class='fas fa-search'></i>",
                    "searchPlaceholder": "Search queries...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ queries",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                "order": [
                    [3, 'desc']
                ]
            });

            $('[data-bs-toggle="tooltip"]').tooltip();
        });

        function showMessage(name, message) {
            const modal = new bootstrap.Modal(document.getElementById('messageModal'));
            document.getElementById('messageModalLabel').textContent = `Message from ${name}`;
            document.getElementById('messageContent').innerHTML = `
            <div class="message-container">
                <div class="message-header mb-3">
                    <h6 class="text-muted">Full Message Content:</h6>
                </div>
                <div class="message-body p-3 bg-light rounded">
                    <p class="mb-0">${message}</p>
                </div>
            </div>
        `;
            modal.show();
        }
    </script>
@endpush
