<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {
    protected $table = 'tblpages';
    protected $fillable = ['PageName', 'PageName_ar', 'type', 'detail', 'detail_ar'];
    public $timestamps = false;
}