@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title animated fadeInDown">Dashboard Overview</h2>

            <!-- Stats Cards Row 1 -->
            <div class="row stats-row">
                <div class="col-md-3">
                    <div class="stat-card card-primary animated fadeInLeft delay-1">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['regusers'] }}</div>
                                <div class="stat-panel-title text-uppercase">Registered Users</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.reg-users') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-success animated fadeInLeft delay-2">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-car"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['totalvehicle'] }}</div>
                                <div class="stat-panel-title text-uppercase">Listed Vehicles</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.vehicles') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-info animated fadeInLeft delay-3">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-calendar-check"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['bookings'] }}</div>
                                <div class="stat-panel-title text-uppercase">Total Bookings</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.bookings') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-warning animated fadeInLeft delay-4">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-tags"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['brands'] }}</div>
                                <div class="stat-panel-title text-uppercase">Listed Brands</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.brands') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Cards Row 2 -->
            <div class="row stats-row">
                <div class="col-md-3">
                    <div class="stat-card card-purple animated fadeInRight delay-1">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-bell"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['subscribers'] }}</div>
                                <div class="stat-panel-title text-uppercase">Subscribers</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.subscribers') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-danger animated fadeInRight delay-2">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-question-circle"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['query'] }}</div>
                                <div class="stat-panel-title text-uppercase">Queries</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.contact.queries') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-teal animated fadeInRight delay-3">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['testimonials'] }}</div>
                                <div class="stat-panel-title text-uppercase">Testimonials</div>
                            </div>
                        </div>
                        <a href="{{ route('admin.testimonials') }}" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="stat-card card-indigo animated fadeInRight delay-4">
                        <div class="stat-card-body">
                            <div class="stat-panel text-center">
                                <div class="stat-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="stat-panel-number h1">{{ $stats['revenue'] ?? '0' }}</div>
                                <div class="stat-panel-title text-uppercase">Revenue (K)</div>
                            </div>
                        </div>
                        <a href="#" class="stat-card-footer">
                            Full Details <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
