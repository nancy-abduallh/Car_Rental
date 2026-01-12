@extends('layouts.app')
@section('title', 'Search Cars')
@section('content')

    <div class="container py-5">
        <h3>Search Cars</h3>
        <form action="{{ route('vehicle.search') }}" method="GET"> {{-- Fixed route name --}}
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Brand</label>
                    <select class="form-select" name="brand">
                        <option value="">Any</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->BrandName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Fuel Type</label>
                    <select class="form-select" name="fueltype">
                        <option value="">Any</option>
                        <option value="Petrol" {{ request('fueltype') == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                        <option value="Diesel" {{ request('fueltype') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                        <option value="CNG" {{ request('fueltype') == 'CNG' ? 'selected' : '' }}>CNG</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-primary">Search</button>
        </form>
    </div>

@endsection
