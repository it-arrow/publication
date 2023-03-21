<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manpower extends Model
{
    use HasFactory;
    public function categoryName(){
        return $this->belongsTo(Category::class,'category');
    }
    public function sub_category(){
        return $this->belongsTo(SubCategory::class,'subcategory');
    }
    public function district_detail(){
        return $this->belongsTo(District::class,'district');
    }
    public function city_detail(){
        return $this->belongsTo(City::class,'city');
    }
    public function p_district_detail(){
        return $this->belongsTo(District::class,'p_district');
    }
    public function p_city_detail(){
        return $this->belongsTo(City::class,'p_city');
    }
    public function task(){
        return $this->hasMany(Task::class,'manpower_id');
    }
    public function histories(){
        return $this->hasMany(PaymentHistory::class,'manpower_id')->orderBy('created_at','DESC');
    }
}
