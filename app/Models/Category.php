<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function blogs(){
        return $this->hasMany(Blog::class,'category_id');
    }
    public function subcategories(){
        return $this->hasMany(SubCategory::class,'category_id');
    }
    public function manpowers(){
        return $this->hasMany(Manpower::class,'category');
    }
}
