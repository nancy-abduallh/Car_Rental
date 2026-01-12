<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['vehicle.brand', 'user'])
            ->get()
            ->map(function($booking) {
                // Add vid for compatibility with views
                $booking->vid = $booking->VehicleId;
                return $booking;
            });

        return view('admin.bookings.index', compact('bookings'));
    }

    public function confirmed()
    {
        $bookings = Booking::with(['vehicle.brand', 'user'])
            ->where('Status', 1)
            ->get()
            ->map(function($booking) {
                $booking->vid = $booking->VehicleId;
                return $booking;
            });

        return view('admin.bookings.confirmed', compact('bookings'));
    }

    public function cancelled()
    {
        $bookings = Booking::with(['vehicle.brand', 'user'])
            ->where('Status', 2)
            ->get()
            ->map(function($booking) {
                $booking->vid = $booking->VehicleId;
                return $booking;
            });

        return view('admin.bookings.cancelled', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::with(['vehicle.brand', 'user'])
            ->where('id', $id)
            ->firstOrFail();

        // Add vid for compatibility with views
        $booking->vid = $booking->VehicleId;

        // Calculate total days and grand total
        $fromDate = \Carbon\Carbon::parse($booking->FromDate);
        $toDate = \Carbon\Carbon::parse($booking->ToDate);
        $booking->totalnodays = $toDate->diffInDays($fromDate);

        // Check if vehicle relationship exists before accessing PricePerDay
        if ($booking->vehicle) {
            $booking->grandTotal = $booking->totalnodays * $booking->vehicle->PricePerDay;
        } else {
            $booking->grandTotal = 0;
        }

        return view('admin.bookings.show', compact('booking'));
    }

    public function confirm($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->Status = 1;
        $booking->Status_ar = 'مؤكد'; // Arabic translation
        $booking->save();

        return redirect()->route('admin.bookings.confirmed')->with('success', 'Booking Successfully Confirmed');
    }

    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->Status = 2;
        $booking->Status_ar = 'ملغى'; // Arabic translation
        $booking->save();

        return redirect()->route('admin.bookings.cancelled')->with('success', 'Booking Successfully Cancelled');
    }
}