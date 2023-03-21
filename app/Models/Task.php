<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function manpower(){
        return $this->belongsTo(Manpower::class,'manpower_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    
}
