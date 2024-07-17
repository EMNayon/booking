<?php

namespace App\Models;

use App\Models\State;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
    // public function roomTypes(){
    //     return $this->hasMany(RoomType::class);
    // }

}