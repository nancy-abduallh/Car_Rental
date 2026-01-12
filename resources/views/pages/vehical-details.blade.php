@extends('layouts.app')
@section('title', app()->getLocale() == 'ar' ? $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle :
    $vehicle->VehiclesTitle)

@section('content')
    <!-- Image Lightbox Modal -->
    <div class="image-modal" id="imageModal">
        <span class="modal-close" onclick="closeImageModal()">&times;</span>
        <div class="modal-content-wrapper">
            <button class="modal-nav modal-prev" onclick="navigateImage(-1)">&#10094;</button>
            <img class="modal-image" id="modalImage" src="" alt="">
            <button class="modal-nav modal-next" onclick="navigateImage(1)">&#10095;</button>
            @if (app()->getLocale() == 'ar')
                <button class="modal-nav modal-prev" onclick="navigateImage(-1)">&#10095;</button>
                <img class="modal-image" id="modalImage" src="" alt="">
                <button class="modal-nav modal-next" onclick="navigateImage(1)">&#10094;</button>
            @endif
        </div>
        <div class="modal-counter" id="modalCounter"></div>
        <div class="modal-thumbnails" id="modalThumbnails"></div>
    </div>

    <!-- Vehicle Image Slider -->
    <section id="listing_img_slider" class="vehicle-slider">
        @foreach ([$vehicle->Vimage1, $vehicle->Vimage2, $vehicle->Vimage3, $vehicle->Vimage4, $vehicle->Vimage5] as $index => $img)
            @if ($img)
                <div class="slide-box" onclick="openImageModal({{ $index }})">
                    <img src="{{ asset('img/vehicleimages/' . $img) }}"
                        alt="@if (app()->getLocale() == 'ar') {{ $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle }} @else {{ $vehicle->VehiclesTitle }} @endif"
                        data-image-index="{{ $index }}">
                    <div class="image-overlay">
                        <i class="fa fa-search-plus"></i>
                    </div>
                </div>
            @endif
        @endforeach
    </section>

    <!--Listing-detail-->
    <section class="listing-detail">
        <div class="container">
            <div class="listing_detail_head row">
                <div class="col-md-9">
                    <h2>
                        @if ($vehicle->brand)
                            @if (app()->getLocale() == 'ar')
                                {{ $vehicle->brand->BrandName_ar ?? $vehicle->brand->BrandName }}
                            @else
                                {{ $vehicle->brand->BrandName }}
                            @endif
                        @else
                            {{ __('N/A') }}
                        @endif
                        ,
                        @if (app()->getLocale() == 'ar')
                            {{ $vehicle->VehiclesTitle_ar ?? $vehicle->VehiclesTitle }}
                        @else
                            {{ $vehicle->VehiclesTitle }}
                        @endif
                    </h2>
                </div>
                <div class="col-md-3">
                    <div class="price_info">
                        <p> {{ $vehicle->PricePerDay }} {{ __('EGP') }}</p>{{ __('Per Day') }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="main_features">
                        <ul>
                            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                                <h5>{{ $vehicle->ModelYear }}</h5>
                                <p>{{ __('Reg.Year') }}</p>
                            </li>
                            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                                <h5>
                                    @if (app()->getLocale() == 'ar')
                                        {{ $vehicle->FuelType_ar ?? $vehicle->FuelType }}
                                    @else
                                        {{ $vehicle->FuelType }}
                                    @endif
                                </h5>
                                <p>{{ __('Fuel Type') }}</p>
                            </li>
                            <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                                <h5>{{ $vehicle->SeatingCapacity }}</h5>
                                <p>{{ __('Seats') }}</p>
                            </li>
                        </ul>
                    </div>

                    <div class="listing_more_info">
                        <div class="listing_detail_wrap">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs gray-bg" role="tablist">
                                <li role="presentation" class="active"><a href="#vehicle-overview"
                                        aria-controls="vehicle-overview" role="tab"
                                        data-bs-toggle="tab">{{ __('Vehicle Overview') }}</a></li>
                                <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                                        data-bs-toggle="tab">{{ __('Accessories') }}</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- vehicle-overview -->
                                <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                                    <p>
                                        @if (app()->getLocale() == 'ar')
                                            {{ $vehicle->VehiclesOverview_ar ?? $vehicle->VehiclesOverview }}
                                        @else
                                            {{ $vehicle->VehiclesOverview }}
                                        @endif
                                    </p>
                                </div>

                                <!-- Accessories -->
                                <div role="tabpanel" class="tab-pane" id="accessories">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th colspan="2">{{ __('Accessories') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ __('Air Conditioner') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->AirConditioner == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('AntiLock Braking System') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->AntiLockBrakingSystem == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Power Steering') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->PowerSteering == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Power Windows') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->PowerWindows == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('CD Player') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->CDPlayer == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Leather Seats') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->LeatherSeats == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Central Locking') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->CentralLocking == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Power Door Locks') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->PowerDoorLocks == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Brake Assist') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->BrakeAssist == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Driver Airbag') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->DriverAirbag == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Passenger Airbag') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->PassengerAirbag == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('Crash Sensor') }}</td>
                                                <td><i class="fa fa-{{ $vehicle->CrashSensor == 1 ? 'check' : 'close' }}"
                                                        aria-hidden="true"></i></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Side-Bar-->
                <aside class="col-md-3">
                    <div class="share_vehicle">
                        <p>{{ __('Share') }}:
                            <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                        </p>
                    </div>
                    <div class="sidebar_widget">
                        <div class="widget_heading">
                            <h5><i class="fa fa-envelope" aria-hidden="true"></i>{{ __('Book Now') }}</h5>
                        </div>
                        <form method="POST" action="{{ route('booking.store') }}">
                            @csrf
                            <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
                            <div class="form-group">
                                <label>{{ __('From Date') }}:</label>
                                <input type="date" class="form-control" name="from_date"
                                    placeholder="{{ __('From Date') }}" required>
                            </div>
                            <div class="form-group">
                                <label>{{ __('To Date') }}:</label>
                                <input type="date" class="form-control" name="to_date"
                                    placeholder="{{ __('To Date') }}" required>
                            </div>
                            <div class="form-group">
                                <textarea rows="4" class="form-control" name="message" placeholder="{{ __('Message') }}" required></textarea>
                            </div>
                            @auth
                                <div class="form-group">
                                    <button type="submit" class="btn">{{ __('Book Now') }}</button>
                                </div>
                            @else
                                <a href="#" class="btn btn-xs uppercase btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    {{ __('Login to Book') }}
                                </a>
                            @endauth
                        </form>
                    </div>
                </aside>
            </div>

            <div class="space-20"></div>
            <div class="divider"></div>

            <!--Similar-Cars-->
            @if ($similarCars && $similarCars->count() > 0)
                <div class="similar_cars">
                    <h3>{{ __('Similar Cars') }}</h3>
                    <div class="row">
                        @foreach ($similarCars as $similarCar)
                            <div class="col-md-3 grid_listing">
                                <div class="product-listing-m gray-bg">
                                    <div class="product-listing-img">
                                        <a
                                            href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $similarCar->id)) }}">
                                            <img src="{{ asset('img/vehicleimages//' . $similarCar->Vimage1) }}"
                                                class="similar-car-img"
                                                alt="@if (app()->getLocale() == 'ar') {{ $similarCar->VehiclesTitle_ar ?? $similarCar->VehiclesTitle }} @else {{ $similarCar->VehiclesTitle }} @endif">
                                        </a>
                                    </div>
                                    <div class="product-listing-content">
                                        <h5>
                                            <a
                                                href="{{ LaravelLocalization::localizeURL(route('vehicle.show', $similarCar->id)) }}">
                                                @if ($similarCar->brand)
                                                    @if (app()->getLocale() == 'ar')
                                                        {{ $similarCar->brand->BrandName_ar ?? $similarCar->brand->BrandName }}
                                                    @else
                                                        {{ $similarCar->brand->BrandName }}
                                                    @endif
                                                @else
                                                    {{ __('N/A') }}
                                                @endif
                                                ,
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $similarCar->VehiclesTitle_ar ?? $similarCar->VehiclesTitle }}
                                                @else
                                                    {{ $similarCar->VehiclesTitle }}
                                                @endif
                                            </a>
                                        </h5>
                                        <p class="list-price"> {{ $similarCar->PricePerDay }} {{ __('EGP') }}</p>
                                        <ul class="features_list">
                                            <li><i class="fa fa-user"
                                                    aria-hidden="true"></i>{{ $similarCar->SeatingCapacity }}
                                                {{ __('seats') }}</li>
                                            <li><i class="fa fa-calendar"
                                                    aria-hidden="true"></i>{{ $similarCar->ModelYear }}
                                                {{ __('model') }}</li>
                                            <li><i class="fa fa-car" aria-hidden="true"></i>
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $similarCar->FuelType_ar ?? $similarCar->FuelType }}
                                                @else
                                                    {{ $similarCar->FuelType }}
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
        /* Image Modal Styles */
        .image-modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.95);
            animation: fadeIn 0.3s ease;
        }

        .image-modal.active {
            display: block;
        }

        .modal-content-wrapper {
            position: relative;
            height: 80%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .modal-image {
            max-width: 90%;
            max-height: 100%;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
            animation: zoomIn 0.3s ease;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: #fff;
            font-size: 50px;
            font-weight: 300;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10000;
        }

        .modal-close:hover {
            color: #f44336;
            transform: rotate(90deg);
        }

        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
            padding: 20px 25px;
            font-size: 24px;
            cursor: pointer;
            border-radius: 50%;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .modal-nav:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-50%) scale(1.1);
        }

        .modal-prev {
            left: 30px;
        }

        .modal-next {
            right: 30px;
        }

        .modal-counter {
            position: absolute;
            bottom: 120px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 18px;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px 20px;
            border-radius: 25px;
            backdrop-filter: blur(10px);
        }

        .modal-thumbnails {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            max-width: 90%;
            overflow-x: auto;
            padding: 10px;
        }

        .modal-thumbnails::-webkit-scrollbar {
            height: 6px;
        }

        .modal-thumbnails::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .modal-thumbnails::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .modal-thumbnail {
            width: 80px;
            height: 60px;
            object-fit: cover;
            cursor: pointer;
            border-radius: 5px;
            opacity: 0.6;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .modal-thumbnail:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .modal-thumbnail.active {
            opacity: 1;
            border-color: #fff;
            transform: scale(1.1);
        }

        /* Slider Image Overlay */
        .slide-box {
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .slide-box:hover .image-overlay {
            opacity: 1;
        }

        .image-overlay i {
            color: white;
            font-size: 48px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .modal-nav {
                padding: 15px 20px;
                font-size: 20px;
            }

            .modal-prev {
                left: 10px;
            }

            .modal-next {
                right: 10px;
            }

            .modal-close {
                font-size: 40px;
                right: 20px;
                top: 10px;
            }

            .modal-thumbnail {
                width: 60px;
                height: 45px;
            }
        }
    </style>

    <script>
        const vehicleImages = [
            @foreach ([$vehicle->Vimage1, $vehicle->Vimage2, $vehicle->Vimage3, $vehicle->Vimage4, $vehicle->Vimage5] as $img)
                @if ($img)
                    "{{ asset('img/vehicleimages/' . $img) }}",
                @endif
            @endforeach
        ];

        let currentImageIndex = 0;

        function openImageModal(index) {
            currentImageIndex = index;
            const modal = document.getElementById('imageModal');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
            updateModalImage();
            createThumbnails();
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function navigateImage(direction) {
            currentImageIndex += direction;
            if (currentImageIndex < 0) {
                currentImageIndex = vehicleImages.length - 1;
            } else if (currentImageIndex >= vehicleImages.length) {
                currentImageIndex = 0;
            }
            updateModalImage();
        }


        function updateModalImage() {
            const modalImage = document.getElementById('modalImage');
            const modalCounter = document.getElementById('modalCounter');

            modalImage.src = vehicleImages[currentImageIndex];
            modalCounter.textContent = `${currentImageIndex + 1} / ${vehicleImages.length}`;

            const thumbnails = document.querySelectorAll('.modal-thumbnail');
            thumbnails.forEach((thumb, index) => {
                if (index === currentImageIndex) {
                    thumb.classList.add('active');
                } else {
                    thumb.classList.remove('active');
                }
            });
        }


        function createThumbnails() {
            const thumbnailContainer = document.getElementById('modalThumbnails');
            thumbnailContainer.innerHTML = '';

            vehicleImages.forEach((src, index) => {
                const img = document.createElement('img');
                img.src = src;
                img.className = 'modal-thumbnail';
                if (index === currentImageIndex) {
                    img.classList.add('active');
                }
                img.onclick = () => {
                    currentImageIndex = index;
                    updateModalImage();
                };
                thumbnailContainer.appendChild(img);
            });
        }

        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('imageModal');
            if (modal.classList.contains('active')) {
                if (e.key === 'Escape') {
                    closeImageModal();
                } else if (e.key === 'ArrowLeft') {
                    navigateImage(-1);
                } else if (e.key === 'ArrowRight') {
                    navigateImage(1);
                }
            }
        });

        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeImageModal();
            }
        });
    </script>
@endsection
