<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'tblbrands';
    protected $fillable = [
        'BrandName', 'BrandName_ar',
        'CreationDate', 'UpdationDate'
    ];
    public $timestamps = false;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'VehiclesBrand', 'id');
    }
}