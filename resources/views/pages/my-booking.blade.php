@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')

    <!--Page Header-->
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>My Booking</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>My Booking</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo">
                    <img src="{{ asset('assets/images/dealer-logo.jpg') }}" alt="image">
                </div>

                <div class="dealer_info">
                    <h5>{{ Auth::user()->FullName }}</h5>
                    <p>{{ Auth::user()->Address }}<br>
                        {{ Auth::user()->City }}&nbsp;{{ Auth::user()->Country }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <!-- Include sidebar if you have one -->
                    @include('layouts.sidebar')
                </div>

                <div class="col-md-8 col-sm-8">
                    <div class="profile_wrap">
                        <h5 class="uppercase underline">My Bookings</h5>
                        <div class="my_vehicles_list">
                            <ul class="vehicle_listing">
                                @forelse($bookings as $booking)
                                    <li>
                                        <h4 style="color:red">Booking No #{{ $booking->BookingNumber }}</h4>
                                        <div class="vehicle_img">
                                            <a href="{{ route('vehicle.show', ['id' => $booking->vehicle->id]) }}">
                                                <img src="{{ asset('img/vehicleimages/' . $booking->vehicle->Vimage1) }}"
                                                    alt="image">
                                            </a>
                                        </div>
                                        <div class="vehicle_title">
                                            <h6>
                                                <a href="{{ route('vehicle.show', ['id' => $booking->vehicle->id]) }}">
                                                    {{ $booking->vehicle->brand->BrandName }} ,
                                                    {{ $booking->vehicle->VehiclesTitle }}
                                                </a>
                                            </h6>
                                            <p><b>From </b> {{ $booking->FromDate }} <b>To </b> {{ $booking->ToDate }}</p>
                                            <div style="float: left">
                                                <p><b>Message:</b> {{ $booking->message ?? 'No message' }} </p>
                                            </div>
                                        </div>

                                        @if ($booking->Status == 1)
                                            <div class="vehicle_status">
                                                <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                                                <div class="clearfix"></div>
                                            </div>
                                        @elseif($booking->Status == 2)
                                            <div class="vehicle_status">
                                                <a href="#" class="btn outline btn-xs">Cancelled</a>
                                                <div class="clearfix"></div>
                                            </div>
                                        @else
                                            <div class="vehicle_status">
                                                <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
                                                <div class="clearfix"></div>
                                            </div>
                                        @endif
                                    </li>

                                    <h5 style="color:blue">Invoice</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Car Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Total Days</th>
                                            <th>Rent / Day</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $booking->vehicle->VehiclesTitle }},
                                                {{ $booking->vehicle->brand->BrandName }}</td>
                                            <td>{{ $booking->FromDate }}</td>
                                            <td>{{ $booking->ToDate }}</td>
                                            <td>{{ $totalDays = \Carbon\Carbon::parse($booking->FromDate)->diffInDays(\Carbon\Carbon::parse($booking->ToDate)) }}
                                            </td>
                                            <td>${{ number_format($booking->vehicle->PricePerDay, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="4" style="text-align:center;">Grand Total</th>
                                            <th>${{ number_format($totalDays * $booking->vehicle->PricePerDay, 2) }}</th>
                                        </tr>
                                    </table>
                                    <hr />
                                @empty
                                    <h5 align="center" style="color:red">No booking yet</h5>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/my-vehicles-->

@endsection
