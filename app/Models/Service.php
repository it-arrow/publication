<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function bookings(){
        return $this->hasMany(Booking::class,'service_id');
    }
    public function category(){
        return $this->belongsTo(ServiceCategory::class,'category_id');
    }
    public function subcategory(){
        return $this->belongsTo(ServiceSubCategory::class,'subcategory_id');
    }
}
