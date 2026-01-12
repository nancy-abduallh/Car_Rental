<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Brand;
use App\Models\Subscriber;
use App\Models\ContactQuery;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'regusers' => User::count(),
            'totalvehicle' => Vehicle::count(),
            'bookings' => Booking::count(),
            'brands' => Brand::count(),
            'subscribers' => Subscriber::count(),
            'query' => ContactQuery::count(),
            'testimonials' => Testimonial::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}