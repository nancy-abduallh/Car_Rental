<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'tblvehicles';
    protected $fillable = [
        'VehiclesTitle', 'VehiclesTitle_ar', 'VehiclesBrand',
        'VehiclesOverview', 'VehiclesOverview_ar', 'PricePerDay',
        'FuelType', 'FuelType_ar', 'ModelYear', 'SeatingCapacity',
        'Vimage1', 'Vimage2', 'Vimage3', 'Vimage4', 'Vimage5',
        'AirConditioner', 'PowerDoorLocks', 'AntiLockBrakingSystem',
        'BrakeAssist', 'PowerSteering', 'DriverAirbag', 'PassengerAirbag',
        'PowerWindows', 'CDPlayer', 'CentralLocking', 'CrashSensor', 'LeatherSeats'
    ];
    public $timestamps = false;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'VehiclesBrand', 'id');
    }
}