@extends('layouts.app')
@section('title', 'Search Results')

@section('content')

    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Search Results</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Search Results</li>
                </ul>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header -->

    <!--Listing-->
    <section class="listing-page">
        <div class="container">
            <div class="row">

                <!-- ===================== -->
                <!--      SIDEBAR LEFT      -->
                <!-- ===================== -->
                <aside class="col-md-3">
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Car</h5>
                        </div>

                        <div class="sidebar_filter">
                            <form action="{{ route('vehicle.search') }}" method="get">

                                <div class="form-group select">
                                    <select class="form-control" name="brand">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->BrandName }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group select">
                                    <select class="form-control" name="fueltype">
                                        <option value="">Select Fuel Type</option>
                                        <option value="Petrol" {{ request('fueltype') == 'Petrol' ? 'selected' : '' }}>
                                            Petrol</option>
                                        <option value="Diesel" {{ request('fueltype') == 'Diesel' ? 'selected' : '' }}>
                                            Diesel</option>
                                        <option value="CNG" {{ request('fueltype') == 'CNG' ? 'selected' : '' }}>CNG
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-block">
                                        <i class="fa fa-search" aria-hidden="true"></i> Search Car
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
                        </div>

                        <div class="recent_addedcars">
                            <ul>
                                @foreach ($recentVehicles as $recentCar)
                                    <li class="gray-bg">
                                        <div class="recent_post_img">
                                            <a href="{{ route('vehicle.show', $recentCar->id) }}">
                                                <img src="{{ asset('img/vehicleimages/' . $recentCar->Vimage1) }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="recent_post_title">
                                            <a href="{{ route('vehicle.show', $recentCar->id) }}">
                                                {{ $recentCar->brand ? $recentCar->brand->BrandName : 'Unknown Brand' }},
                                                {{ $recentCar->VehiclesTitle }}
                                            </a>
                                            <p class="widget_price">${{ $recentCar->PricePerDay }} Per Day</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
                <!-- /SIDEBAR LEFT -->

                <!-- ===================== -->
                <!--      LISTINGS         -->
                <!-- ===================== -->
                <div class="col-md-9">

                    <div class="result-sorting-wrapper">
                        <div class="sorting-count">
                            <p><span>{{ count($results) }} Listings</span></p>
                        </div>
                    </div>

                    @forelse($results as $car)
                        <div class="product-listing-m gray-bg">
                            <div class="product-listing-img">
                                <a href="{{ route('vehicle.show', $car->id) }}">
                                    <img src="{{ asset('img/vehicleimages/' . $car->Vimage1) }}"
                                        alt="{{ $car->VehiclesTitle }}" class="img-fluid car-image">
                                </a>
                              
                            </div>

                            <div class="product-listing-content">
                                <h5>
                                    <a href="{{ route('vehicle.show', $car->id) }}">
                                        {{ $car->brand ? $car->brand->BrandName : 'Unknown Brand' }},
                                        {{ $car->VehiclesTitle }}
                                    </a>
                                </h5>

                                <p class="list-price">${{ $car->PricePerDay }} Per Day</p>

                                <ul>
                                    <li><i class="fa fa-user" aria-hidden="true"></i>{{ $car->SeatingCapacity }} seats</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{ $car->ModelYear }} model</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>{{ $car->FuelType }}</li>
                                </ul>

                                <a href="{{ route('vehicle.show', $car->id) }}" class="btn">
                                    View Details
                                    <span class="angle_arrow">
                                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="product-listing-m gray-bg">
                            <div class="product-listing-content">
                                <p>No cars found matching your criteria.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
                <!-- /LISTINGS -->

            </div>
        </div>
    </section>
    <!-- /Listing -->

@endsection
