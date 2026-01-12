@extends('layouts.app')

@section('title', 'Check Availability')

@section('content')

<div class="container py-5">
  <h3>Check Vehicle Availability</h3>
  <form action="{{ route('booking.check') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="from_date">From Date</label>
      <input type="date" name="from_date" id="from_date" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="to_date">To Date</label>
      <input type="date" name="to_date" id="to_date" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="vehicle_id">Select Vehicle</label>
      <select name="vehicle_id" id="vehicle_id" class="form-select">
        @foreach($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}">{{ $vehicle->VehiclesTitle }}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Check Availability</button>
  </form>
</div>

@endsection
