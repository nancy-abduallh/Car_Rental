<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminVehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('brand')->get();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $brands = Brand::all();
        return view('admin.vehicles.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicletitle' => 'required|string|max:255',
            'vehicletitle_ar' => 'nullable|string|max:255',
            'brandname' => 'required|exists:tblbrands,id',
            'vehicalorcview' => 'required|string',
            'vehicalorcview_ar' => 'nullable|string',
            'priceperday' => 'required|numeric',
            'fueltype' => 'required|string',
            'fueltype_ar' => 'nullable|string',
            'modelyear' => 'required|string',
            'seatingcapacity' => 'required|string',
            'img1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'img5' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file uploads
        $image1 = $this->uploadImage($request->file('img1'));
        $image2 = $this->uploadImage($request->file('img2'));
        $image3 = $this->uploadImage($request->file('img3'));
        $image4 = $this->uploadImage($request->file('img4'));
        $image5 = $request->hasFile('img5') ? $this->uploadImage($request->file('img5')) : null;

        // Create vehicle
        $vehicle = Vehicle::create([
            'VehiclesTitle' => $request->vehicletitle,
            'VehiclesTitle_ar' => $request->vehicletitle_ar,
            'VehiclesBrand' => $request->brandname,
            'VehiclesOverview' => $request->vehicalorcview,
            'VehiclesOverview_ar' => $request->vehicalorcview_ar,
            'PricePerDay' => $request->priceperday,
            'FuelType' => $request->fueltype,
            'FuelType_ar' => $request->fueltype_ar,
            'ModelYear' => $request->modelyear,
            'SeatingCapacity' => $request->seatingcapacity,
            'Vimage1' => $image1,
            'Vimage2' => $image2,
            'Vimage3' => $image3,
            'Vimage4' => $image4,
            'Vimage5' => $image5,
            'AirConditioner' => $request->has('airconditioner') ? 1 : 0,
            'PowerDoorLocks' => $request->has('powerdoorlocks') ? 1 : 0,
            'AntiLockBrakingSystem' => $request->has('antilockbrakingsys') ? 1 : 0,
            'BrakeAssist' => $request->has('brakeassist') ? 1 : 0,
            'PowerSteering' => $request->has('powersteering') ? 1 : 0,
            'DriverAirbag' => $request->has('driverairbag') ? 1 : 0,
            'PassengerAirbag' => $request->has('passengerairbag') ? 1 : 0,
            'PowerWindows' => $request->has('powerwindow') ? 1 : 0,
            'CDPlayer' => $request->has('cdplayer') ? 1 : 0,
            'CentralLocking' => $request->has('centrallocking') ? 1 : 0,
            'CrashSensor' => $request->has('crashcensor') ? 1 : 0,
            'LeatherSeats' => $request->has('leatherseats') ? 1 : 0,
        ]);

        return redirect()->route('admin.vehicles')->with('success', 'Vehicle created successfully');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::with('brand')->findOrFail($id);
        $brands = Brand::all();
        return view('admin.vehicles.edit', compact('vehicle', 'brands'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vehicletitle' => 'required|string|max:255',
            'vehicletitle_ar' => 'nullable|string|max:255',
            'brandname' => 'required|exists:tblbrands,id',
            'vehicalorcview' => 'required|string',
            'vehicalorcview_ar' => 'nullable|string',
            'priceperday' => 'required|numeric',
            'fueltype' => 'required|string',
            'fueltype_ar' => 'nullable|string',
            'modelyear' => 'required|string',
            'seatingcapacity' => 'required|string',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update([
            'VehiclesTitle' => $request->vehicletitle,
            'VehiclesTitle_ar' => $request->vehicletitle_ar,
            'VehiclesBrand' => $request->brandname,
            'VehiclesOverview' => $request->vehicalorcview,
            'VehiclesOverview_ar' => $request->vehicalorcview_ar,
            'PricePerDay' => $request->priceperday,
            'FuelType' => $request->fueltype,
            'FuelType_ar' => $request->fueltype_ar,
            'ModelYear' => $request->modelyear,
            'SeatingCapacity' => $request->seatingcapacity,
            'AirConditioner' => $request->has('airconditioner') ? 1 : 0,
            'PowerDoorLocks' => $request->has('powerdoorlocks') ? 1 : 0,
            'AntiLockBrakingSystem' => $request->has('antilockbrakingsys') ? 1 : 0,
            'BrakeAssist' => $request->has('brakeassist') ? 1 : 0,
            'PowerSteering' => $request->has('powersteering') ? 1 : 0,
            'DriverAirbag' => $request->has('driverairbag') ? 1 : 0,
            'PassengerAirbag' => $request->has('passengerairbag') ? 1 : 0,
            'PowerWindows' => $request->has('powerwindow') ? 1 : 0,
            'CDPlayer' => $request->has('cdplayer') ? 1 : 0,
            'CentralLocking' => $request->has('centrallocking') ? 1 : 0,
            'CrashSensor' => $request->has('crashcensor') ? 1 : 0,
            'LeatherSeats' => $request->has('leatherseats') ? 1 : 0,
        ]);

        return redirect()->route('admin.vehicles')->with('success', 'Vehicle updated successfully');
    }

    public function destroy($id)
    {
        try {
            Log::info('=== VEHICLE DELETE PROCESS STARTED ===');
            Log::info('Attempting to delete vehicle with ID: ' . $id);

            $vehicle = Vehicle::find($id);

            if (!$vehicle) {
                Log::error('Vehicle not found with ID: ' . $id);
                return redirect()->route('admin.vehicles')->with('error', 'Vehicle not found!');
            }

            Log::info('Found vehicle: ' . $vehicle->VehiclesTitle . ' (ID: ' . $vehicle->id . ')');

            // Delete associated images from storage
            $images = ['Vimage1', 'Vimage2', 'Vimage3', 'Vimage4', 'Vimage5'];
            $deletedImages = [];

            foreach ($images as $imageField) {
                if ($vehicle->$imageField) {
                    $imagePath = public_path('img/vehicleimages/' . $vehicle->$imageField);
                    Log::info('Checking image: ' . $vehicle->$imageField);

                    if (file_exists($imagePath)) {
                        Log::info('Deleting image: ' . $vehicle->$imageField);
                        if (unlink($imagePath)) {
                            $deletedImages[] = $vehicle->$imageField;
                            Log::info('Successfully deleted image: ' . $vehicle->$imageField);
                        } else {
                            Log::warning('Failed to delete image: ' . $vehicle->$imageField);
                        }
                    } else {
                        Log::info('Image file not found: ' . $imagePath);
                    }
                }
            }

            $vehicleTitle = $vehicle->VehiclesTitle;

            Log::info('Attempting to delete vehicle record from database...');
            $deleteResult = $vehicle->delete();

            if ($deleteResult) {
                Log::info('Vehicle record deleted successfully from database');
                Log::info('Total images deleted: ' . count($deletedImages));
                Log::info('=== VEHICLE DELETE PROCESS COMPLETED SUCCESSFULLY ===');

                return redirect()->route('admin.vehicles')->with('success', 'Vehicle "' . $vehicleTitle . '" deleted successfully');
            } else {
                Log::error('Failed to delete vehicle record from database');
                Log::info('=== VEHICLE DELETE PROCESS FAILED ===');

                return redirect()->route('admin.vehicles')->with('error', 'Failed to delete vehicle record from database');
            }

        } catch (\Exception $e) {
            Log::error('Exception during vehicle deletion: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            Log::info('=== VEHICLE DELETE PROCESS FAILED WITH EXCEPTION ===');

            return redirect()->route('admin.vehicles')->with('error', 'Error deleting vehicle: ' . $e->getMessage());
        }
    }

    public function showChangeImageForm($id, $imageNumber)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.change-image', compact('vehicle', 'imageNumber'));
    }

    public function updateImage(Request $request, $id, $imageNumber)
    {
        // Debug: Log the request
        Log::info('=== UPDATE IMAGE PROCESS STARTED ===');
        Log::info('Vehicle ID: ' . $id);
        Log::info('Image Number: ' . $imageNumber);
        Log::info('Request Data: ', $request->all());
        Log::info('Has File: ' . ($request->hasFile("img{$imageNumber}") ? 'YES' : 'NO'));

        // Validate the request
        $request->validate([
            "img{$imageNumber}" => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $vehicle = Vehicle::findOrFail($id);
            Log::info('Vehicle Found: ' . $vehicle->VehiclesTitle);

            if ($request->hasFile("img{$imageNumber}")) {
                $imageField = "Vimage{$imageNumber}";
                $file = $request->file("img{$imageNumber}");

                Log::info('Image Field: ' . $imageField);
                Log::info('File Details:', [
                    'original_name' => $file->getClientOriginalName(),
                    'extension' => $file->getClientOriginalExtension(),
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType()
                ]);

                // Delete old image if exists
                if ($vehicle->$imageField) {
                    $oldImagePath = public_path('img/vehicleimages/' . $vehicle->$imageField);
                    Log::info('Old image path: ' . $oldImagePath);

                    if (file_exists($oldImagePath)) {
                        if (unlink($oldImagePath)) {
                            Log::info('Successfully deleted old image: ' . $vehicle->$imageField);
                        } else {
                            Log::warning('Failed to delete old image: ' . $vehicle->$imageField);
                        }
                    } else {
                        Log::info('Old image file not found, continuing with upload...');
                    }
                }

                // Upload new image
                Log::info('Starting new image upload...');
                $filename = $this->uploadImage($file);
                Log::info('New filename generated: ' . $filename);

                // Verify the file was actually created
                $newImagePath = public_path('img/vehicleimages/' . $filename);
                if (file_exists($newImagePath)) {
                    Log::info('New image successfully saved to: ' . $newImagePath);
                    Log::info('File size: ' . filesize($newImagePath) . ' bytes');
                } else {
                    Log::error('New image file was not created at: ' . $newImagePath);
                    return redirect()->back()->with('error', 'Failed to save the new image file.');
                }

                // Update the database
                Log::info('Updating database...');
                Log::info('Before update - ' . $imageField . ': ' . $vehicle->$imageField);

                $vehicle->$imageField = $filename;
                $updateResult = $vehicle->save();

                Log::info('Update result: ' . ($updateResult ? 'SUCCESS' : 'FAILED'));
                Log::info('After update - ' . $imageField . ': ' . $vehicle->$imageField);

                // Verify the update
                $updatedVehicle = Vehicle::find($id);
                Log::info('Verification - Current value in DB: ' . $updatedVehicle->$imageField);

                if ($updateResult) {
                    Log::info('=== UPDATE IMAGE PROCESS COMPLETED SUCCESSFULLY ===');
                    return redirect()->route('admin.vehicles.edit', $id)
                        ->with('success', 'Image ' . $imageNumber . ' updated successfully!')
                        ->with('cache_bust', time());
                } else {
                    Log::error('Database update failed');
                    return redirect()->back()->with('error', 'Failed to update image in database.');
                }
            } else {
                Log::warning('No file found in request');
                return redirect()->back()->with('error', 'No image file provided.');
            }

        } catch (\Exception $e) {
            Log::error('Exception during image update: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            Log::info('=== UPDATE IMAGE PROCESS FAILED ===');

            return redirect()->back()->with('error', 'Error updating image: ' . $e->getMessage());
        }
    }

    private function uploadImage($file)
    {
        try {
            // Check if directory exists, if not create it
            $uploadPath = public_path('img/vehicleimages');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
                Log::info('Created directory: ' . $uploadPath);
            }

            // Check if directory is writable
            if (!is_writable($uploadPath)) {
                Log::error('Directory is not writable: ' . $uploadPath);
                throw new \Exception('Upload directory is not writable');
            }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $fullPath = $uploadPath . '/' . $filename;

            Log::info('Attempting to move file to: ' . $fullPath);

            $moveResult = $file->move($uploadPath, $filename);

            if ($moveResult && file_exists($fullPath)) {
                Log::info('File successfully moved. File exists: ' . (file_exists($fullPath) ? 'YES' : 'NO'));
                Log::info('File size: ' . filesize($fullPath) . ' bytes');
                return $filename;
            } else {
                Log::error('File move failed or file does not exist after move');
                throw new \Exception('Failed to move uploaded file');
            }

        } catch (\Exception $e) {
            Log::error('Upload error: ' . $e->getMessage());
            throw $e;
        }
    }
}