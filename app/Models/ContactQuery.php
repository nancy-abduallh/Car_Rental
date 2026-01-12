<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactQuery extends Model {
    protected $table = 'tblcontactusquery';
    protected $fillable = ['name', 'name_ar', 'EmailId', 'ContactNumber', 'Message', 'Message_ar', 'status'];
    public $timestamps = false;
}