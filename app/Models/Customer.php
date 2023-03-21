<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function orders(){
        return $this->hasMany(Task::class,'customer_id');
    }

    public function histories(){
        return $this->hasMany(PaymentHistory::class,'customer_id')->orderBy('created_at','DESC');
    }
}
