<?php
namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('brand')->get();
        $brands = Brand::all();
        $recentVehicles = Vehicle::orderBy('RegDate', 'desc')->take(5)->get();

        return view('pages.car-listing', compact('vehicles', 'brands', 'recentVehicles'));
    }

    public function show($id)
    {
        $vehicle = Vehicle::with('brand')->findOrFail($id);

        // Get similar cars (same brand, excluding current vehicle)
        $similarCars = Vehicle::with('brand')
            ->where('VehiclesBrand', $vehicle->VehiclesBrand)
            ->where('id', '!=', $id)
            ->take(4)
            ->get();

        return view('pages.vehical-details', compact('vehicle', 'similarCars'));
    }

    public function searchForm()
    {
        $brands = Brand::all();
        return view('pages.search', compact('brands'));
    }

    public function searchResult(Request $request)
    {
        Log::info('Search Request:', $request->all());

        $query = Vehicle::query()->with('brand');

        if ($request->filled('brand')) {
            $query->where('VehiclesBrand', $request->brand);
        }

        if ($request->filled('fueltype')) {
            $query->where('FuelType', $request->fueltype);
        }

        $results = $query->get();

        Log::info('Search Results Count:', ['count' => $results->count()]);

        $brands = Brand::all();
        $recentVehicles = Vehicle::with('brand')->orderBy('RegDate', 'desc')->take(5)->get();

        if ($results->isEmpty() && ($request->filled('brand') || $request->filled('fueltype'))) {
            return response()->view('pages.search-result', compact('results', 'brands', 'recentVehicles'))->setStatusCode(404);
        }

        return view('pages.search-result', compact('results', 'brands', 'recentVehicles'));
    }
}