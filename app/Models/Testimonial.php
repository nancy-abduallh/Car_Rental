<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
    protected $table = 'tbltestimonial';
    protected $fillable = ['UserEmail', 'Testimonial', 'Testimonial_ar', 'status'];
    public $timestamps = false;
}