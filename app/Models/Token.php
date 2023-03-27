<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Token;
use App\Models\UserToken;

class Token extends Model
{
    use HasFactory;
    public function get_token(){
        return $this->belongsTo(UserToken::class,'token_id');
    }
}
