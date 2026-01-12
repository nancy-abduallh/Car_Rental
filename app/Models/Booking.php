<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'tblbooking';
    protected $fillable = [
        'BookingNumber', 'userEmail', 'VehicleId', 'FromDate',
        'ToDate', 'message', 'message_ar', 'Status', 'Status_ar',
        'PostingDate', 'LastUpdationDate'
    ];
    public $timestamps = false;

    protected $with = ['user', 'vehicle.brand'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'VehicleId', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userEmail', 'EmailId');
    }
}