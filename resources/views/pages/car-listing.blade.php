@extends('layouts.app')

@section('title', __('Car Listings'))

@section('content')
    <!--Page Header-->
    <section class="page-header listing_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>{{ __('Car Listing') }}</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="{{ LaravelLocalization::localizeURL('/') }}">{{ __('Home') }}</a></li>
                    <li>{{ __('Car Listing') }}</li>
                </ul>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Listing-->
    <section class="listing-page py-4">
        <div class="container">
            <div class="row">
                <!--Sidebar (position based on locale)-->
                <aside class="col-md-3 {{ app()->getLocale() == 'ar' ? 'order-md-2' : '' }}">
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-filter" aria-hidden="true"></i> {{ __('Find Your Car') }}</h5>
                        </div>
                        <div class="sidebar_filter">
                            <form action="{{ route('vehicle.search') }}" method="get">
                                <div class="form-group select">
                                    <select class="form-control" name="brand">
                                        <option value="">{{ __('Select Brand') }}</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $brand->BrandName_ar ?? $brand->BrandName }}
                                                @else
                                                    {{ $brand->BrandName }}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group select">
                                    <select class="form-control" name="fueltype">
                                        <option value="">{{ __('Select Fuel Type') }}</option>
                                        <option value="Petrol" {{ request('fueltype') == 'Petrol' ? 'selected' : '' }}>
                                            @if (app()->getLocale() == 'ar')
                                                {{ __('Petrol') }}
                                            @else
                                                Petrol
                                            @endif
                                        </option>
                                        <option value="Diesel" {{ request('fueltype') == 'Diesel' ? 'selected' : '' }}>
                                            @if (app()->getLocale() == 'ar')
                                                {{ __('Diesel') }}
                                            @else
                                                Diesel
                                            @endif
                                        </option>
                                        <option value="CNG" {{ request('fueltype') == 'CNG' ? 'selected' : '' }}>
                                            @if (app()->getLocale() == 'ar')
                                                {{ __('CNG') }}
                                            @else
                                                CNG
                                            @endif
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-block">
                                        <i class="fa fa-search" aria-hidden="true"></i> {{ __('Search Car') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-car" aria-hidden="true"></i> {{ __('Recently Listed Cars') }}</h5>
                        </div>
                        <div class="recent_addedcars">
                            <ul>
                                @foreach ($recentVehicles as $recent)
                                    <li class="gray-bg">
                                        <div class="recent_post_img">
                                            <a
                                                href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $recent->id)) }}">
                                                <img src="{{ asset('img/vehicleimages/' . $recent->Vimage1) }}"
                                                    alt="@if (app()->getLocale() == 'ar') {{ $recent->VehiclesTitle_ar ?? $recent->VehiclesTitle }} @else {{ $recent->VehiclesTitle }} @endif">
                                            </a>
                                        </div>
                                        <div class="recent_post_title">
                                            <a
                                                href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $recent->id)) }}">
                                                @if ($recent->brand)
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $recent->brand->BrandName_ar ?? $recent->brand->BrandName }}
                                                    @else
                                                        {{ $recent->brand->BrandName }}
                                                    @endif
                                                @else
                                                    {{ __('Unknown Brand') }}
                                                @endif
                                                ,
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $recent->VehiclesTitle_ar ?? $recent->VehiclesTitle }}
                                                @else
                                                    {{ $recent->VehiclesTitle }}
                                                @endif
                                            </a>
                                            <p class="widget_price">{{ $recent->PricePerDay }} {{ __('EGP') }}
                                                /{{ __('Day') }}</p>
                                            <span class="price"> </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
                <!--/Sidebar-->

                <!--Main Content (position based on locale)-->
                <div class="col-md-9 {{ app()->getLocale() == 'ar' ? 'order-md-1' : '' }}">
                    <div class="result-sorting-wrapper mb-3">
                        <div class="sorting-count">
                            <p><span>{{ count($vehicles) }} {{ __('Listings') }}</span></p>
                        </div>
                    </div>

                    @foreach ($vehicles as $vehicle)
                        <div class="product-listing-m gray-bg mb-4">
                            <div class="product-listing-img">
                                <a href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $vehicle->id)) }}">
                                    <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage1) }}"
                                        alt="@if (app()->getLocale() == 'ar') {{ $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle }} @else {{ $vehicle->VehiclesTitle }} @endif"
                                        class="img-fluid car-image">
                                </a>
                            </div>
                            <div class="product-listing-content">
                                <h5>
                                    <a href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $vehicle->id)) }}">
                                        @if ($vehicle->brand)
                                            @if (app()->getLocale() == 'ar')
                                                {{ $vehicle->brand->BrandName_ar ?? $vehicle->brand->BrandName }}
                                            @else
                                                {{ $vehicle->brand->BrandName }}
                                            @endif
                                        @else
                                            {{ __('Unknown Brand') }}
                                        @endif
                                        ,
                                        @if (app()->getLocale() == 'ar')
                                            {{ $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle }}
                                        @else
                                            {{ $vehicle->VehiclesTitle }}
                                        @endif
                                    </a>
                                </h5>
                                <p class="list-price">{{ $vehicle->PricePerDay }} {{ __('EGP') }}/{{ __('Day') }}
                                </p>
                                <ul class="car-features mb-2">
                                    <li><i class="fa fa-user" aria-hidden="true"></i>
                                        {{ $vehicle->SeatingCapacity }} {{ __('seats') }}</li>
                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ $vehicle->ModelYear }} {{ __('model') }}</li>
                                    <li><i class="fa fa-car" aria-hidden="true"></i>
                                        @if (app()->getLocale() == 'ar')
                                            {{ $vehicle->FuelType_ar ?? $vehicle->FuelType }}
                                        @else
                                            {{ $vehicle->FuelType }}
                                        @endif
                                    </li>
                                </ul>
                                <a href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $vehicle->id)) }}"
                                    class="btn btn-primary">
                                    {{ __('View Details') }}
                                    <span class="angle_arrow">
                                        <i class="fa fa-angle-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"
                                            aria-hidden="true"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--/Main Content-->
            </div>
        </div>
    </section>
@endsection
