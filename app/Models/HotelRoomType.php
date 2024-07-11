<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    use HasFactory;
    protected $table = "hotel_room_type";
    protected $guarded = ['id'];

    // public function roomTypes()
    // {
    //     return $this->hasMany(RoomType::class, 'id');
    // }

    // public function hotel()
    // {
    //     return $this->hasMany(Hotel::class, 'id');
    // }
}
