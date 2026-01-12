<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tblusers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'FullName', 'FullName_ar', 'EmailId', 'Password', 'ContactNo', 'dob',
        'Address', 'Address_ar', 'City', 'City_ar', 'Country', 'Country_ar',
        'RegDate', 'UpdationDate'
    ];
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->Password;
    }

    public function getAuthIdentifierName()
    {
        return 'EmailId';
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'userEmail', 'EmailId');
    }
}