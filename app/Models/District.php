<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function cities(){
        return $this->hasMany(City::class,'district_id');
    }
    public function manpowers(){
        return $this->hasMany(Manpower::class,'district');
    }
}
