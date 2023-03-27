<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Grade;

class Book extends Model
{
    use HasFactory;
    public function get_category(){
        return $this->belongsTo(Category::class,'category','id');
    }
    public function get_grade(){
        return $this->belongsTo(Grade::class,'grade','id');
    }
}
