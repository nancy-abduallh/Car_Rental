<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    // Temporarily in your controller
    public function index()
    {
        $vehicles = Vehicle::with('brand')->take(9)->get();

        // Debug: check image paths
        foreach($vehicles as $vehicle) {
            Log::info("Vehicle ID: {$vehicle->id}, Image: {$vehicle->Vimage1}");
        }

        $testimonials = Testimonial::with('user')->where('status', 1)->take(4)->get();

        return view('pages.index', compact('vehicles', 'testimonials'));
    }
}
