@extends('admin.layouts.app')

@section('title', 'Edit Vehicle')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="page-header animated fadeInDown">
                <h2 class="page-title">
                    <i class="fas fa-edit text-warning me-2"></i>Edit Vehicle
                </h2>
                <p class="page-subtitle">Update vehicle information</p>
            </div>

            <div class="card modern-card animated fadeInUp">
                <div class="card-header gradient-header">
                    <div class="header-content">
                        <i class="fas fa-car me-2"></i>
                        <span>Vehicle Information</span>
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

                    @if ($errors->any())
                        <div class="alert alert-error alert-dismissible fade show animated shake" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Error!</strong> {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}" class="modern-form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="section-header">
                            <h4><i class="fas fa-info-circle"></i>Basic Information</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Vehicle Title (English) <span class="text-danger">*</span></label>
                                <input type="text" name="vehicletitle" class="form-control form-control-lg" required
                                    value="{{ old('vehicletitle', $vehicle->VehiclesTitle) }}"
                                    placeholder="Enter vehicle title in English">
                            </div>
                            <div class="form-col">
                                <label class="form-label">Vehicle Title (Arabic)</label>
                                <input type="text" name="vehicletitle_ar" class="form-control form-control-lg"
                                    value="{{ old('vehicletitle_ar', $vehicle->VehiclesTitle_ar) }}"
                                    placeholder="أدخل عنوان المركبة بالعربية" dir="rtl">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Select Brand <span class="text-danger">*</span></label>
                                <select class="selectpicker" name="brandname" required>
                                    <option value="{{ $vehicle->brand->id }}">{{ $vehicle->brand->BrandName }}</option>
                                    @foreach ($brands as $brand)
                                        @if ($brand->id != $vehicle->brand->id)
                                            <option value="{{ $brand->id }}">{{ $brand->BrandName }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vehicle Overview (English) <span class="text-danger">*</span></label>
                            <textarea class="form-control" name="vehicalorcview" rows="4" required
                                placeholder="Describe the vehicle features and specifications in English">{{ old('vehicalorcview', $vehicle->VehiclesOverview) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Vehicle Overview (Arabic)</label>
                            <textarea class="form-control" name="vehicalorcview_ar" rows="4" placeholder="صف مواصفات وميزات المركبة بالعربية"
                                dir="rtl">{{ old('vehicalorcview_ar', $vehicle->VehiclesOverview_ar) }}</textarea>
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-cog"></i>Specifications & Pricing</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Price Per Day (EGP) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">EGP</span>
                                    <input type="text" name="priceperday" class="form-control" required
                                        value="{{ old('priceperday', $vehicle->PricePerDay) }}" placeholder="0.00">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Fuel Type (English) <span class="text-danger">*</span></label>
                                <select class="selectpicker" name="fueltype" required>
                                    <option value="{{ $vehicle->FuelType }}">{{ $vehicle->FuelType }}</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="CNG">CNG</option>
                                    <option value="Electric">Electric</option>
                                    <option value="Hybrid">Hybrid</option>
                                </select>
                            </div>
                            <div class="form-col">
                                <label class="form-label">Fuel Type (Arabic)</label>
                                <input type="text" name="fueltype_ar" class="form-control"
                                    value="{{ old('fueltype_ar', $vehicle->FuelType_ar) }}"
                                    placeholder="نوع الوقود بالعربية" dir="rtl">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <label class="form-label">Model Year <span class="text-danger">*</span></label>
                                <input type="text" name="modelyear" class="form-control" required
                                    value="{{ old('modelyear', $vehicle->ModelYear) }}" placeholder="YYYY">
                            </div>
                            <div class="form-col">
                                <label class="form-label">Seating Capacity <span class="text-danger">*</span></label>
                                <input type="text" name="seatingcapacity" class="form-control" required
                                    value="{{ old('seatingcapacity', $vehicle->SeatingCapacity) }}"
                                    placeholder="Number of seats">
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-images"></i>Vehicle Images</h4>
                        </div>

                        <div class="form-row">
                            <div class="form-col">
                                <div class="image-preview-group">
                                    <label class="form-label">Image 1</label>
                                    <div class="image-preview">
                                        <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage1) }}?v={{ time() }}"
                                            alt="Vehicle Image 1" class="img-thumbnail">
                                        <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 1]) }}"
                                            class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-sync me-1"></i> Change Image 1
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="image-preview-group">
                                    <label class="form-label">Image 2</label>
                                    <div class="image-preview">
                                        <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage2) }}?v={{ time() }}"
                                            alt="Vehicle Image 2" class="img-thumbnail">
                                        <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 2]) }}"
                                            class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-sync me-1"></i> Change Image 2
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="image-preview-group">
                                    <label class="form-label">Image 3</label>
                                    <div class="image-preview">
                                        <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage3) }}?v={{ time() }}"
                                            alt="Vehicle Image 3" class="img-thumbnail">
                                        <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 3]) }}"
                                            class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-sync me-1"></i> Change Image 3
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row mt-3">
                            <div class="form-col">
                                <div class="image-preview-group">
                                    <label class="form-label">Image 4</label>
                                    <div class="image-preview">
                                        <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage4) }}?v={{ time() }}"
                                            alt="Vehicle Image 4" class="img-thumbnail">
                                        <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 4]) }}"
                                            class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-sync me-1"></i> Change Image 4
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="image-preview-group">
                                    <label class="form-label">Image 5</label>
                                    <div class="image-preview">
                                        @if ($vehicle->Vimage5)
                                            <img src="{{ asset('img/vehicleimages/' . $vehicle->Vimage5) }}?v={{ time() }}"
                                                alt="Vehicle Image 5" class="img-thumbnail">
                                            <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 5]) }}"
                                                class="btn btn-sm btn-outline-primary mt-2">
                                                <i class="fas fa-sync me-1"></i> Change Image 5
                                            </a>
                                        @else
                                            <div class="no-image-placeholder">
                                                <i class="fas fa-image text-muted" style="font-size: 3rem;"></i>
                                                <p class="text-muted mt-2">No image available</p>
                                                <a href="{{ route('admin.vehicles.change.image', ['id' => $vehicle->id, 'imageNumber' => 5]) }}"
                                                    class="btn btn-sm btn-outline-primary mt-2">
                                                    <i class="fas fa-plus me-1"></i> Add Image 5
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="section-header">
                            <h4><i class="fas fa-list-check"></i>Vehicle Features & Accessories</h4>
                        </div>

                        <div class="features-grid">
                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="airconditioner"
                                            name="airconditioner" value="1"
                                            {{ $vehicle->AirConditioner ? 'checked' : '' }}>
                                        <label class="form-check-label" for="airconditioner">
                                            <i class="fas fa-snowflake me-2"></i>Air Conditioner
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powerdoorlocks"
                                            name="powerdoorlocks" value="1"
                                            {{ $vehicle->PowerDoorLocks ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powerdoorlocks">
                                            <i class="fas fa-lock me-2"></i>Power Door Locks
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="antilockbrakingsys"
                                            name="antilockbrakingsys" value="1"
                                            {{ $vehicle->AntiLockBrakingSystem ? 'checked' : '' }}>
                                        <label class="form-check-label" for="antilockbrakingsys">
                                            <i class="fas fa-car-burst me-2"></i>AntiLock Braking System
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="brakeassist"
                                            name="brakeassist" value="1"
                                            {{ $vehicle->BrakeAssist ? 'checked' : '' }}>
                                        <label class="form-check-label" for="brakeassist">
                                            <i class="fas fa-car-brake me-2"></i>Brake Assist
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powersteering"
                                            name="powersteering" value="1"
                                            {{ $vehicle->PowerSteering ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powersteering">
                                            <i class="fas fa-steering-wheel me-2"></i>Power Steering
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="driverairbag"
                                            name="driverairbag" value="1"
                                            {{ $vehicle->DriverAirbag ? 'checked' : '' }}>
                                        <label class="form-check-label" for="driverairbag">
                                            <i class="fas fa-user-shield me-2"></i>Driver Airbag
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="passengerairbag"
                                            name="passengerairbag" value="1"
                                            {{ $vehicle->PassengerAirbag ? 'checked' : '' }}>
                                        <label class="form-check-label" for="passengerairbag">
                                            <i class="fas fa-user-shield me-2"></i>Passenger Airbag
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="powerwindow"
                                            name="powerwindow" value="1"
                                            {{ $vehicle->PowerWindows ? 'checked' : '' }}>
                                        <label class="form-check-label" for="powerwindow">
                                            <i class="fas fa-window-maximize me-2"></i>Power Windows
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="feature-row">
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="cdplayer" name="cdplayer"
                                            value="1" {{ $vehicle->CDPlayer ? 'checked' : '' }}>
                                        <label class="form-check-label" for="cdplayer">
                                            <i class="fas fa-compact-disc me-2"></i>CD Player
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="centrallocking"
                                            name="centrallocking" value="1"
                                            {{ $vehicle->CentralLocking ? 'checked' : '' }}>
                                        <label class="form-check-label" for="centrallocking">
                                            <i class="fas fa-key me-2"></i>Central Locking
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="crashcensor"
                                            name="crashcensor" value="1"
                                            {{ $vehicle->CrashSensor ? 'checked' : '' }}>
                                        <label class="form-check-label" for="crashcensor">
                                            <i class="fas fa-exclamation-triangle me-2"></i>Crash Sensor
                                        </label>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="form-check modern-checkbox">
                                        <input class="form-check-input" type="checkbox" id="leatherseats"
                                            name="leatherseats" value="1"
                                            {{ $vehicle->LeatherSeats ? 'checked' : '' }}>
                                        <label class="form-check-label" for="leatherseats">
                                            <i class="fas fa-chair me-2"></i>Leather Seats
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="modern-divider">

                        <div class="form-group text-center">
                            <a href="{{ route('admin.vehicles') }}" class="btn btn-default me-3">
                                <i class="fas fa-arrow-left me-1"></i> Back to Vehicles
                            </a>
                            <button class="btn btn-primary" name="submit" type="submit">
                                <i class="fas fa-save me-1"></i> Update Vehicle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .image-preview-group {
            text-align: center;
        }

        .image-preview img {
            max-width: 200px;
            max-height: 150px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
        }

        .no-image-placeholder {
            padding: 20px;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .features-grid {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feature-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .feature-item {
            padding: 10px;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            background: #f8f9fa;
        }

        .modern-checkbox .form-check-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* RTL support for Arabic fields */
        [dir="rtl"] {
            text-align: right;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        @media (max-width: 768px) {
            .feature-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection
