@extends('layouts.app')

@section('title', __('Car Rental Portal'))

@section('content')

    {{-- ===========================
    BANNER
    =========================== --}}
    <section id="banner" class="banner-section">
        <div class="container">
            <div class="div_zindex">
                <div class="row">
                    <div class="col-md-5 col-md-push-7">
                        <div class="banner_content">
                            <h1>&nbsp;</h1>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===========================
    RECENT CARS
    =========================== --}}
    <section class="section-padding gray-bg">
        <div class="container">
            <div class="section-header text-center">
                <h2>{{ __('Find the Best') }} <span>{{ __('CarForYou') }}</span></h2>
                <p>
                    {{ __('Find the perfect car for your next trip—fast, easy, and affordable.') }}
                </p>

            </div>

            <div class="row">
                <div class="recent-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active">
                            <a href="#resentnewcar" role="tab" data-bs-toggle="tab">{{ __('New Cars') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="resentnewcar">
                        <div class="row">
                            @forelse($vehicles as $vehicle)
                                <div class="col-md-4 mb-4 d-flex">
                                    <div class="recent-car-list flex-fill">
                                        <div class="car-info-box">
                                            <a
                                                href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $vehicle->id)) }}">
                                                <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage1) }}"
                                                    class="img-fluid car-image"
                                                    alt="{{ app()->getLocale() == 'ar' ? $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle : $vehicle->VehiclesTitle }}">
                                            </a>
                                            <ul>
                                                <li><i class="fa fa-car"></i>
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $vehicle->FuelType_ar ?? $vehicle->FuelType }}
                                                    @else
                                                        {{ $vehicle->FuelType }}
                                                    @endif
                                                </li>
                                                <li><i class="fa fa-calendar"></i> {{ $vehicle->ModelYear }}
                                                    {{ __('Model') }}</li>
                                                <li><i class="fa fa-user"></i> {{ $vehicle->SeatingCapacity }}
                                                    {{ __('seats') }}</li>
                                            </ul>
                                        </div>
                                        <div class="car-title-m">
                                            <h6>
                                                <a
                                                    href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $vehicle->id)) }}">
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle }}
                                                    @else
                                                        {{ $vehicle->VehiclesTitle }}
                                                    @endif
                                                </a>
                                            </h6>
                                            <span class="price"> {{ $vehicle->PricePerDay }} {{ __('EGP') }}
                                                /{{ __('Day') }}</span>
                                        </div>
                                        <div class="inventory_info_m">
                                            <p>
                                                @if (app()->getLocale() == 'ar')
                                                    {{ Str::limit($vehicle->VehiclesOverview_ar ?? $vehicle->VehiclesOverview, 70) }}
                                                @else
                                                    {{ Str::limit($vehicle->VehiclesOverview, 70) }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <div class="col-12 text-center">
                                    <p>{{ __('No vehicles found.') }}</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ===========================
    FUN FACTS
    =========================== --}}
    <section class="fun-facts-section">
        <div class="container div_zindex">
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-calendar"></i>40+</h2>
                            <p>{{ __('Years In Business') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car"></i>1200+</h2>
                            <p>{{ __('New Cars For Sale') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-car"></i>1000+</h2>
                            <p>{{ __('Used Cars For Sale') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="fun-facts-m">
                        <div class="cell">
                            <h2><i class="fa fa-user"></i>600+</h2>
                            <p>{{ __('Satisfied Customers') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>

    {{-- ===========================
    TESTIMONIALS
    =========================== --}}
    <section class="section-padding testimonial-section parallex-bg">
        <div class="container div_zindex">
            <div class="section-header white-text text-center">
                <h2>{{ __('Our Satisfied') }} <span>{{ __('Customers') }}</span></h2>
            </div>

            <div id="testimonial-slider" class="owl-carousel">
                @forelse($testimonials as $testimonial)
                    <div class="testimonial-m">
                        <div class="testimonial-content">
                            <div class="testimonial-heading">
                                <h5>{{ $testimonial->user->FullName ?? 'Anonymous' }}</h5>
                                <p>{{ $testimonial->Testimonial }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">{{ __('No testimonials yet.') }}</p>
                @endforelse
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>

    {{-- Back to top --}}
    <div id="back-top" class="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </div>

@endsection

<style>
    .car-image {
        width: 100%;
        max-height: 230px !important;
        object-fit: cover;
        border-radius: 8px;
        display: block;
        margin: 0 auto;
    }

    .car-info-box {
        max-height: 230px !important;

    }

    .recent-car-list {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .recent-car-list:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .col-md-4 {
        display: flex;
        align-items: stretch;
    }

    .inventory_info_m p {
        min-height: 50px;
        overflow: hidden;
    }

    .demo_changer .demo-icon {
        background: #de302f;
        border-style: solid solid solid none;
        border-width: 1px 1px 1px 0px;
        border-color: #ddd;
        cursor: pointer;
        text-align: center !important;
        padding: 8px;
        float: right;
        height: 40px;
        line-height: 40px;
        width: 40px;
    }

    .header_search {
        float: left;
        padding: 0;
        position: relative;
        display: flex;
        align-items: center;
        margin-top: 16px !important;
    }
</style>
