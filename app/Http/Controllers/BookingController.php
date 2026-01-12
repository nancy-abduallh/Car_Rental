<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function checkForm()
    {
        $vehicles = Vehicle::all();
        return view('pages.check-availability', compact('vehicles'));
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',
        ]);

        $isBooked = Booking::where('VehicleId', $request->vehicle_id)
            ->where(function($q) use ($request) {
                $q->whereBetween('FromDate', [$request->from_date, $request->to_date])
                  ->orWhereBetween('ToDate', [$request->from_date, $request->to_date]);
            })
            ->exists();

        $status = $isBooked ? '❌ Not Available' : '✅ Available';
        return back()->with('status', "Vehicle is $status");
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_id' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after:from_date',
            'message' => 'nullable|string|max:500', 
        ]);

        Booking::create([
            'BookingNumber' => rand(100000000, 999999999),
            'userEmail' => Auth::user()->EmailId ?? 'guest@local',
            'VehicleId' => $request->vehicle_id,
            'FromDate' => $request->from_date,
            'ToDate' => $request->to_date,
            'message' => $request->message,
            'Status' => 0,
        ]);

        return redirect()->route('booking.my')->with('success', 'Booking created successfully!');
    }

    public function index()
    {
        $user = Auth::user();
        $email = $user->EmailId ?? 'guest@local';
        $bookings = Booking::where('userEmail', $email)->get();

        return view('pages.my-booking', compact('bookings', 'user'));
    }
}